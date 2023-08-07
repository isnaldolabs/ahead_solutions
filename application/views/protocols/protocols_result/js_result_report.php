<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-------------------------------------------------------------------------- -->
<!--weathers---------------------------------------------------------------- -->
<!-------------------------------------------------------------------------- -->
<script type="text/javascript">
<!--weathers chart---------------------------------------------------------- -->
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawVisualizationWeathers);

    function drawVisualizationWeathers() {
    var data = google.visualization.arrayToDataTable([
      ['Período', 'Chuva Histórica (ml)', 'Chuva Atual (ml)', 'Temperatura Histórica (C)', 'Temperatura Atual (C)']
        <?php foreach ($ds_climatic_history as $row){ ?>
        , ['<?php echo substr($row->period,0,4).'-'.substr($row->period,-2);?>',
            <?php echo $row->pluviometry_history;?>,
            <?php echo $row->pluviometry;?>,
            <?php echo $row->temperature_history;?>,
            <?php echo $row->temperature;?>
          ]
        <?php } ?>
    ]);

    var options = {
        title : '',
        legend: {position: 'top'},
        chartArea: {width: '90%'},
        fontSize: 10,
        series: {0: {type: 'bars', color: 'blue', lineWidth: 2, pointSize: 5},
                 1: {type: 'bars', color: 'navy', lineWidth: 2, pointSize: 2},
                 2: {type: 'line', color: 'orange', lineWidth: 2, pointSize: 5, targetAxisIndex: 1},
                 3: {type: 'line', color: 'red', lineWidth: 2, pointSize: 5, targetAxisIndex: 1}
            },
        hAxis: {title: '',
                titleTextStyle: {color: '#333'},
                slantedText: true,  /* Enable slantedText for horizontal axis */
                slantedTextAngle: 45 /* Define slant Angle */
        },
        vAxis: {minValue: 0}
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_climatic'));
    chart.draw(data, options);
  }
</script>

<!-------------------------------------------------------------------------- -->
<!-- chart_samples_analyze_period ------------------------------------------- -->
<!-------------------------------------------------------------------------- -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualizationAnalyze);

      function drawVisualizationAnalyze() {
        var data = google.visualization.arrayToDataTable([
          ['Tratamento', 'ATR', 'TCH', 'TPH']
            <?php foreach ($ds_samples_analyze as $row){ ?>
            , ['<?php echo $row->treatment_name;?>',
                <?php echo str_replace(",",".", frDecimals($row->num_atr,2));?>,
                <?php echo str_replace(",",".", frDecimals($row->num_tch,2));?>,
                <?php echo str_replace(",",".", frDecimals($row->num_tah,2));?>
              ]
            <?php } ?>
        ]);

        var options = {
            title : '',
            legend: {position: 'top'},
            chartArea: {width: '90%'},
            fontSize: 11,
            series: {0: {type: 'line', color: 'rgb(50, 102, 201)', lineWidth: 2, pointSize: 5},
                     1: {type: 'bars', color: 'rgb(51, 105, 36)', lineWidth: 2, pointSize: 5},
                     2: {type: 'line', color: 'red', lineWidth: 2, pointSize: 5, targetAxisIndex: 1}
                },
            hAxis: {title: '',
                    minValue: 0,
                    titleTextStyle: {color: '#333'},
                    slantedText: false,
                    slantedTextAngle: 60
            },
            vAxis: {minValue: 0}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_samples_analyze_period'));
        chart.draw(data, options);
      }
</script>

<!-------------------------------------------------------------------------- -->
<!-- chart_atr ------------------------------------------------------------- -->
<!-------------------------------------------------------------------------- -->
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawVisualizationSamplesATR);

    function drawVisualizationSamplesATR() {
        var data = google.visualization.arrayToDataTable([
          ['Tratamento', 'ATR']
            <?php foreach ($ds_samples_analyze as $row){ ?>
            , [
                '<?php echo $row->treatment_name;?>',
                <?php echo $row->num_atr;?>
              ]
            <?php } ?>
        ]);

        var options = {
            title : '',
            legend: {position: 'top'},
            chartArea: {width: '90%'},
            fontSize: 11,
            colors: ['rgb(51, 105, 36)', 'orange'],
            seriesType: 'bars',
            series: {1: {type: 'line', color: 'orange', lineWidth: 3, pointShape: 'circle'}},
            pointSize: 5
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_atr'));
        chart.draw(data, options);
    }
</script>

<!-------------------------------------------------------------------------- -->
<!-- chart_atr ------------------------------------------------------------- -->
<!-------------------------------------------------------------------------- -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['Tratamento', 'TCH']
            <?php foreach ($ds_samples_analyze as $row){ ?>
            , [
                '<?php echo $row->treatment_name;?>',
                <?php echo $row->num_tch;?>
              ]
            <?php } ?>
        ]);

        var options = {
            title : '',
            legend: {position: 'top'},
            chartArea: {width: '90%'},
            fontSize: 11,
            colors: ['rgb(51, 105, 36)', 'orange'],
            seriesType: 'bars',
            series: {1: {type: 'line', color: 'orange', lineWidth: 3, pointShape: 'circle'}},
            pointSize: 5
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_tch'));
        chart.draw(data, options);
      }
