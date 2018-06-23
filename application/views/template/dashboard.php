<div class="row row-cards">
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                      6%
                      <i class="fe fe-chevron-up"></i>
                    </div>
                    <div class="h1 m-0">43</div>
                    <div class="text-muted mb-4">New Tickets</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-red">
                      -3%
                      <i class="fe fe-chevron-down"></i>
                    </div>
                    <div class="h1 m-0">17</div>
                    <div class="text-muted mb-4">Closed Today</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                      9%
                      <i class="fe fe-chevron-up"></i>
                    </div>
                    <div class="h1 m-0">7</div>
                    <div class="text-muted mb-4">New Replies</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                      3%
                      <i class="fe fe-chevron-up"></i>
                    </div>
                    <div class="h1 m-0">27.3K</div>
                    <div class="text-muted mb-4">Followers</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-red">
                      -2%
                      <i class="fe fe-chevron-down"></i>
                    </div>
                    <div class="h1 m-0">$95</div>
                    <div class="text-muted mb-4">Daily Earnings</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-red">
                      -1%
                      <i class="fe fe-chevron-down"></i>
                    </div>
                    <div class="h1 m-0">621</div>
                    <div class="text-muted mb-4">Products</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Development Activity</h3>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-striped table-vcenter">
                      <thead>
                        <tr>
                          <th colspan="2">User</th>
                          <th>Commit</th>
                          <th>Date</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="w-1"><span class="avatar" style="background-image: url(./demo/faces/male/9.jpg)"></span></td>
                          <td>Ronald Bradley</td>
                          <td>Initial commit</td>
                          <td class="text-nowrap">May 6, 2018</td>
                          <td class="w-1"><a href="#" class="icon"><i class="fe fe-trash"></i></a></td>
                        </tr>
                        <tr>
                          <td><span class="avatar">BM</span></td>
                          <td>Russell Gibson</td>
                          <td>Main structure</td>
                          <td class="text-nowrap">April 22, 2018</td>
                          <td><a href="#" class="icon"><i class="fe fe-trash"></i></a></td>
                        </tr>
                        <tr>
                          <td><span class="avatar" style="background-image: url(./demo/faces/female/1.jpg)"></span></td>
                          <td>Beverly Armstrong</td>
                          <td>Left sidebar adjustments</td>
                          <td class="text-nowrap">April 15, 2018</td>
                          <td><a href="#" class="icon"><i class="fe fe-trash"></i></a></td>
                        </tr>
                        <tr>
                          <td><span class="avatar" style="background-image: url(./demo/faces/male/4.jpg)"></span></td>
                          <td>Bobby Knight</td>
                          <td>Topbar dropdown style</td>
                          <td class="text-nowrap">April 8, 2018</td>
                          <td><a href="#" class="icon"><i class="fe fe-trash"></i></a></td>
                        </tr>
                        <tr>
                          <td><span class="avatar" style="background-image: url(./demo/faces/female/11.jpg)"></span></td>
                          <td>Sharon Wells</td>
                          <td>Fixes #625</td>
                          <td class="text-nowrap">April 9, 2018</td>
                          <td><a href="#" class="icon"><i class="fe fe-trash"></i></a></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <script>
                  require(['c3', 'jquery'], function(c3, $) {
                  	$(document).ready(function(){
                  		var chart = c3.generate({
                  			bindto: '#chart-development-activity', // id of chart wrapper
                  			data: {
                  				columns: [
                  				    // each columns data
                  					['data1', 0, 5, 1, 2, 7, 5, 6, 8, 24, 7, 12, 5, 6, 3, 2, 2, 6, 30, 10, 10, 15, 14, 47, 65, 55]
                  				],
                  				type: 'area', // default type of chart
                  				groups: [
                  					[ 'data1', 'data2', 'data3']
                  				],
                  				colors: {
                  					'data1': tabler.colors["blue"]
                  				},
                  				names: {
                  				    // name of each serie
                  					'data1': 'Purchases'
                  				}
                  			},
                  			axis: {
                  				y: {
                  					padding: {
                  						bottom: 0,
                  					},
                  					show: false,
                  						tick: {
                  						outer: false
                  					}
                  				},
                  				x: {
                  					padding: {
                  						left: 0,
                  						right: 0
                  					},
                  					show: false
                  				}
                  			},
                  			legend: {
                  				position: 'inset',
                  				padding: 0,
                  				inset: {
                                      anchor: 'top-left',
                  					x: 20,
                  					y: 8,
                  					step: 10
                  				}
                  			},
                  			tooltip: {
                  				format: {
                  					title: function (x) {
                  						return '';
                  					}
                  				}
                  			},
                  			padding: {
                  				bottom: 0,
                  				left: -1,
                  				right: -1
                  			},
                  			point: {
                  				show: false
                  			}
                  		});
                  	});
                  });
                </script>
              </div>
              <div class="col-md-6">
                <div class="alert alert-primary">Are you in trouble? <a href="./docs/index.html" class="alert-link">Read our documentation</a> with code samples.</div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Chart title</h3>
                      </div>
                      <div class="card-body">
                        <div id="chart-donut" style="height: 12rem; max-height: 192px; position: relative;" class="c3"><svg width="226" height="192" style="overflow: hidden;"><defs><clipPath id="c3-1524461142068-clip"><rect width="226" height="188"></rect></clipPath><clipPath id="c3-1524461142068-clip-xaxis"><rect x="-31" y="-20" width="288" height="20"></rect></clipPath><clipPath id="c3-1524461142068-clip-yaxis"><rect x="-29" y="-4" width="20" height="212"></rect></clipPath><clipPath id="c3-1524461142068-clip-grid"><rect width="226" height="188"></rect></clipPath><clipPath id="c3-1524461142068-clip-subchart"><rect width="226"></rect></clipPath></defs><g transform="translate(0.5,4.5)"><text class="c3-text c3-empty" text-anchor="middle" dominant-baseline="middle" x="113" y="94" style="opacity: 0;"></text><rect class="c3-zoom-rect" width="226" height="188" style="opacity: 0;"></rect><g clip-path="url(https://tabler.github.io/tabler/#c3-1524461142068-clip)" class="c3-regions" style="visibility: hidden;"></g><g clip-path="url(https://tabler.github.io/tabler/#c3-1524461142068-clip-grid)" class="c3-grid" style="visibility: hidden;"><g class="c3-xgrid-focus"><line class="c3-xgrid-focus" x1="-10" x2="-10" y1="0" y2="188" style="visibility: hidden;"></line></g></g><g clip-path="url(https://tabler.github.io/tabler/#c3-1524461142068-clip)" class="c3-chart"><g class="c3-event-rects c3-event-rects-single" style="fill-opacity: 0;"><rect class=" c3-event-rect c3-event-rect-0" x="0" y="0" width="226" height="188"></rect></g><g class="c3-chart-bars"><g class="c3-chart-bar c3-target c3-target-data1" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-data1 c3-bars c3-bars-data1" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-data2" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-data2 c3-bars c3-bars-data2" style="cursor: pointer;"></g></g></g><g class="c3-chart-lines"><g class="c3-chart-line c3-target c3-target-data1" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-data1 c3-lines c3-lines-data1"></g><g class=" c3-shapes c3-shapes-data1 c3-areas c3-areas-data1"></g><g class=" c3-selected-circles c3-selected-circles-data1"></g><g class=" c3-shapes c3-shapes-data1 c3-circles c3-circles-data1" style="cursor: pointer;"></g></g><g class="c3-chart-line c3-target c3-target-data2" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-data2 c3-lines c3-lines-data2"></g><g class=" c3-shapes c3-shapes-data2 c3-areas c3-areas-data2"></g><g class=" c3-selected-circles c3-selected-circles-data2"></g><g class=" c3-shapes c3-shapes-data2 c3-circles c3-circles-data2" style="cursor: pointer;"></g></g></g><g class="c3-chart-arcs" transform="translate(113,89)"><text class="c3-chart-arcs-title" style="text-anchor: middle; opacity: 1;"></text><g class="c3-chart-arc c3-target c3-target-data1"><g class=" c3-shapes c3-shapes-data1 c3-arcs c3-arcs-data1"><path class=" c3-shape c3-shape c3-arc c3-arc-data1" transform="" style="fill: rgb(94, 186, 0); cursor: pointer;" d="M5.177194343395436e-15,-84.55A84.55,84.55 0 1,1 -61.63429744848035,57.87845780627061L-36.980578469088215,34.72707468376237A50.73,50.73 0 1,0 3.106316606037261e-15,-50.73Z"></path></g><text dy=".35em" class="" transform="translate(58.13631395723388,25.157829567123475)" style="opacity: 1; text-anchor: middle; pointer-events: none;">63.0%</text></g><g class="c3-chart-arc c3-target c3-target-data2"><g class=" c3-shapes c3-shapes-data2 c3-arcs c3-arcs-data2"><path class=" c3-shape c3-shape c3-arc c3-arc-data2" transform="" style="fill: rgb(142, 207, 77); cursor: pointer;" d="M-61.63429744848035,57.87845780627061A84.55,84.55 0 0,1 -1.5531583030186305e-14,-84.55L-9.318949818111782e-15,-50.73A50.73,50.73 0 0,0 -36.980578469088215,34.72707468376237Z"></path></g><text dy=".35em" class="" transform="translate(-58.13631395723389,-25.157829567123482)" style="opacity: 1; text-anchor: middle; pointer-events: none;">37.0%</text></g></g><g class="c3-chart-texts"><g class="c3-chart-text c3-target c3-target-data1" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-data1"></g></g><g class="c3-chart-text c3-target c3-target-data2" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-data2"></g></g></g></g><g clip-path="url(https://tabler.github.io/tabler/#c3-1524461142068-clip-grid)" class="c3-grid c3-grid-lines"><g class="c3-xgrid-lines"></g><g class="c3-ygrid-lines"></g></g><g class="c3-axis c3-axis-x" clip-path="url(https://tabler.github.io/tabler/#c3-1524461142068-clip-xaxis)" transform="translate(0,188)" style="visibility: visible; opacity: 0;"><text class="c3-axis-x-label" transform="" style="text-anchor: end;" x="226" dx="-0.5em" dy="-0.5em"></text><g class="tick" transform="translate(113, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">0</tspan></text></g><path class="domain" d="M0,6V0H226V6"></path></g><g class="c3-axis c3-axis-y" clip-path="url(https://tabler.github.io/tabler/#c3-1524461142068-clip-yaxis)" transform="translate(0,0)" style="visibility: visible; opacity: 0;"><text class="c3-axis-y-label" transform="rotate(-90)" style="text-anchor: end;" x="0" dx="-0.5em" dy="1.2em"></text><g class="tick" transform="translate(0,185)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">35</tspan></text></g><g class="tick" transform="translate(0,155)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">40</tspan></text></g><g class="tick" transform="translate(0,125)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">45</tspan></text></g><g class="tick" transform="translate(0,95)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">50</tspan></text></g><g class="tick" transform="translate(0,65)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">55</tspan></text></g><g class="tick" transform="translate(0,35)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">60</tspan></text></g><g class="tick" transform="translate(0,5)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">65</tspan></text></g><path class="domain" d="M-6,1H0V188H-6"></path></g><g class="c3-axis c3-axis-y2" transform="translate(226,0)" style="visibility: hidden; opacity: 0;"><text class="c3-axis-y2-label" transform="rotate(-90)" style="text-anchor: end;" x="0" dx="-0.5em" dy="-0.5em"></text><g class="tick" transform="translate(0,188)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0</tspan></text></g><g class="tick" transform="translate(0,170)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.1</tspan></text></g><g class="tick" transform="translate(0,151)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.2</tspan></text></g><g class="tick" transform="translate(0,132)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.3</tspan></text></g><g class="tick" transform="translate(0,114)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.4</tspan></text></g><g class="tick" transform="translate(0,95)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.5</tspan></text></g><g class="tick" transform="translate(0,76)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.6</tspan></text></g><g class="tick" transform="translate(0,58)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.7</tspan></text></g><g class="tick" transform="translate(0,39)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.8</tspan></text></g><g class="tick" transform="translate(0,20)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.9</tspan></text></g><g class="tick" transform="translate(0,1)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">1</tspan></text></g><path class="domain" d="M6,1H0V188H6"></path></g></g><g transform="translate(0.5,192.5)" style="visibility: hidden;"><g clip-path="url(https://tabler.github.io/tabler/#c3-1524461142068-clip-subchart)" class="c3-chart"><g class="c3-chart-bars"></g><g class="c3-chart-lines"></g></g><g clip-path="url(https://tabler.github.io/tabler/#c3-1524461142068-clip)" class="c3-brush" style="pointer-events: all; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><rect class="background" x="0" width="226" style="visibility: hidden; cursor: crosshair;"></rect><rect class="extent" x="0" width="0" style="cursor: move;"></rect><g class="resize e" transform="translate(0,0)" style="cursor: ew-resize; display: none;"><rect x="-3" width="6" height="6" style="visibility: hidden;"></rect></g><g class="resize w" transform="translate(0,0)" style="cursor: ew-resize; display: none;"><rect x="-3" width="6" height="6" style="visibility: hidden;"></rect></g></g><g class="c3-axis-x" transform="translate(0,0)" clip-path="url(https://tabler.github.io/tabler/#c3-1524461142068-clip-xaxis)" style="visibility: hidden; opacity: 0;"><g class="tick" transform="translate(113, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">0</tspan></text></g><path class="domain" d="M0,6V0H226V6"></path></g></g><g transform="translate(0,192)" style="visibility: hidden;"></g><text class="c3-title" x="113" y="0"></text></svg><div class="c3-tooltip-container" style="position: absolute; pointer-events: none; display: none;"></div></div>
                      </div>
                    </div>
                    <script>
                      require(['c3', 'jquery'], function(c3, $) {
                      	$(document).ready(function(){
                      		var chart = c3.generate({
                      			bindto: '#chart-donut', // id of chart wrapper
                      			data: {
                      				columns: [
                      				    // each columns data
                      					['data1', 63],
                      					['data2', 37]
                      				],
                      				type: 'donut', // default type of chart
                      				colors: {
                      					'data1': tabler.colors["green"],
                      					'data2': tabler.colors["green-light"]
                      				},
                      				names: {
                      				    // name of each serie
                      					'data1': 'Maximum',
                      					'data2': 'Minimum'
                      				}
                      			},
                      			axis: {
                      			},
                      			legend: {
                                      show: false, //hide legend
                      			},
                      			padding: {
                      				bottom: 0,
                      				top: 0
                      			},
                      		});
                      	});
                      });
                    </script>
                  </div>
                  <div class="col-sm-6">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Chart title</h3>
                      </div>
                      <div class="card-body">
                        <div id="chart-pie" style="height: 12rem; max-height: 192px; position: relative;" class="c3"><svg width="226" height="192" style="overflow: hidden;"><defs><clipPath id="c3-1524461142112-clip"><rect width="226" height="188"></rect></clipPath><clipPath id="c3-1524461142112-clip-xaxis"><rect x="-31" y="-20" width="288" height="20"></rect></clipPath><clipPath id="c3-1524461142112-clip-yaxis"><rect x="-29" y="-4" width="20" height="212"></rect></clipPath><clipPath id="c3-1524461142112-clip-grid"><rect width="226" height="188"></rect></clipPath><clipPath id="c3-1524461142112-clip-subchart"><rect width="226"></rect></clipPath></defs><g transform="translate(0.5,4.5)"><text class="c3-text c3-empty" text-anchor="middle" dominant-baseline="middle" x="113" y="94" style="opacity: 0;"></text><rect class="c3-zoom-rect" width="226" height="188" style="opacity: 0;"></rect><g clip-path="url(https://tabler.github.io/tabler/#c3-1524461142112-clip)" class="c3-regions" style="visibility: hidden;"></g><g clip-path="url(https://tabler.github.io/tabler/#c3-1524461142112-clip-grid)" class="c3-grid" style="visibility: hidden;"><g class="c3-xgrid-focus"><line class="c3-xgrid-focus" x1="-10" x2="-10" y1="0" y2="188" style="visibility: hidden;"></line></g></g><g clip-path="url(https://tabler.github.io/tabler/#c3-1524461142112-clip)" class="c3-chart"><g class="c3-event-rects c3-event-rects-single" style="fill-opacity: 0;"><rect class=" c3-event-rect c3-event-rect-0" x="0" y="0" width="226" height="188"></rect></g><g class="c3-chart-bars"><g class="c3-chart-bar c3-target c3-target-data1" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-data1 c3-bars c3-bars-data1" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-data2" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-data2 c3-bars c3-bars-data2" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-data3" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-data3 c3-bars c3-bars-data3" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-data4" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-data4 c3-bars c3-bars-data4" style="cursor: pointer;"></g></g></g><g class="c3-chart-lines"><g class="c3-chart-line c3-target c3-target-data1" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-data1 c3-lines c3-lines-data1"></g><g class=" c3-shapes c3-shapes-data1 c3-areas c3-areas-data1"></g><g class=" c3-selected-circles c3-selected-circles-data1"></g><g class=" c3-shapes c3-shapes-data1 c3-circles c3-circles-data1" style="cursor: pointer;"></g></g><g class="c3-chart-line c3-target c3-target-data2" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-data2 c3-lines c3-lines-data2"></g><g class=" c3-shapes c3-shapes-data2 c3-areas c3-areas-data2"></g><g class=" c3-selected-circles c3-selected-circles-data2"></g><g class=" c3-shapes c3-shapes-data2 c3-circles c3-circles-data2" style="cursor: pointer;"></g></g><g class="c3-chart-line c3-target c3-target-data3" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-data3 c3-lines c3-lines-data3"></g><g class=" c3-shapes c3-shapes-data3 c3-areas c3-areas-data3"></g><g class=" c3-selected-circles c3-selected-circles-data3"></g><g class=" c3-shapes c3-shapes-data3 c3-circles c3-circles-data3" style="cursor: pointer;"></g></g><g class="c3-chart-line c3-target c3-target-data4" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-data4 c3-lines c3-lines-data4"></g><g class=" c3-shapes c3-shapes-data4 c3-areas c3-areas-data4"></g><g class=" c3-selected-circles c3-selected-circles-data4"></g><g class=" c3-shapes c3-shapes-data4 c3-circles c3-circles-data4" style="cursor: pointer;"></g></g></g><g class="c3-chart-arcs" transform="translate(113,89)"><text class="c3-chart-arcs-title" style="text-anchor: middle; opacity: 0;"></text><g class="c3-chart-arc c3-target c3-target-data1"><g class=" c3-shapes c3-shapes-data1 c3-arcs c3-arcs-data1"><path class=" c3-shape c3-shape c3-arc c3-arc-data1" transform="" style="fill: rgb(28, 51, 83); cursor: pointer;" d="M5.177194343395436e-15,-84.55A84.55,84.55 0 0,1 13.916472608236058,83.39684820270017L0,0Z"></path></g><text dy=".35em" class="" transform="translate(63.129890440123766,-5.231091863126733)" style="opacity: 1; text-anchor: middle; pointer-events: none;">47.4%</text></g><g class="c3-chart-arc c3-target c3-target-data2"><g class=" c3-shapes c3-shapes-data2 c3-arcs c3-arcs-data2"><path class=" c3-shape c3-shape c3-arc c3-arc-data2" transform="" style="fill: rgb(70, 127, 207); cursor: pointer;" d="M13.916472608236058,83.39684820270017A84.55,84.55 0 0,1 -79.63904040818569,-28.395875455131968L0,0Z"></path></g><text dy=".35em" class="" transform="translate(-48.579434569848,40.65446993795834)" style="opacity: 1; text-anchor: middle; pointer-events: none;">33.1%</text></g><g class="c3-chart-arc c3-target c3-target-data3"><g class=" c3-shapes c3-shapes-data3 c3-arcs c3-arcs-data3"><path class=" c3-shape c3-shape c3-arc c3-arc-data3" transform="" style="fill: rgb(126, 165, 221); cursor: pointer;" d="M-45.405285223061064,-71.3236466665332A84.55,84.55 0 0,1 -1.5531583030186305e-14,-84.55L0,0Z"></path></g><text dy=".35em" class="" transform="translate(-17.71614257954589,-60.818464968820955)" style="opacity: 1; text-anchor: middle; pointer-events: none;">9.0%</text></g><g class="c3-chart-arc c3-target c3-target-data4"><g class=" c3-shapes c3-shapes-data4 c3-arcs c3-arcs-data4"><path class=" c3-shape c3-shape c3-arc c3-arc-data4" transform="" style="fill: rgb(200, 217, 241); cursor: pointer;" d="M-79.63904040818569,-28.395875455131968A84.55,84.55 0 0,1 -45.405285223061064,-71.3236466665332L0,0Z"></path></g><text dy=".35em" class="" transform="translate(-49.52609254629045,-39.49574086099379)" style="opacity: 1; text-anchor: middle; pointer-events: none;">10.5%</text></g></g><g class="c3-chart-texts"><g class="c3-chart-text c3-target c3-target-data1" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-data1"></g></g><g class="c3-chart-text c3-target c3-target-data2" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-data2"></g></g><g class="c3-chart-text c3-target c3-target-data3" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-data3"></g></g><g class="c3-chart-text c3-target c3-target-data4" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-data4"></g></g></g></g><g clip-path="url(https://tabler.github.io/tabler/#c3-1524461142112-clip-grid)" class="c3-grid c3-grid-lines"><g class="c3-xgrid-lines"></g><g class="c3-ygrid-lines"></g></g><g class="c3-axis c3-axis-x" clip-path="url(https://tabler.github.io/tabler/#c3-1524461142112-clip-xaxis)" transform="translate(0,188)" style="visibility: visible; opacity: 0;"><text class="c3-axis-x-label" transform="" style="text-anchor: end;" x="226" dx="-0.5em" dy="-0.5em"></text><g class="tick" transform="translate(113, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">0</tspan></text></g><path class="domain" d="M0,6V0H226V6"></path></g><g class="c3-axis c3-axis-y" clip-path="url(https://tabler.github.io/tabler/#c3-1524461142112-clip-yaxis)" transform="translate(0,0)" style="visibility: visible; opacity: 0;"><text class="c3-axis-y-label" transform="rotate(-90)" style="text-anchor: end;" x="0" dx="-0.5em" dy="1.2em"></text><g class="tick" transform="translate(0,179)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">10</tspan></text></g><g class="tick" transform="translate(0,164)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">15</tspan></text></g><g class="tick" transform="translate(0,148)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">20</tspan></text></g><g class="tick" transform="translate(0,133)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">25</tspan></text></g><g class="tick" transform="translate(0,118)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">30</tspan></text></g><g class="tick" transform="translate(0,103)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">35</tspan></text></g><g class="tick" transform="translate(0,87)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">40</tspan></text></g><g class="tick" transform="translate(0,72)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">45</tspan></text></g><g class="tick" transform="translate(0,57)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">50</tspan></text></g><g class="tick" transform="translate(0,42)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">55</tspan></text></g><g class="tick" transform="translate(0,26)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">60</tspan></text></g><g class="tick" transform="translate(0,11)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">65</tspan></text></g><path class="domain" d="M-6,1H0V188H-6"></path></g><g class="c3-axis c3-axis-y2" transform="translate(226,0)" style="visibility: hidden; opacity: 0;"><text class="c3-axis-y2-label" transform="rotate(-90)" style="text-anchor: end;" x="0" dx="-0.5em" dy="-0.5em"></text><g class="tick" transform="translate(0,188)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0</tspan></text></g><g class="tick" transform="translate(0,170)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.1</tspan></text></g><g class="tick" transform="translate(0,151)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.2</tspan></text></g><g class="tick" transform="translate(0,132)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.3</tspan></text></g><g class="tick" transform="translate(0,114)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.4</tspan></text></g><g class="tick" transform="translate(0,95)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.5</tspan></text></g><g class="tick" transform="translate(0,76)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.6</tspan></text></g><g class="tick" transform="translate(0,58)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.7</tspan></text></g><g class="tick" transform="translate(0,39)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.8</tspan></text></g><g class="tick" transform="translate(0,20)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.9</tspan></text></g><g class="tick" transform="translate(0,1)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">1</tspan></text></g><path class="domain" d="M6,1H0V188H6"></path></g></g><g transform="translate(0.5,192.5)" style="visibility: hidden;"><g clip-path="url(https://tabler.github.io/tabler/#c3-1524461142112-clip-subchart)" class="c3-chart"><g class="c3-chart-bars"></g><g class="c3-chart-lines"></g></g><g clip-path="url(https://tabler.github.io/tabler/#c3-1524461142112-clip)" class="c3-brush" style="pointer-events: all; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><rect class="background" x="0" width="226" style="visibility: hidden; cursor: crosshair;"></rect><rect class="extent" x="0" width="0" style="cursor: move;"></rect><g class="resize e" transform="translate(0,0)" style="cursor: ew-resize; display: none;"><rect x="-3" width="6" height="6" style="visibility: hidden;"></rect></g><g class="resize w" transform="translate(0,0)" style="cursor: ew-resize; display: none;"><rect x="-3" width="6" height="6" style="visibility: hidden;"></rect></g></g><g class="c3-axis-x" transform="translate(0,0)" clip-path="url(https://tabler.github.io/tabler/#c3-1524461142112-clip-xaxis)" style="visibility: hidden; opacity: 0;"><g class="tick" transform="translate(113, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">0</tspan></text></g><path class="domain" d="M0,6V0H226V6"></path></g></g><g transform="translate(0,192)" style="visibility: hidden;"></g><text class="c3-title" x="113" y="0"></text></svg><div class="c3-tooltip-container" style="position: absolute; pointer-events: none; display: none;"></div></div>
                      </div>
                    </div>
                    <script>
                      require(['c3', 'jquery'], function(c3, $) {
                      	$(document).ready(function(){
                      		var chart = c3.generate({
                      			bindto: '#chart-pie', // id of chart wrapper
                      			data: {
                      				columns: [
                      				    // each columns data
                      					['data1', 63],
                      					['data2', 44],
                      					['data3', 12],
                      					['data4', 14]
                      				],
                      				type: 'pie', // default type of chart
                      				colors: {
                      					'data1': tabler.colors["blue-darker"],
                      					'data2': tabler.colors["blue"],
                      					'data3': tabler.colors["blue-light"],
                      					'data4': tabler.colors["blue-lighter"]
                      				},
                      				names: {
                      				    // name of each serie
                      					'data1': 'A',
                      					'data2': 'B',
                      					'data3': 'C',
                      					'data4': 'D'
                      				}
                      			},
                      			axis: {
                      			},
                      			legend: {
                                      show: false, //hide legend
                      			},
                      			padding: {
                      				bottom: 0,
                      				top: 0
                      			},
                      		});
                      	});
                      });
                    </script>
                  </div>
                  <div class="col-sm-6">
                    <div class="card">
                      <div class="card-body text-center">
                        <div class="h5">New feedback</div>
                        <div class="display-4 font-weight-bold mb-4">62</div>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-red" style="width: 28%"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="card">
                      <div class="card-body text-center">
                        <div class="h5">Today profit</div>
                        <div class="display-4 font-weight-bold mb-4">$652</div>
                        <div class="progress progress-sm">
                          <div class="progress-bar bg-green" style="width: 84%"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-blue mr-3">
                      <i class="fe fe-dollar-sign"></i>
                    </span>
                    <div>
                      <h4 class="m-0"><a href="javascript:void(0)">132 <small>Sales</small></a></h4>
                      <small class="text-muted">12 waiting payments</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-green mr-3">
                      <i class="fe fe-shopping-cart"></i>
                    </span>
                    <div>
                      <h4 class="m-0"><a href="javascript:void(0)">78 <small>Orders</small></a></h4>
                      <small class="text-muted">32 shipped</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-red mr-3">
                      <i class="fe fe-users"></i>
                    </span>
                    <div>
                      <h4 class="m-0"><a href="javascript:void(0)">1,352 <small>Members</small></a></h4>
                      <small class="text-muted">163 registered today</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="card p-3">
                  <div class="d-flex align-items-center">
                    <span class="stamp stamp-md bg-yellow mr-3">
                      <i class="fe fe-message-square"></i>
                    </span>
                    <div>
                      <h4 class="m-0"><a href="javascript:void(0)">132 <small>Comments</small></a></h4>
                      <small class="text-muted">16 waiting</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>