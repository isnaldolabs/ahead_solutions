<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- checks_status_amount -------------------------------------------------- -->
<script type="text/javascript">
  google.charts.load('current', {packages: ['corechart', 'bar']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Status', 'Quantidade', {role: 'style'}, { role: 'annotation' }]
        <?php foreach ($ds_checks_status as $row_status){ ?>
          , ['',
              <?php echo $row_status->amount; ?>,
             '<?php echo fs_protocol_check_status_color($row_status->check_status); ?>',
             '<?php echo $row_status->check_status_name; ?>'
        ]
        <?php } ?>
    ]);

    var options = {
        title: '',
        chartArea: {width: '80%'},
        legend: {position: 'none'},
        hAxis: {
          title: '',
          minValue: 0
        },
        vAxis: {
          title: ''
        }
    };
    var chart = new google.visualization.BarChart(document.getElementById('chart_checks_status_amount'));
    chart.draw(data, options);
  }
</script>

<!-- checks_status_percentual ---------------------------------------------- -->
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Status', 'Percentual', {role: 'style'}]
      <?php foreach ($ds_checks_status as $row_status){ ?>
        , ['<?php echo $row_status->check_status_name; ?>', <?php echo $row_status->amount; ?>, '<?php echo fs_protocol_check_status_color($row_status->check_status); ?>']
      <?php } ?>
    ]);

    var options = {
        title: "",
        is3D: false,
        legend: {position: 'right'},
        chartArea: {width: '80%'},
        pieHole: 0.4,
        slices: {
            <?php
            $li = 0;
            foreach ($ds_checks_status as $row_status){
              echo $li.': {color: "'.fs_protocol_check_status_color($row_status->check_status).'"},';
            $li++;
            }
            ?>
        }
    };
    var chart = new google.visualization.PieChart(document.getElementById('chart_checks_status_percent'));
    chart.draw(data, options);
  }
</script>