</script>

<!-------------------------------------------------------------------------- -->
<!-- chart_tah ------------------------------------------------------------- -->
<!-------------------------------------------------------------------------- -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['Tratamento', 'TAH']
            <?php foreach ($ds_samples_analyze as $row){ ?>
            , [
                '<?php echo $row->treatment_name;?>',
                <?php echo $row->num_tah;?>
              ]
            <?php } ?>
        ]);

        var options = {
            title : '',
            legend: {position: 'top'},
            chartArea: {width: '90%'},
            fontSize: 11,
            colors: ['rgb(51, 105, 36)', 'orange'],
            seriesType: 'bars',
            series: {1: {type: 'line', color: 'orange', lineWidth: 3, pointShape: 'circle'}},
            pointSize: 5
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_tah'));
        chart.draw(data, options);
      }
</script>

<!-------------------------------------------------------------------------- -->
<!-- chart_wei ------------------------------------------------------------- -->
<!-------------------------------------------------------------------------- -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['Tratamento', 'Peso kg']
            <?php foreach ($ds_samples_analyze as $row){ ?>
            , [
                '<?php echo $row->treatment_name;?>',
                <?php echo $row->num_wei;?>
              ]
            <?php } ?>
        ]);

        var options = {
            title : '',
            legend: {position: 'top'},
            colors: ['rgb(51, 105, 36)', 'orange'],
            chartArea: {width: '90%'},
            fontSize: 11,
            seriesType: 'bars',
            series: {1: {type: 'line', color: 'orange', lineWidth: 3, pointShape: 'circle'}},
            pointSize: 5
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_wei'));
        chart.draw(data, options);
      }
</script>

<!-------------------------------------------------------------------------- -->
<!-- chart_sample_atr_period ----------------------------------------------- -->
<!-------------------------------------------------------------------------- -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['Data'
            <?php foreach ($ds_treatments_period as $row){ ?>
            , '<?php echo $row->treatment_name;?>'
            <?php } ?>
          ]

          <?php foreach ($ds_samples_analyze_graphic_period_atr->result_array() as $row){ ?>
          , ['<?php echo fdDateMySQL_to_DateBr($row['dt_sample']); ?>'
              <?php
                for ($x=1; $x <= count($ds_treatments_period); $x++){
                    echo ', '.$row['col'.$x];
                }
              ?>
            ]
          <?php } ?>
        ]);

        var options = {
            title : 'ATR',
            titleTextStyle: {
                color: '#000',
                fontName: 'sans-serif',
                fontSize: 18,
                bold: true,
                italic: false
            },
            chartArea: {width: '90%'},
            fontSize: 11,
            legend: {position: 'right'},
            seriesType: 'bars'
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_sample_atr_period'));
        chart.draw(data, options);
      }
</script>

