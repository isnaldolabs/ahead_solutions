<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- ----------------------------------------------------------------------- -->
<!-- 
  -- chart_isoquants google charts
  -- 
-->
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart', 'scatter']});
google.charts.setOnLoadCallback(drawVisualization);
function drawVisualization() {
    var data = new google.visualization.DataTable();
    data.addColumn('number', 'Student ID');
    data.addColumn('number', 'Hours Studied');
    data.addColumn({type: 'string', role: 'tooltip'});
    data.addColumn('number', 'Final');

    data.addRows([
        [150.84, 61.11, 'CT01 1886', 9.09], 
        [171.22, 55.56, 'CT01 2009', 9.53], 
        [154.60, 67.77, 'CTC 9006', 10.38], 
        [157.31, 50.79, 'CT02 2994', 7.98], 
        [164.21, 47.87, 'CT04 3205', 7.85], 
        [161.85, 68.98, 'CT04 3445', 11.10], 
        [142.91, 61.85, 'CTC 9007', 8.83], 
        [146.33, 68.52, 'CT04 9361', 10.10], 
        [149.08, 63.43, 'CT04 9365', 9.51], 
        [160.90, 57.04, 'CTC 20', 9.13], 
        [159.95, 57.68, 'CTC 4', 9.19], 
        [149.45, 52.08, 'CTC 9001', 7.87], 
        [157.86, 63.84, 'CTC 9002', 10.02], 
        [147.37, 61.34, 'CTC 9003', 9.11], 
        [141.93, 62.08, 'CTC 9004', 8.89], 
        [143.76, 63.66, 'CTEJ0 6293', 9.25], 
        [142.23, 51.34, 'CTEJ0 6407', 7.17], 
        [143.61, 49.21, 'CTEP 0843', 7.10], 
        [157.55, 59.58, 'RB03 6066', 9.26], 
        [136.89, 61.02, 'RB03 6088', 8.33], 
        [149.36, 51.57, 'RB03 6091', 7.69], 
        [144.51, 63.47, 'RB86 7515', 9.23], 
        [139.30, 71.94, 'RB92 579', 10.14], 
        [145.63, 51.53, 'RB96 6928', 7.50], 

    ]);

    var options = {
        title: '',
        chartArea: {width: '80%'},
        legend: 'none',
        tooltip: {
//            isHtml: true,
            trigger: 'selection'
        },
        selectionMode: 'multiple',
        aggregationTarget: 'none',
        enableInteractivity: true,
//        focusTarget: 'category',

        series: {
            0: {targetAxisIndex: 0},
            1: {targetAxisIndex: 1}
        },
        hAxes: {
            0: {title: 'ATR'}
        },
        vAxes: {
            0: {title: 'TCH'},
            1: {title: 'TPH',
                color: 'red'
            },
        },
    };

    var chart = new google.visualization.ScatterChart(document.getElementById('chart_isoquants'));
    chart.draw(data, options);
};
</script>
