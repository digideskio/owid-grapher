
<div id="form-view" class="col-sm-12 col-md-6 form-wrapper">
	<div class="form-wrapper-inner">
		{!! Form::open( array( 'method' => $method ) ) !!}
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs no-bullets">
					<li class="nav-item active">
						<a class="nav-link" href="#basic-tab" data-toggle="tab" aria-expanded="false">1. Basic</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#data-tab" data-toggle="tab" aria-expanded="false">2. Data</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#axis-tab" data-toggle="tab" aria-expanded="false">3. Axis</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#styling-tab" data-toggle="tab" aria-expanded="false">4. Styling</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#export-tab" data-toggle="tab" aria-expanded="false">5. Export</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#map-tab" data-toggle="tab" aria-expanded="false">6. Map</a>
					</li>
				</ul>
			</div>
			<div class="tab-content">
				<div id="basic-tab" class="tab-pane active">
					<section class="form-section">
						<div class="form-section-header">
							<h2><span class="form-section-digit">a</span>Title of the visualization</h2>
						</div>
						<div class="form-section-content">						
							<p class="form-section-desc">Never use specific countries or years since these can be changed by the viewer. Instead use <b>*time*</b> or <b>*country*</b> as placeholders. These will be interpreted by the grapher to match what is being looked at.</p>
							<input class="form-control input-lg .col-xs-12" placeholder="Chart name" type="text" name="chart-name" value=""/>
							<div class="input-group">
								<span class="input-group-addon">/grapher/</span>
								<input class="form-control .col-xs-12" title="Human-friendly URL slug for this chart" type="text" name="chart-slug" value=""/>
							</div>
						</div>
					</section>
					<section class="form-section">
						<div class="form-section-header">
							<h2><span class="form-section-digit">b</span>Subtitle of the visualization</h2>
						</div>
						<div class="form-section-content">
							<textarea class="form-control input-lg .col-xs-12" placeholder="Short description of the data (ideally one line)" type="text" name="chart-subname" value=""></textarea>
						</div>
					</section>
					<section class="form-section chart-type-section">
						<div class="form-section-header">
							<h2><span class="form-section-digit">c</span>What type of chart</h2>
						</div>
						<div class="form-section-content">
							<select name="chart-type" class="form-control chart-type-select">
								<option value="" disabled selected>Select type</option>
								<option value="LineChart">Line Chart</option>
								<option value="ScatterPlot">Scatter Plot</option>
								<option value="StackedArea">Stacked Area</option>
								<option value="MultiBar">Multi Bar</option>
								<option value="HorizontalMultiBar">Horizontal Multi Bar</option>
								<option value="DiscreteBar">Discrete Bar</option>
							</select>
						</div>
					</section>
					<section class="form-section">
						<div class="form-section-header">
							<h2><span class="form-section-digit">d</span>Footer note</h2>
						</div>
						<div class="form-section-content">
							<textarea class="form-control input-lg .col-xs-12" placeholder="Any further relevant information e.g. adjustments or limitations" type="text" name="chart-footer-note" value=""></textarea>
						</div>
					</section>
					<section class="form-section">
						<div class="form-section-header">
							<h2><span class="form-section-digit">e</span>Internal author notes</h2>
						</div>
						<div class="form-section-content">
							<textarea class="form-control input-lg .col-xs-12" placeholder="WIP, needs review, etc" type="text" name="chart-notes" value=""></textarea>
						</div>
					</section>
				</div>
				<div id="data-tab" class="tab-pane">
					<section class="form-section add-data-section">
						<div class="form-section-header">
							<h2><span class="form-section-digit">d</span>Add your data</h2>
						</div>
						<div class="form-section-content">
							<a class="add-data-btn"><i class="fa fa-plus"></i>Add variable</a>
							<div class="dd">
								<div class="dd-empty"></div>
							</div>
						<p class="form-section-desc hidden">Assign variables to the graph dimensions below by dragging them.</p>
						</div>
					</section>
					<section class="form-section dimensions-section">
						<div class="form-section-content">
							
						</div>
	 					<input type="hidden" name="chart-dimensions" value="" />
					</section>
					<section class="form-section entities-section">
						<div class="form-section-header">
							<h2><span class="form-section-digit">f</span>Pick your countries</h2>
						</div>
						<div class="form-section-content">
							<p class="form-section-desc">Select countries from drop down below. You can set country colors by clicking on the country label itself.</p>
							<ul class="selected-countries-box no-bullets">

							</ul>
							<select class="form-control countries-select" data-placeholder="Choose a Country...">
								<option value=""></option>
							</select>
							<div class="add-country-control-wrapper">
								<h4>Can user add/change countries?</h4>
								<radiogroup>
									<label>
										<input type="radio" name="add-country-mode" value="add-country" checked></input>
										User can add and remove countries
									</label>
									<label>
										<input type="radio" name="add-country-mode" value="change-country" selected></input>
										User can change country
									</label>
									<label>
										<input type="radio" name="add-country-mode" value="disabled" selected></input>
										User cannot change/add country
									</label>
								</radiogroup>
							</div>
						</div>
					</section>
					<section class="form-section time-section">
						<div class="form-section-header">
							<h2><span class="form-section-digit">g</span>Define your time</h2>
						</div>
						<div class="form-section-content">
							<label>
								<input type="checkbox" name="dynamic-time" checked/>
								Use entire time period of the selected data
							</label>
							<input type="text" name="chart-time" value=""/>
							<div class="chart-time-inputs-wrapper">
								<label>
									Time from:
									<input type="text" name="chart-time-from" class="form-control" value="" />
								</label>
								<label>
									Time to:
									<input type="text" name="chart-time-to" class="form-control" value="" />
								</label>
							</div>
						</div>
					</section>
				</div>
				<div id="axis-tab" class="tab-pane">
					<section class="form-section">
						<div class="form-section-header">
							<h2><span class="form-section-digit">h</span>Refine your axis</h2>
						</div>
						<div class="form-section-content">
							<div class="y-section">
								<h3>Y Axis</h3>
								<div class="input-wrapper">
									<label for="chart-y-axis-label">Y-Axis Label</label>
									<input class="form-control" type="text" name="chart-y-axis-label" />
								</div>
								<div class="input-wrapper">
									<label for="chart-y-label-distance">Y-Axis Label Distance</label>
									<input class="form-control" type="text" name="chart-y-axis-label-distance" />
								</div>
								<div class="input-wrapper">
									<label for="chart-y-axis-max">Y-Axis Max</label>
									<input class="form-control" type="text" name="chart-y-axis-max" />
								</div>
								<div class="input-wrapper">
									<label for="chart-y-axis-min">Y-Axis Min (0 is default)</label>
									<input class="form-control" type="text" name="chart-y-axis-min" />
								</div>
								<div class="input-wrapper">
									<label for="chart-y-axis-prefix">Y-Axis Prefix</label>
									<input class="form-control" type="text" name="chart-y-axis-prefix" />
								</div>
								<div class="input-wrapper">
									<label for="chart-y-axis-suffix">Y-Axis Suffix</label>
									<input class="form-control" type="text" name="chart-y-axis-suffix" />
								</div>
								<div class="input-wrapper">
									<label for="chart-y-axis-format">Y-Axis No of decimal places</label>
									<input class="form-control" type="text" name="chart-y-axis-format" />
								</div>
								<div class="input-wrapper">
									<label for="chart-y-scale">Y-Axis Scale</label>
									<select class="form-control" type="text" name="chart-y-axis-scale">
										<option value="linear">Linear</option>
										<option value="log">Log</option>
									</select>
								</div>
								<div class="input-wrapper axis-scale-selector-wrapper">
									<label for="y-axis-scale-selector">
										<input type="checkbox" name="y-axis-scale-selector" />
										User can select Y axis scale
									</label>
								</div>
							</div>
							<div class="x-section">
								<h3>X Axis</h3>
								<div class="input-wrapper">
									<label for="chart-x-axis-label">X-Axis Label</label>
									<input class="form-control" type="text" name="chart-x-axis-label" />
								</div>
								<div class="input-wrapper">
									<label for="chart-x-label-distance">X-Axis Label Distance</label>
									<input class="form-control" type="text" name="chart-x-axis-label-distance" />
								</div>
								<div class="input-wrapper">
									<label for="chart-x-axis-max">X-Axis Max</label>
									<input class="form-control" type="text" name="chart-x-axis-max" />
								</div>
								<div class="input-wrapper">
									<label for="chart-x-axis-min">X-Axis Min</label>
									<input class="form-control" type="text" name="chart-x-axis-min" />
								</div>
								<div class="input-wrapper">
									<label for="chart-x-axis-prefix">X-Axis Prefix</label>
									<input class="form-control" type="text" name="chart-x-axis-prefix" />
								</div>
								<div class="input-wrapper">
									<label for="chart-x-axis-suffix">X-Axis Suffix</label>
									<input class="form-control" type="text" name="chart-x-axis-suffix" />
								</div>
								<div class="input-wrapper">
									<label for="chart-x-axis-format">X-Axis No of decimal places</label>
									<input class="form-control" type="text" name="chart-x-axis-format" />
								</div>
								<div class="input-wrapper">
									<label for="chart-y-scale">X-Axis Scale</label>
									<select class="form-control" type="text" name="chart-x-axis-scale">
										<option value="linear">Linear</option>
										<option value="log">Log</option>
									</select>
								</div>
								<div class="input-wrapper axis-scale-selector-wrapper">
									<label for="x-axis-scale-selector">
										<input type="checkbox" name="x-axis-scale-selector" />
										User can select X axis scale
									</label>
								</div>
							</div>
						</div>
					</section>
				</div>
				<div id="styling-tab" class="tab-pane">
                    <section class="form-section logo-section">
                        <div class="form-section-header">
                            <h2><span class="form-section-digit">i</span>Logos</h2>
                        </div>
                        <div class="form-section-content">
                            <select name="logo" class="form-control logo-select">
                                <option value="" disabled selected>Select type</option>
                                @foreach( $data->logos as $logoId=>$logoName )
                                    <option value="{{ $logoId }}">{{ $logoName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </section>
					<section class="form-section type-of-line-section">
						<div class="form-section-header">
							<h2><span class="form-section-digit">i</span>Choose Type of Line</h2>
						</div>
						<div class="form-section-content">
							<label>
								<input type="radio" name="line-type" value="0"/>
								Line with dots
							</label>
							<label>
								<input type="radio" name="line-type" value="1"/>
								Line without dots
							</label>
							{{-- <label>
								<input type="radio" name="line-type" value="2"/>
								Do not join values if observations are missing
							</label> --}}
							<label>
								<input type="radio" name="line-type" value="3"/>
								Dotted with dashed line for missing observations
							</label>
							<br>
							<label style="display: none;">
								Maximum year gap to tolerate
								<input type="input" class="form-control" name="line-tolerance" value=""/>
							</label>
						</div>
					</section>
					<section class="form-section margins-section">
						<div class="form-section-header">
							<h2><span class="form-section-digit">j</span>Set margins</h2>
						</div>
						<div class="form-section-content">
							<label>
								<span>Margin top</span>
								<input type="input" class="form-control" name="margin-top" value=""/>
							</label>
							<label>
								<span>Margin right</span>
								<input type="input" class="form-control" name="margin-right" value=""/>
							</label>
							<label>
								<span>Margin bottom</span>
								<input type="input" class="form-control" name="margin-bottom" value=""/>
							</label>
							<label>
								<span>Margin left</span>
								<input type="input" class="form-control" name="margin-left" value=""/>
							</label>
						</div>
					</section>
					<section class="form-section legend-section">
						<div class="form-section-header">
							<h2><span class="form-section-digit">k</span>Legend</h2>
						</div>
						<div class="form-section-content">
							<label class="clickable">
								<input type="checkbox" name="hide-legend" />
								Hide legend
							</label><br>
							<label>
								<span>Type of entity shown</span>
								<input type="input" class="form-control" name="entity-type" value=""/>
							</label>
						</div>
					</section>
					<section class="form-section units-section">
						<div class="form-section-header">
							<h2><span class="form-section-digit">l</span>Popup Units</h2>
						</div>
						<div class="form-section-content">
						</div>
					</section>
				</div>
				<div id="export-tab" class="tab-pane">
					<section class="form-section tabs-section">
						<div class="form-section-header">
							<h2><span class="form-section-digit">m</span>Which tabs</h2>
						</div>
						<div class="form-section-content">
							<ol>
								<li>
									<label class="chart-tab-check">
										<input type="checkbox" value="chart" />
										Chart tab
									</label>
								</li>	
								<li>
									<label class="data-tab-check">
										<input type="checkbox" value="data" />
										Data tab
									</label>
								</li>
								<li>
									<label class="map-tab-check">
										<input type="checkbox" value="map" />
										Map tab
									</label>
								</li>
								<li>
									<label class="sources-tab-check">
										<input type="checkbox" value="sources" />
										Sources tab
									</label>
								</li>
							</ol>
							<label>
								<span>Open by default:</span>
								<select type="text" name="default-tab" class="form-control">
									<option value="chart">Chart tab</option>
									<option value="data">Data tab</option>
									<option value="map">Map tab</option>
									<option value="sources">Sources tab</option>
								</select>
							</label>
						</div>
					</section>
					<section class="form-section">
						<div class="form-section-header embed-section">
							<h2><span class="form-section-digit">n</span>Embed your chart</h2>
						</div>
						<div class="form-section-content">
							<p class="form-section-desc">Copy and paste code below to use the chart on your page.</p>
							<textarea rows="4" cols="50" name="iframe" @if (isset($chart)) data-view-url="{!! route( 'view', $chart->id ) !!}" @endif placeholder="No chart created, yet. Click 'Create chart' button at the bottom to get code for embedding." readonly></textarea>
						</div>
					</section>
				</div>
				<div id="map-tab" class="tab-pane">
					<section class="form-section map-variable-section">
						<div class="form-section-header">
							<h2><span class="form-section-digit">p</span>Which variable on map</h2>
						</div>
						<div class="form-section-content">
							<select name="map-variable-id" class="form-control">
							<select>
						</div>
					</section>
					<section class="form-section map-timeline-section">
						<div class="form-section-header">
							<h2><span class="form-section-digit">q</span>Timeline</h2>
						</div>
						<div class="form-section-content">
							<label>
								<i class="fa fa-info-circle" data-toggle="tooltip" title="Specify a range of years from which to pull data. For example, if the map shows 1990 and tolerance is set to 1, then data from 1989 or 1991 will be shown if no data is available for 1990."></i>
								Tolerance of data:
								<input name="map-time-tolerance" class="form-control" placeholder="Tolerance of data" />
							</label>
							<label>
								Switch between years, using:
								<select name="map-time-mode" class="form-control">
									<option value="slider">Slider</option>
									<option value="buttons">Buttons</option>
								</select>
							</label>
							<div class="form-group">
								<i class="fa fa-info-circle" data-toggle="tooltip" title="Various ranges can be specified. For example: <br>&quot;1990 to 2000 every 5; 2003; 2009&quot;<br>Will show the years 1990, 1995, 2000, 2003 and 2009."></i>&nbsp;<label>Years to show:</label>
								<input name="map-time-ranges" class="form-control" data-toggle="tooltip" placeholder="first to last every 1" />
							</div>
							<label>
								Default year to show:
								<select name="map-default-year" class="form-control"></select>
							</label>
						</div>
					</section>
					<section class="form-section map-colors-section">
						<div class="form-section-header">
							<h2><span class="form-section-digit">r</span>Colors</h2>
						</div>
						<div class="form-section-content">
							<label>
								<a href="http://www.datavis.ca/sasmac/brewerpal.html" title="Color brewer schemes" target="_blank"><i class="fa fa-info-circle"></i></a> Color scheme:
								<select name="map-color-scheme" class="form-control"></select>
							</label>
							<label>
								Number of intervals:
								<input name="map-color-interval" type="number" class="form-control" min="0" max="99" />
							</label>
							<label>
								<input name="map-color-invert" type="checkbox"/>
								Invert colors
							</label>
							<label>
								<input name="map-color-automatic-classification" type="checkbox" checked/>
								Automatically classify data
							</label>
							<ul class="map-color-scheme-preview clearfix automatic-values">

							</ul>
						</div>
					</section>
					<section class="form-section map-regions-section">
						<div class="form-section-header">
							<h2><span class="form-section-digit">s</span>Displayed map section</h2>
						</div>
						<div class="form-section-content">
							<label>
								Which region map should be focused on:
								<select name="map-default-projection" class="form-control"></select>
							</label>
						</div>
					</section>
					<section class="form-section map-legend-section">
						<div class="form-section-header">
							<h2><span class="form-section-digit">t</span>Legend</h2>
						</div>
						<div class="form-section-content">
<!--							<label>
								Legend orientation:
								<select name="map-legend-orientation" class="form-control">
									<option value="landscape">Landscape</option>
									<option value="portrait">Portrait</option>
								</select>
							</label>-->
							<label>
								Legend description:
								<input type="text" name="map-legend-description" class="form-control" />
							</label>
						</div>
					</section>
				</div>
			</div>
			<section class="form-section form-section-submit">
				<button id="save-chart" type="submit" class="btn btn-lg btn-success btn-primary">{{ $submitLabel }}</button>
				@if ($submitLabel == "Update chart")
					<button id="save-as-new" class="btn btn-lg btn-primary">Save as new</button>
					<button id="publish-toggle" class="btn btn-lg btn-danger">Publish</button>
				@endif
			</section>
		{!! Form::close() !!}
	</div>
</div>