<!-------------------------------------------------------------------------- -->
<!-- chart_sample_tch_period ----------------------------------------------- -->
<!-------------------------------------------------------------------------- -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['Data'
            <?php foreach ($ds_treatments_period as $row){ ?>
            , '<?php echo $row->treatment_name;?>'
            <?php } ?>
          ]

          <?php foreach ($ds_samples_analyze_graphic_period_tch->result_array() as $row){ ?>
          , ['<?php echo fdDateMySQL_to_DateBr($row['dt_sample']); ?>'
              <?php
                for ($x=1; $x <= count($ds_treatments_period); $x++){
                    echo ', '.$row['col'.$x];
                }
              ?>
            ]
          <?php } ?>
        ]);

        var options = {
            title : 'TCH',
            titleTextStyle: {
                color: '#000',
                fontName: 'sans-serif',
                fontSize: 18,
                bold: true,
                italic: false
            },
            chartArea: {width: '90%'},
            fontSize: 11,
            legend: {position: 'right'},
            seriesType: 'bars'
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_sample_tch_period'));
        chart.draw(data, options);
      }
</script>

<!-------------------------------------------------------------------------- -->
<!-- chart_sample_tah_period ----------------------------------------------- -->
<!-------------------------------------------------------------------------- -->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['Data'
            <?php foreach ($ds_treatments_period as $row){ ?>
            , '<?php echo $row->treatment_name;?>'
            <?php } ?>
          ]

          <?php foreach ($ds_samples_analyze_graphic_period_tah->result_array() as $row){ ?>
          , ['<?php echo fdDateMySQL_to_DateBr($row['dt_sample']); ?>'
              <?php
                for ($x=1; $x <= count($ds_treatments_period); $x++){
                    echo ', '.$row['col'.$x];
                }
              ?>
            ]
          <?php } ?>
        ]);

        var options = {
            title : 'TAH',
            titleTextStyle: {
                color: '#000',
                fontName: 'sans-serif',
                fontSize: 18,
                bold: true,
                italic: false
            },
            legend: {position: 'right'},
            chartArea: {width: '90%'},
            fontSize: 11,
            seriesType: 'bars'
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_sample_tah_period'));
        chart.draw(data, options);
      }
</script>


<!-- ----------------------------------------------------------------------- -->
<!-- 
  -- chart_biometry_stems
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
            <?php foreach ($ds_biometry_stems as $row){ ?>
            , [
                '<?php echo $row->treatment_name;?>',
                <?php echo $row->num_stems;?>,
                <?php echo ($row->num_diameter==NULL?0:$row->num_diameter);?>,
                <?php echo ($row->num_height==NULL?0:$row->num_height);?>
              ]
            <?php } ?>
        ]);

        var options = {
            title : 'Biometria dos Colmos',
            titleTextStyle: {
                color: '#000',
                fontName: 'sans-serif',
                fontSize: 18,
                bold: true,
                italic: false
            },
            legend: {position: 'top'},
            chartArea: {width: '90%'},
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

        var chart = new google.visualization.ComboChart(document.getElementById('chart_biometry_stems'));
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
            <?php foreach ($ds_biometry_stems as $row){ ?>
            , [
                '<?php echo $row->treatment_name;?>',
                <?php echo $row->tch_volumetric_minus15;?>,
                <?php echo $row->tch_volumetric_minus15_avg;?>
              ]
            <?php } ?>
        ]);

        var options = {
            title : 'TCH Volumétrico -15%',
            titleTextStyle: {
                color: '#000',
                fontName: 'sans-serif',
                fontSize: 18,
                bold: true,
                italic: false
            },
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

<!-- ----------------------------------------------------------------------- -->
<!-- 
  -- chart_biometry_internodes
  -- 
-->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['Tratamento', 'Entrenós', 'Isoporos', '% Isoporos', 'Flores', '% Flores']
            <?php foreach ($ds_biometry_internodes as $row){ ?>
            , ['<?php echo $row->treatment_name;?>',
                <?php echo str_replace(",",".", str_replace(".","", frDecimals($row->num_node,2)));?>,
                <?php echo str_replace(",",".", str_replace(".","", frDecimals($row->num_pith,2)));?>,
                <?php echo str_replace(",",".", str_replace(".","", frDecimals($row->perc_pith,2)));?>,
                <?php echo str_replace(",",".", str_replace(".","", frDecimals($row->num_flower,2)));?>,
                <?php echo str_replace(",",".", str_replace(".","", frDecimals($row->perc_flower,2)));?>
              ]
            <?php } ?>
        ]);
        var options = {
            title : 'Biometria dos Entrenós',
            titleTextStyle: {
                color: '#000',
                fontName: 'sans-serif',
                fontSize: 18,
                bold: true,
                italic: false
            },
            fontSize: 11,
            legend: {position: 'top'},
            chartArea: {width: '90%'},
            vAxis: {title: '', minValue: 0},
            hAxis: {title: '',
                    titleTextStyle: {color: '#333'},
                    //slantedText: true,
                    direction: 1
            },
            seriesType: 'bars',
            series: {0: {color: 'green'},
                     1: {color: 'red'},
                     2: {type: 'line', color: 'red', targetAxisIndex: 1, pointSize: 4},
                     3: {color: 'blue'},
                     4: {type: 'line', color: 'blue', targetAxisIndex: 1, pointSize: 4}
                    }
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_biometry_internodes'));
        chart.draw(data, options);
      }
