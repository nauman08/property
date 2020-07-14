@extends('layouts.admin')

@section('pagename')
Library
@endsection

@section('content')

<style>

.swal2-container.swal2-center {
    align-items: flex-start !important;
}
.swal2-modal{
           margin:0px !important;
           margin-top:100px !important;
           width:60em;
}
.swal2-content {
    font-size:18px;
}
.swal2-header .swal2-title {
    font-size:40px;
}
.swal2-confirm .swal2-styled{
    padding 10px 40px;
}
.lia {

    list-style-type: none;
    /* display: flex; */
    margin-right: 20px;
    margin-bottom: 15px;
    background-color: #fff;
    padding: 10px 39px;
    min-height: 130px;
    display: flex;
    align-items: center;
    justify-content: center ;
    position:relative;

    -webkit-box-shadow: 0px 0px 18px -5px rgba(189,189,189,1);
-moz-box-shadow: 0px 0px 18px -5px rgba(189,189,189,1);
box-shadow: 0px 0px 18px -5px rgba(189,189,189,1);
}

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance:textfield;
}

</style>

    <div class="row-fluid">
    	<div class="span12">
      		<div class="widget-box">



	    		<p id="percentage-msg" class="text-danger text-left" style="margin-top: -30px;"></p>

	    		<div class="widget-content nopadding">
	    		    <div class="container-fluid">

              <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-default">
                      <div class="panel-body" style="color:white;">
                       <div id="chart1" style="width:100%; height:400px;"></div>
                      </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                      <div class="panel-body">
                       <div id="chart2" style="width:100%; height:400px;"></div>
                      </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div id="chart3" style="width:100%; height:400px;"></div>
                      </div>
                    </div>
                </div>

	    		    </div>
              <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <table id="example" class="table table-striped table-bordered">
                          <thead>
                            <th>Sr. No</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>School</th>                              
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td>Nauman</td>
                              <td>11th</td>
                              <td>Saint Marrys</td>
                            </tr>
                            <tr>
                              <td>2</td>
                              <td>Asim</td>
                              <td>10th</td>
                              <td>Saint Pattrics</td>
                            </tr>
                            <tr>
                              <td>3</td>
                              <td>Arslan</td>
                              <td>9th</td>
                              <td>Educator</td>
                            </tr>
                          </tbody>                       
                        </table>
                      </div>
                    </div>
                </div>
	    		</div>

    	</div>

   	</div>


	<!-- Modal Code Start Vouchers -->

<div class="modal fade" id="transferHistory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Transfer History</h4>
      </div>
      <div class="modal-body">
          <div class="container-fluid">
              <div class="row" style="margin-bottom:25px;">
                  <p style="display:inline;font-size:x-large;">Total Balance</p>
                  <p style="display:inline; float:right;font-size:xx-large;color:darkgray;" id="totalAmount"></p>

              </div>
          </div>
          <table class="table table-responsive">
              <thead>
                  <tr>
                  <th>Bank Name</th>
                  <th>Amount Transferred</th>
                  <th>Date Of Transfer</th>
                  </tr>
              </thead>
              <tbody id="wallet-history">

              </tbody>
          </table>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>


	<!-- Modal Code start COnfirm Message -->
@endsection

