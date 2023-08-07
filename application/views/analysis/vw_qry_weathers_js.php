<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- chart_weather_daily --------------------------------------------------- -->
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawVisualization);

  function drawVisualization() {
    var data = google.visualization.arrayToDataTable([
      ['Data', 'Chuva', 'Min.', 'Temp.', 'Máx.']
        <?php foreach ($ds_weathers_chart as $row){ ?>
          , ["<?php echo fdDateMySQL_to_DateBr($row->dt_weather); ?>",
             <?php echo $row->pluviometry; ?>,
             <?php echo ($row->temperature_min==NULL?$row->temperature:$row->temperature_min); ?>,
             <?php echo $row->temperature; ?>,
             <?php echo ($row->temperature_max==NULL?$row->temperature:$row->temperature_max); ?>
            ]
        <?php } ?>
    ]);

    var options = {
      title: '',
      legend: {position: 'bottom', textStyle: {fontSize: 10}},
      chartArea: {top: '20', left: '60', right: '20', width: '70%'},
      vAxis: {title: '', textStyle: {fontSize: 10}},
      hAxis: {title: '', textStyle: {fontSize: 10}},
      seriesType: 'bars',
      series: {1: {type: 'line', color: 'blue'},
               2: {type: 'line', color: 'orange'},
               3: {type: 'line', color: 'red'}
              }
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_weather_daily'));
    chart.draw(data, options);
  }
</script>

<!-- chart_weather_monthly ------------------------------------------------- -->
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawVisualization);

  function drawVisualization() {
    var data = google.visualization.arrayToDataTable([
      ['Mês', 'Chuva', 'Min.', 'Temp.', 'Máx.']
        <?php foreach ($ds_weathers_monthly as $row){ ?>
          , ["<?php echo fsLetterMonth($row->num_month); ?>",
             <?php echo $row->pluviometry; ?>,
             <?php echo ($row->temperature_min==NULL?$row->temperature:$row->temperature_min); ?>,
             <?php echo $row->temperature; ?>,
             <?php echo ($row->temperature_max==NULL?$row->temperature:$row->temperature_max); ?>
            ]
        <?php } ?>
    ]);

    var options = {
      title: '',
      legend: {position: 'bottom', textStyle: {fontSize: 10}},
      chartArea: {top: '20', left: '60', right: '20', width: '70%'},
      vAxis: {title: '', textStyle: {fontSize: 10}},
      hAxis: {title: '', textStyle: {fontSize: 10}},
      seriesType: 'bars',
      series: {1: {type: 'line', color: 'blue'},
               2: {type: 'line', color: 'orange'},
               3: {type: 'line', color: 'red'}
              }
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_weather_monthly'));
    chart.draw(data, options);
  }
</script>