</script>

<!-- ----------------------------------------------------------------------- -->
<!-- 
  -- chart_biometry_tillers
  -- 
-->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['Tratamento', 'Perfilhos', '% Falhas']
            <?php foreach ($ds_biometry_tillers as $row){ ?>
            , ['<?php echo $row->treatment_name;?>',
                <?php echo str_replace(",",".", str_replace(".","", frDecimals($row->num_tiller,2)));?>,
                <?php echo str_replace(",",".", str_replace(".","", frDecimals($row->perc_gap,2)));?>
              ]
            <?php } ?>
        ]);
        var options = {
            title : 'Biometria dos Perfilhos',
            titleTextStyle: {
                color: '#000',
                fontName: 'sans-serif',
                fontSize: 18,
                bold: true,
                italic: false
            },
            fontSize: 11,
            legend: {position: 'top'},
            chartArea: {width: '80%'},
            vAxis: {title: '', minValue: 0},
            hAxis: {title: '',
                    titleTextStyle: {color: '#333'} // , slantedText: true
            },
            seriesType: 'bars',
            series: {0: {color: 'green'},
                     1: {type: 'line', color: 'red', targetAxisIndex: 1}
                    }
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_biometry_tillers'));
        chart.draw(data, options);
      }
</script>

<!-- ----------------------------------------------------------------------- -->
<!-- 
  -- chart_biometry_infestation
  -- 
-->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['Tratamento', 'Entrenós', 'Infestação', 'Furos', '% Furos', 'Danos', '% Danos']
            <?php foreach ($ds_biometry_infestation as $row){ ?>
            , ['<?php echo $row->treatment_name;?>',
                <?php echo str_replace(",",".", str_replace(".","", frDecimals($row->num_node,2)));?>,
                <?php echo str_replace(",",".", str_replace(".","", frDecimals($row->num_infestation,2)));?>,
                <?php echo str_replace(",",".", str_replace(".","", frDecimals($row->num_hole,2)));?>,
                <?php echo str_replace(",",".", str_replace(".","", frDecimals($row->perc_hole,2)));?>,
                <?php echo str_replace(",",".", str_replace(".","", frDecimals($row->num_damage,2)));?>,
                <?php echo str_replace(",",".", str_replace(".","", frDecimals($row->perc_damage,2)));?>
              ]
            <?php } ?>
        ]);
        var options = {
            title : 'Biometria de Infestações',
            titleTextStyle: {
                color: '#000',
                fontName: 'sans-serif',
                fontSize: 18,
                bold: true,
                italic: false
            },
            fontSize: 11,
            legend: {position: 'top'},
            chartArea: {width: '90%'},
            vAxis: {title: '', minValue: 0},
            hAxis: {title: '',
                    titleTextStyle: {color: '#333'},
                    //slantedText: true,
                    direction: 1
            },
            seriesType: 'bars',
            series: {0: {color: 'green'},
                     1: {color: 'red'},
                     2: {color: 'blue'},
                     3: {type: 'line', color: 'blue', targetAxisIndex: 1, pointSize: 4},
                     4: {color: 'brown'},
                     5: {type: 'line', color: 'brown', targetAxisIndex: 1, pointSize: 4}
                    }
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_biometry_infestation'));
        chart.draw(data, options);
      }