@section('scripts')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );





  document.addEventListener('DOMContentLoaded', function () {
        var myChart = Highcharts.chart('chart1', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Property Consuption'
            },
            xAxis: {
                categories: ['Canada', 'USA', 'Asia']
            },
            yAxis: {
                title: {
                    text: 'Area'
                }
            },
            series: [{
                name: 'populated',
                data: [1, 0, 4]
            }, {
                name: 'Free',
                data: [5, 7, 3]
            }]
        });
    });


  Highcharts.chart('chart2', {
    chart: {
        type: 'area'
    },
    accessibility: {
        description: ''
    },
    title: {
        text: 'Property Comparison Between USA and Canada'
    },
    subtitle: {
        text: 'Sources: <a href="https://thebulletin.org/2006/july/global-nuclear-stockpiles-1945-2006">' +
            'thebulletin.org</a> &amp; <a href="https://www.armscontrol.org/factsheets/Nuclearweaponswhohaswhat">' +
            'armscontrol.org</a>'
    },
    xAxis: {
        allowDecimals: false,
        labels: {
            formatter: function () {
                return this.value; // clean, unformatted number for year
            }
        },
        accessibility: {
            rangeDescription: 'Range: 1940 to 2017.'
        }
    },
    yAxis: {
        title: {
            text: 'State Area in Hecters'
        },
        labels: {
            formatter: function () {
                return this.value / 1000 + 'k';
            }
        }
    },
    tooltip: {
        pointFormat: '{series.name} had stockpiled <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
    },
    plotOptions: {
        area: {
            pointStart: 1940,
            marker: {
                enabled: false,
                symbol: 'circle',
                radius: 2,
                states: {
                    hover: {
                        enabled: true
                    }
                }
            }
        }
    },
    series: [{
        name: 'USA',
        data: [
            null, null, null, null, null, 6, 11, 32, 110, 235,
            369, 640, 1005, 1436, 2063, 3057, 4618, 6444, 9822, 15468,
            20434, 24126, 27387, 29459, 31056, 31982, 32040, 31233, 29224, 27342,
            26662, 26956, 27912, 28999, 28965, 27826, 25579, 25722, 24826, 24605,
            24304, 23464, 23708, 24099, 24357, 24237, 24401, 24344, 23586, 22380,
            21004, 17287, 14747, 13076, 12555, 12144, 11009, 10950, 10871, 10824,
            10577, 10527, 10475, 10421, 10358, 10295, 10104, 9914, 9620, 9326,
            5113, 5113, 4954, 4804, 4761, 4717, 4368, 4018
        ]
    }, {
        name: 'Canada',
        data: [null, null, null, null, null, null, null, null, null, null,
            5, 25, 50, 120, 150, 200, 426, 660, 869, 1060,
            1605, 2471, 3322, 4238, 5221, 6129, 7089, 8339, 9399, 10538,
            11643, 13092, 14478, 15915, 17385, 19055, 21205, 23044, 25393, 27935,
            30062, 32049, 33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000,
            37000, 35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
            21000, 20000, 19000, 18000, 18000, 17000, 16000, 15537, 14162, 12787,
            12600, 11400, 5500, 4512, 4502, 4502, 4500, 4500
        ]
    }]
});


