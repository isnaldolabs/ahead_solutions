<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- ----------------------------------------------------------------------- -->
<!-- 
  -- chart_biometry_group_sdh
  -- 
  -- Cores: 'Colmos: Verde', 'Diàmetro: Marrom', 'Altura: Azul'
  -- 
-->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['Tratamento', 'Colmos/m', 'Diàmetro (cm)', 'Altura (m)']
            <?php foreach ($ds_biometry_group_sdh as $row){ ?>
            , [
                '<?php echo $row->treatment_name;?>',
                <?php echo $row->num_stems;?>,
                <?php echo ($row->num_diameter==NULL?0:$row->num_diameter);?>,
                <?php echo ($row->num_height==NULL?0:$row->num_height);?>
              ]
            <?php } ?>
        ]);

        var options = {
            title : '',
            legend: {position: 'top'},
            chartArea: {width: '80%'},
            fontSize: 11,
            vAxis: {title: ''},
            hAxis: {title: ''},
            seriesType: 'bars',
            series: {0: {type: 'bars', color: 'green'},
                     1: {type: 'bars', color: 'brown'},
                     2: {type: 'line', color: 'blue', lineWidth: 2, pointSize: 5, targetAxisIndex: 1}
                    },
            bar: {groupWidth: '70%'}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_biometry_group_sdh'));
        chart.draw(data, options);
      }
</script>

<!-- ----------------------------------------------------------------------- -->
<!-- 
  -- chart_tch_volumetric_minus15
  -- 
-->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['Tratamento', 'TCH Volumétrico (-15%)', 'Média']
            <?php foreach ($ds_biometry_group_sdh as $row){ ?>
            , [
                '<?php echo $row->treatment_name;?>',
                <?php echo $row->tch_volumetric_minus15;?>,
                <?php echo $row->tch_volumetric_minus15_avg;?>
              ]
            <?php } ?>
        ]);

        var options = {
            title : '',
            legend: {position: 'top'},
            chartArea: {width: '80%'},
            fontSize: 11,
            vAxis: {title: ''},
            hAxis: {title: ''},
            seriesType: 'bars',
            series: {0: {color: 'blue'},
                     1: {color: 'orange', type: 'line', lineWidth: 3, pointShape: 'circle'}
                    },
            pointSize: 5,
            bar: {groupWidth: '70%'}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_tch_volumetric_minus15'));
        chart.draw(data, options);
      }
</script>
