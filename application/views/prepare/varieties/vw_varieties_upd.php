<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <div class="my-3 my-md-5">
          <div class="container">

            <?php if(isset($flash_message)){echo $flash_message;} ?>
            <?php echo form_open(base_url(RT_VARIETIES_DB_UPD.'/'.md5($input_variety_id['value'])), array('id'=>'frm_upd')); ?>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><strong><?php echo ICO_UPD.$view_title_rec; ?></strong></h3>
                </div>

                <div class="card-body">
                  <?php echo input_hidden($input_variety_id); ?>
                  <?php echo input_name($input_name); ?>
                  <?php echo input_select($input_maturity_id, $input_maturation_list); ?>
                  <?php echo input_select($input_licensor_id, $input_licensor_list); ?>
                  <?php echo input_date($input_protection_term); ?>
                  <?php echo input_value($input_royalties); ?>
                </div>

                <div class="card-footer text-left">
                  <?php echo BTN_SAVE; ?>
                  <?php echo BTN_RETURN; ?>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
