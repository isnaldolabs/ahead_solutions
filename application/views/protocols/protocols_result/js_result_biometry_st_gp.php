<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- ----------------------------------------------------------------------- -->
<!-- 
  -- chart_1
  -- 
-->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['Tratamento', 'Colmos/m']
            <?php foreach ($ds_biometry_st_gp as $row){ ?>
            , [
                '<?php echo $row['treatment_name'];?>',
                <?php echo $row['num_stems'];?>
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
                    },
            bar: {groupWidth: '70%'}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_1'));
        chart.draw(data, options);
      }
</script>
