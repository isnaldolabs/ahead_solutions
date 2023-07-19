<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <div class="my-3 my-md-5">
          <div class="container">

            <?php if(isset($flash_message)){echo $flash_message;} ?>
            <?php echo form_open(base_url(RT_PROTOCOLS_CHECKS_DB_UPD.'/'.md5($input_check_id['value'])), array('id'=>'frm_upd')); ?>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><strong><?php echo ICO_UPD.$view_title_rec; ?></strong></h3>
                </div>

                <div class="card-body">
                  <?php echo input_hidden($input_check_id); ?>
                  <?php echo input_hidden($input_status); ?>
                  <?php echo input_date($input_dt_planned); ?>
                  <?php echo input_date($input_dt_applied); ?>
                  <?php echo input_select($input_description_id, $input_description_list); ?>
                  <?php echo input_select($input_method_id, $input_method_list); ?>
                  <?php echo input_name($input_notes); ?>
                </div>

                <div class="card-footer text-left">
                  <?php echo BTN_SAVE; ?>
                  <?php echo BTN_RETURN; ?>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
