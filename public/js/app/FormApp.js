;$(document).ready(function() {
	"use strict";

	var Form = App.Views.Form,
		ChartModel = App.Models.ChartModel,
		ChartDataModel = App.Models.ChartDataModel;

	//setup models
	//is new chart or display old chart
	var $chart = $("#chart"),
		chartId = $chart.attr( "data-chart-id" );

	if (!$chart.length) return;

	//setup views
	App.isEditor = true;
	App.View = new Form();
	
	if (chartId) {
		//showing existing chart
		App.ChartModel = new ChartModel( { id: chartId } );
		App.ChartModel.fetch( {
			success: function( data ) {
				App.View.start();
			},
			error: function( xhr ) {
				console.error( "Error loading chart model", xhr );
			}
		} );
		//find out if it's in cache
		if( !$( ".standalone-charter" ).length ) {
			//disable caching for viewing within admin
			App.ChartModel.set( "cache", false );
		}
	} else {
		//is new chart
		App.ChartModel = new ChartModel();
		App.View.start();
	}
});