var colors = Highcharts.getOptions().colors,
    categories = [
        'New Zealand',
        'America',
        'Canada',
        'USA',
        'Africa',
        'Asia',
        'Other'
    ],
    data = [
        {
            y: 62.74,
            color: colors[2],
            drilldown: {
                name: 'Chrome',
                categories: [
                    'Chrome v65.0',
                    'Chrome v64.0',
                    'Chrome v63.0',
                    'Chrome v62.0',
                    'Chrome v61.0',
                    'Chrome v60.0',
                    'Chrome v59.0',
                    'Chrome v58.0',
                    'Chrome v57.0',
                    'Chrome v56.0',
                    'Chrome v55.0',
                    'Chrome v54.0',
                    'Chrome v51.0',
                    'Chrome v49.0',
                    'Chrome v48.0',
                    'Chrome v47.0',
                    'Chrome v43.0',
                    'Chrome v29.0'
                ],
                data: [
                    0.1,
                    1.3,
                    53.02,
                    1.4,
                    0.88,
                    0.56,
                    0.45,
                    0.49,
                    0.32,
                    0.29,
                    0.79,
                    0.18,
                    0.13,
                    2.16,
                    0.13,
                    0.11,
                    0.17,
                    0.26
                ]
            }
        },
        {
            y: 10.57,
            color: colors[1],
            drilldown: {
                name: 'Firefox',
                categories: [
                    'Firefox v58.0',
                    'Firefox v57.0',
                    'Firefox v56.0',
                    'Firefox v55.0',
                    'Firefox v54.0',
                    'Firefox v52.0',
                    'Firefox v51.0',
                    'Firefox v50.0',
                    'Firefox v48.0',
                    'Firefox v47.0'
                ],
                data: [
                    1.02,
                    7.36,
                    0.35,
                    0.11,
                    0.1,
                    0.95,
                    0.15,
                    0.1,
                    0.31,
                    0.12
                ]
            }
        },
        {
            y: 7.23,
            color: colors[0],
            drilldown: {
                name: 'Internet Explorer',
                categories: [
                    'Internet Explorer v11.0',
                    'Internet Explorer v10.0',
                    'Internet Explorer v9.0',
                    'Internet Explorer v8.0'
                ],
                data: [
                    6.2,
                    0.29,
                    0.27,
                    0.47
                ]
            }
        },
        {
            y: 5.58,
            color: colors[3],
            drilldown: {
                name: 'Safari',
                categories: [
                    'Safari v11.0',
                    'Safari v10.1',
                    'Safari v10.0',
                    'Safari v9.1',
                    'Safari v9.0',
                    'Safari v5.1'
                ],
                data: [
                    3.39,
                    0.96,
                    0.36,
                    0.54,
                    0.13,
                    0.2
                ]
            }
        },
        {
            y: 4.02,
            color: colors[5],
            drilldown: {
                name: 'Edge',
                categories: [
                    'Edge v16',
                    'Edge v15',
                    'Edge v14',
                    'Edge v13'
                ],
                data: [
                    2.6,
                    0.92,
                    0.4,
                    0.1
                ]
            }
        },
        {
            y: 1.92,
            color: colors[4],
            drilldown: {
                name: 'Opera',
                categories: [
                    'Opera v50.0',
                    'Opera v49.0',
                    'Opera v12.1'
                ],
                data: [
                    0.96,
                    0.82,
                    0.14
                ]
            }
        },
        {
            y: 7.62,
            color: colors[6],
            drilldown: {
                name: 'Other',
                categories: [
                    'Other'
                ],
                data: [
                    7.62
                ]
            }
        }
    ],
    browserData = [],
    versionsData = [],
    i,
    j,
    dataLen = data.length,
    drillDataLen,
    brightness;


// Build the data arrays
for (i = 0; i < dataLen; i += 1) {

    // add browser data
    browserData.push({
        name: categories[i],
        y: data[i].y,
        color: data[i].color
    });

    // add version data
    drillDataLen = data[i].drilldown.data.length;
    for (j = 0; j < drillDataLen; j += 1) {
        brightness = 0.2 - (j / drillDataLen) / 5;
        versionsData.push({
            name: data[i].drilldown.categories[j],
            y: data[i].drilldown.data[j],
            color: Highcharts.color(data[i].color).brighten(brightness).get()
        });
    }
}

// Create the chart
Highcharts.chart('chart3', {
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Browser Property share, January, 2018'
    },
    subtitle: {
        text: 'Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
    },
    plotOptions: {
        pie: {
            shadow: false,
            center: ['50%', '50%']
        }
    },
    tooltip: {
        valueSuffix: '%'
    },
    series: [{
        name: 'Browsers',
        data: browserData,
        size: '60%',
        dataLabels: {
            formatter: function () {
                return this.y > 5 ? this.point.name : null;
            },
            color: '#ffffff',
            distance: -30
        }
    }, {
        name: 'Versions',
        data: versionsData,
        size: '80%',
        innerSize: '60%',
        dataLabels: {
            formatter: function () {
                // display only if larger than 1
                return this.y > 1 ? '<b>' + this.point.name + ':</b> ' +
                    this.y + '%' : null;
            }
        },
        id: 'versions'
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 400
            },
            chartOptions: {
                series: [{
                }, {
                    id: 'versions',
                    dataLabels: {
                        enabled: false
                    }
                }]
            }
        }]
    }
});

</script>
@endsection

