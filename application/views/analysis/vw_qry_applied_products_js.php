<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- applied_products_amount ----------------------------------------------- -->
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawVisualization);

  function drawVisualization() {
    var data = google.visualization.arrayToDataTable([
      ['Tratamento', 'TPH', 'Mínimo', 'Máximo']
        <?php foreach ($ds_applied_products as $row){ ?>
        , [
            '<?php echo $row->treatment_name;?>',
             <?php echo $row->avg_tph;?>,
             <?php echo $row->min_tph;?>,
             <?php echo $row->max_tph;?>
          ]
        <?php } ?>
    ]);

    var options = {
        title : '',
        legend: {position: 'top'},
        chartArea: {width: '85%'},
        fontSize: 11,
        colors: ['blue', 'orange'],
        seriesType: 'bars',
        series: {
            1: {type: 'line', color: 'red', lineWidth: 3, pointShape: 'circle'},
            2: {type: 'line', color: 'orange', lineWidth: 3, pointShape: 'circle'}
        },
        pointSize: 5
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_applied_products_amount'));
    chart.draw(data, options);
  }
</script>

<!-- applied_products_groups ----------------------------------------------- -->
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawVisualization);

  function drawVisualization() {
    var data = google.visualization.arrayToDataTable([
      ['Grupo', 'TPH', 'Mínimo', 'Máximo']
        <?php foreach ($ds_applied_products_groups as $row){ ?>
        , [
            '<?php echo $row->group_name;?>',
             <?php echo $row->avg_tph;?>,
             <?php echo $row->min_tph;?>,
             <?php echo $row->max_tph;?>
          ]
        <?php } ?>
    ]);

    var options = {
        title : '',
        legend: {position: 'top'},
        chartArea: {width: '85%'},
        fontSize: 11,
        colors: ['blue', 'orange'],
        seriesType: 'bars',
        series: {
            1: {type: 'line', color: 'red', lineWidth: 3, pointShape: 'circle'},
            2: {type: 'line', color: 'orange', lineWidth: 3, pointShape: 'circle'}
        },
        pointSize: 5
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_applied_products_groups'));
    chart.draw(data, options);
  }
</script>
