<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <div class="my-3 my-md-5">
          <div class="container">

            <?php if(isset($flash_message)){echo $flash_message;} ?>
            <?php echo form_open(base_url(RT_GU_PLOTS_DB_INS), array('id'=>'frm_ins')); ?>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><strong><?php echo ICO_NEW.$view_title_rec; ?></strong></h3>
                </div>

                <div class="card-body">
                  <?php echo input_code($input_block_code); ?>
                  <?php echo input_code($input_plot_code); ?>
                  <?php echo input_select($input_variety_id, $input_variety_list); ?>
                  <?php echo input_select($input_cutting_id, $input_cutting_list); ?>
                  <?php echo input_select($input_region_id, $input_region_list); ?>
                  <?php echo input_select($input_soil_id, $input_soil_list); ?>
                  <?php echo input_select($input_environment_id, $input_environment_list); ?>
                  <?php echo input_select($input_spacing_id, $input_spacing_list); ?>
                  <?php echo input_value($input_distance); ?>
                  <?php echo input_value($input_total_area); ?>
                  <?php echo input_value($input_production_area); ?>
                  <?php echo input_value($input_tons); ?>
                  <?php echo input_value($input_cut_tons); ?>
                  <?php echo input_date($input_dt_planting); ?>
                  <?php echo input_date($input_dt_cutting); ?>
                </div>

                <div class="card-footer text-left">
                  <?php echo BTN_SAVE; ?>
                  <?php echo BTN_RETURN; ?>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
