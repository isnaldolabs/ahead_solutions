<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- research_status ------------------------------------------------------- -->
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Status', 'Quantidade']
      <?php foreach ($ds_research_status as $row_status){ ?>
        , ['<?php echo $row_status->status_name; ?>', <?php echo $row_status->amount; ?>]
      <?php } ?>
    ]);

    var options = {
        title: "",
        is3D: false,
        legend: {position: "bottom"},
        chartArea: {width: '80%'},
        pieHole: 0.4,
        slices: {
            <?php
            $li = 0;
            foreach ($ds_research_status as $row_status){
              echo $li.': {color: "'.fs_protocol_status_color($row_status->status).'"},';
            $li++;
            }
            ?>
        }
    };
    var chart = new google.visualization.PieChart(document.getElementById('chart_research_status'));
    chart.draw(data, options);
  }
</script>

<!-- research_lines -------------------------------------------------------- -->
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Linhas', 'Quantidade']
      <?php foreach ($ds_research_lines as $row_lines){ ?>
        , ['<?php echo $row_lines->line_name; ?>', <?php echo $row_lines->amount; ?>]
      <?php } ?>
    ]);

    var options = {
        title: "",
        is3D: false,
        legend: {position: "bottom"},
        chartArea: {width: '80%'},
        pieHole: 0.4
    };
    var chart = new google.visualization.PieChart(document.getElementById('chart_research_lines'));
    chart.draw(data, options);
  }
</script>

<!-- research_sublines ----------------------------------------------------- -->
<script type="text/javascript">
  google.charts.load('current', {packages: ['corechart', 'bar']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Sublinhas', 'Quantidade']
      <?php foreach ($ds_research_sublines as $row_sublines){ ?>
          , ["<?php echo $row_sublines->subline_name;?>",<?php echo $row_sublines->amount;?>]
      <?php } ?>
    ]);

    var options = {
      title: '',
      legend: {position: "none"},
      chartArea: {width: '50%'}
    };
    var chart = new google.visualization.BarChart(document.getElementById('chart_research_sublines'));
    chart.draw(data, options);
  }
</script>
