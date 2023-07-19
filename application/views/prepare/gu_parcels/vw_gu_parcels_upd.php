<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <div class="my-3 my-md-5">
          <div class="container">

            <?php if(isset($flash_message)){echo $flash_message;} ?>
            <?php echo form_open(base_url(RT_GU_PARCELS_DB_UPD.'/'.md5($input_parcel_id['value'])), array('id'=>'frm_upd')); ?>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><strong><?php echo ICO_UPD.$view_title_rec; ?></strong></h3>
                </div>

                <div class="card-body">
                  <?php echo input_hidden($input_parcel_id); ?>
                  <?php echo input_code($input_parcel_code); ?>
                  <?php echo input_select($input_variety_id, $input_variety_list); ?>
                  <?php echo input_value($input_area); ?>
                  <?php echo input_date($input_dt_planting); ?>
                </div>

                <div class="card-footer text-left">
                  <?php echo BTN_SAVE; ?>
                  <?php echo BTN_RETURN; ?>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
