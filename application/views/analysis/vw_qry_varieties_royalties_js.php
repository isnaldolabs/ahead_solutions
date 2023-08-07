<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- varieties_royalties --------------------------------------------------- -->
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawVisualization);

  function drawVisualization() {
    var data = google.visualization.arrayToDataTable([
      ['variedade', 'TPH', 'Viabilidade']
        <?php foreach ($ds_varieties_royalties as $row){ ?>
        , [
            '<?php echo $row->variety_name;?>',
             <?php echo $row->avg_tph;?>,
             <?php echo $row->viability;?>
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

    var chart = new google.visualization.ComboChart(document.getElementById('chart_varieties_royalties'));
    chart.draw(data, options);
  }
</script>

<!-- varieties_royalties_licensors ----------------------------------------- -->
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawVisualization);

  function drawVisualization() {
    var data = google.visualization.arrayToDataTable([
      ['Licenciante', 'TPH', 'Viabilidade']
        <?php foreach ($ds_varieties_royalties_licensors as $row){ ?>
        , [
            '<?php echo $row->licensor_name;?>',
             <?php echo $row->avg_tph;?>,
             <?php echo $row->viability;?>
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

    var chart = new google.visualization.ComboChart(document.getElementById('chart_varieties_royalties_licensors'));
    chart.draw(data, options);
  }
</script>
