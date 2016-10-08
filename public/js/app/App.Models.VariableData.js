;(function() {		
	"use strict";
	owid.namespace("App.Models.VariableData");

	/**
	 * This model handles the mass retrieval of data values associated with one
	 * or more variables, the raw data stuff that is then processed for the charts.
	 */
	App.Models.VariableData = Backbone.Model.extend({
		initialize: function() {
			App.ChartModel.on("change:chart-dimensions change:chart-type", this.update.bind(this));
			this.update();
		},

		update: function() {
			if (this.dataRequest) {
				this.dataRequest.abort();
				this.dataRequest = null;
			}

			var dimensions = App.ChartModel.getDimensions();
			var variableIds = _.map(dimensions, function(dim) { return dim.variableId; });
			if (_.isEmpty(variableIds)) {
				this.setEmptyData();
				return;
			}

			this.isReady = false;
			this.set("variables", null, { silent: true });

			var cacheTag = App.ChartModel.get("variableCacheTag");
			if (cacheTag)
				this.dataRequest = $.get(Global.rootUrl + "/data/variables/" + variableIds.join("+") + "?v=" + App.ChartModel.get("variableCacheTag"));
			else {
				// Editor cachebusting
				this.dataRequest = $.get(Global.rootUrl + "/data/variables/" + variableIds.join("+") + "?v=" + Date.now());
			}

			this.dataRequest.done(function(rawData) {
				this.dataRequest = null;
				this.receiveData(rawData);
			}.bind(this));			
		},

		// Replicates the state we would expect if there were simply no available data
		setEmptyData: function() {
			this.set({
				variables: {}, 
				entityKey: {},
				minYear: Infinity,
				maxYear: -Infinity,
				availableEntities: []
			});
		},

		receiveData: function(rawData) {
			var variableData = {};

			var lines = rawData.split("\r\n");

			lines.forEach(function(line, i) {
				if (i === 0) { // First line contains the basic variable metadata 
					variableData = JSON.parse(line);
				} else if (i == lines.length-1) { // Final line is entity id => name mapping
					variableData.entityKey = JSON.parse(line);
				} else {
					var points = line.split(";");
					var variable;
					points.forEach(function(d, j) {
						if (j === 0) {
							variable = variableData.variables[d];
						} else {
							var spl = d.split(",");
							variable.years.push(+spl[0]);
							variable.entities.push(spl[1]);
							variable.values.push(spl[2]);
						}
					});
				}
			});


			// For each variable, standardize the data and separate out any non-numeric
			_.each(variableData.variables, function(variable) {
				variable.numericValues = [];
				variable.categoricalValues = [];

				for (var i = 0; i < variable.values.length; i++) {
					var val = variable.values[i],
						asNumber = parseFloat(val);

					if (asNumber == val) {
						variable.values[i] = asNumber;
						variable.numericValues.push(asNumber);
					} else
						variable.categoricalValues.push(val);
				}

				variable.categoricalValues = _.sortBy(_.uniq(variable.categoricalValues));
				variable.hasCategoricalValues = !_.isEmpty(variable.categoricalValues);
				variable.hasNumericValues = !_.isEmpty(variable.numericValues);
				variable.minValue = _.min(variable.numericValues);
				variable.maxValue = _.max(variable.numericValues);				
				variable.uniqueYears = _.uniq(variable.years);

				// legacy
				variable.isNumeric = variable.hasNumericValues && !variable.hasCategoricalValues;
			});

			// Calculate some cross-variable metadata
			var yearsWithAnyData = _.sortBy(_.union.apply(_, _.pluck(variableData.variables, 'uniqueYears')));
			var minYear = _.min(yearsWithAnyData);
			var maxYear = _.max(yearsWithAnyData);

			// Slap the ids onto the entities
			_.each(variableData.entityKey, function(entity, id) {
				entity.id = +id;
			});

			this.isReady = true;
			this.set(_.extend(variableData, { minYear: minYear, maxYear: maxYear, yearsWithAnyData: yearsWithAnyData, availableEntities: _.values(variableData.entityKey) }));
			this.validateEntities();
		},

		getAvailableEntitiesById: function() {
			return this.get("entityKey");
		},

		countEntities: function() {
			return _.size(this.get("entityKey"));
		},

		// When chart dimensions change, double check that our selected entities are valid
		// And set some new defaults if they're not or missing
		validateEntities: function() {
			var chartType = App.ChartModel.get("chart-type"),
				availableEntities = App.VariableData.get("availableEntities"),
				availableEntitiesById = App.VariableData.getAvailableEntitiesById(),
				selectedEntities = App.ChartModel.get("selected-countries");

			var validEntities = _.filter(selectedEntities, function(entity) {
				return availableEntitiesById[entity.id];
			});

			if (_.isEmpty(validEntities) && chartType != App.ChartType.ScatterPlot && chartType != App.ChartType.DiscreteBar) {
				// Select a few random ones
				validEntities = _.sample(availableEntities, 3);
			}

			App.ChartModel.set("selected-countries", validEntities);
		},

		getRemainingEntities: function() {
			var availableEntities = App.VariableData.get("availableEntities"),
				selectedEntitiesById = App.ChartModel.getSelectedEntitiesById();

			return _.filter(availableEntities, function(entity) { return !selectedEntitiesById[entity.id]; });
		},

		getEntityById: function(id) {
			return this.get("entityKey") && this.get("entityKey")[id];
		},

		getVariableById: function(id) {
			return this.get("variables") && this.get("variables")[id];
		}
	});
})();