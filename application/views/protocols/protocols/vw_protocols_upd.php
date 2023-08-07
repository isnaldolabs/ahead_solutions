<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <div class="my-3 my-md-5">
          <div class="container">

            <?php if(isset($flash_message)){echo $flash_message;} ?>
            <?php echo form_open(base_url(RT_PROTOCOLS_DB_UPD.'/'.md5($input_protocol_id['value'])), array('id'=>'frm_upd')); ?>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><strong><?php echo ICO_UPD.$view_title_rec; ?></strong></h3>
                </div>

                <div class="card-body">
                    <?php echo input_hidden($input_protocol_id); ?>
                    <?php echo input_code($input_code); ?>
                    <?php echo input_name($input_title); ?>
                    <?php echo input_name($input_goal); ?>
                    <?php echo input_select($input_type_id, $input_type_list, FALSE); ?>
                    <?php echo input_select($input_methodology_id, $input_methodology_list, FALSE); ?>
                    <?php echo input_select($input_designing_id, $input_designing_list, FALSE); ?>
                    <?php echo input_number($input_repetitions); ?>
                    <?php echo input_date($input_dt_start); ?>
                    <?php echo input_date($input_dt_end_planned); ?>
                    <?php echo input_select($input_test_id, $input_type_test_list); ?>
                    <?php echo input_select($input_scheme_id, $input_scheme_list, FALSE); ?>
                    <?php echo input_select($input_subline_id, $input_subline_list); ?>
                    <?php echo input_select($input_applicant_id, $input_applicant_list, FALSE); ?>
                    <?php echo input_select($input_responsible_id, $input_responsible_list, FALSE); ?>
                </div>

                <div class="card-footer text-left">
                  <?php echo BTN_SAVE; ?>
                  <?php echo BTN_RETURN; ?>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