</script>

<!-- ----------------------------------------------------------------------- -->
<!-- 
  -- chart_finance_cost
  -- 
-->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([
          ['Tratamento', 'Custo $', 'Média']
            <?php foreach ($ds_treatment_cost_total as $row){ ?>
            , [
               '<?php echo $row->product_name_main;?>',
                <?php echo $row->ha_cost;?>,
                <?php echo $row->ha_cost_avg;?>
              ]
            <?php } ?>
        ]);

        var options = {
            chartArea: {width: '90%'},
          title : '',
            titleTextStyle: {
                color: '#000',
                fontName: 'sans-serif',
                fontSize: 18,
                bold: true,
                italic: false
            },
          legend: {position: 'top'},
          colors: ['blue', 'orange'],
          seriesType: 'bars',
          series: {1: {type: 'line', color: 'orange', lineWidth: 3, pointShape: 'circle'}},
          pointSize: 5
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_finance_cost'));
        chart.draw(data, options);
      }
</script>

<!-- ----------------------------------------------------------------------- -->
<!--
  -- chart_biometry_diseases_by_groups
  --
-->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([

            ['Tratamento'
            <?php foreach ($ds_biometry_diseases_groups_dat as $row){
                echo ", '".$row->group_name."'";
            } ?>
            ],

            <?php foreach ($ds_biometry_diseases_groups_cross->result_array() as $row){ ?>
                [
                    <?php echo "'#".$row['treatment_id']." ".$row['treatment_name']."'"; ?>
                    <?php
                        for ($x=1; $x <= count($ds_biometry_diseases_groups_dat); $x++){
                            if ($row['col'.$x]==0){
                                echo '0, ';
                            }else{
                                echo ', '.$row['col'.$x];
                            }
                        }
                    ?>
                ],
            <?php } ?>
        ]);

        var options = {
            title : '',
            chartArea: {width: '70%'},
            fontSize: 11,
            legend: {position: 'bottom'},
            series: {
                0: {targetAxisIndex: 0},
                1: {targetAxisIndex: 1}
            },
            vAxes: {
                0: {title: 'Quantidades'},
                1: {title: 'Percentuais'}
            }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_diseases_groups'));
        chart.draw(data, options);
      }
</script>

<!-- ----------------------------------------------------------------------- -->
<!--
  -- chart_biometry_pests_by_groups
  --
-->
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        var data = google.visualization.arrayToDataTable([

            ['Tratamento'
            <?php foreach ($ds_biometry_pests_groups_dat as $row){
                echo ", '".$row->group_name."'";
            } ?>
            ],

            <?php foreach ($ds_biometry_pests_groups_cross->result_array() as $row){ ?>
                [
                    <?php echo "'#".$row['treatment_id']." ".$row['treatment_name']."'"; ?>
                    <?php
                        for ($x=1; $x <= count($ds_biometry_pests_groups_dat); $x++){
                            if ($row['col'.$x]==0){
                                echo '0, ';
                            }else{
                                echo ', '.$row['col'.$x];
                            }
                        }
                    ?>
                ],
            <?php } ?>
        ]);

        var options = {
            title : '',
            chartArea: {width: '70%'},
            fontSize: 11,
            legend: {position: 'bottom'},
            series: {
                0: {targetAxisIndex: 0},
                1: {targetAxisIndex: 1}
            },
            vAxes: {
                0: {title: 'Quantidades'},
                1: {title: 'Percentuais'}
            }
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_pests_groups'));
        chart.draw(data, options);
      }
</script>
