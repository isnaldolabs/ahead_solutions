<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <?php echo fsReturnPage(RT_PROTOCOLS, '#'.$protocol_id.' '.$protocol_title); ?>
        <div class="my-3 my-md-5">
          <div class="container">

            <?php if(isset($flash_message)){echo $flash_message;} ?>
            <?php echo form_open(base_url(RT_PROTOCOLS_CLOSE_DB_UPD.'/'.md5($input_protocol_id['value'])), array('id'=>'frm_upd')); ?>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><strong><?php echo ICO_UPD.$view_title_rec; ?></strong></h3>
                </div>

                <div class="card-body">
                  <?php echo input_hidden($input_protocol_id); ?>
                  <?php echo input_textarea($input_conclusion); ?>
                  <?php echo input_select($input_rating, $input_rating_list, FALSE); ?>
                </div>

                <div class="card-footer text-left">
                  <?php echo BTN_SAVE; ?>
                  <?php echo BTN_RETURN; ?>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
