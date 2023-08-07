<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($flash_message)){echo $flash_message;}
?>
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    <?php echo $view_title; ?>
                </h2>
            </div>
        </div>
    </div>
</div>

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards row-deck">

            <div class="col-sm-12 col-lg-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-hover card-table table-vcenter" id="task-table">
                      <thead>
                        <tr role="row">
                            <th>#</th>
                            <th class="text-center">Horário</th>
                            <th>Descrição</th>
                            <th colspan="2">Ciente</th>
                            <?php if (fiLevelAccess(fi_get_user(), FNC_QRY_PROTOCOLS_ALERTS)==ACCESS_LEVEL_COMPLETE){ ?>
                              <th class="text-center"></th>
                            <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($ds_protocols_alerts as $row){
                            $ls_color = ($row->is_read==ACTIVE_NO?' text-red':' text-blue');
                            $ls_alert_p = preg_replace('/planejada/', '<span class="text-blue" style="font-weight: 500;">planejada</span>', $row->alert_name);
                            $ls_alert_d = preg_replace('/atrasada/', '<span class="text-red" style="font-weight: 500;">atrasada</span>', $ls_alert_p);
                        ?>
                            <tr role="row" class="odd">
                              <td><?php echo $row->alert_id; ?></td>
                              <td class="text-center"><?php echo fdDateTime_MySQL_to_Br($row->alert_at); ?></td>
                              <td><?php echo $ls_alert_d; ?></td>
                              <td><?php echo ($row->aware_name==NULL?'-':$row->aware_name); ?></td>
                              <td class="text-center"><?php echo ($row->aware_at==NULL?'-':fdDateTime_MySQL_to_Br($row->aware_at)); ?></td>
                              <?php if (fiLevelAccess(fi_get_user(), FNC_QRY_PROTOCOLS_ALERTS)==ACCESS_LEVEL_COMPLETE){ ?>
                                <td class="text-end">
                                  <a class="text-blue me-2" href="<?php echo ($row->aware_name==NULL?$link_update."/".md5($row->alert_id):'javascript:void();'); ?>">
                                      <i class="fe fe-alert-triangle<?php echo $ls_color;?>"></i>
                                  </a>
                                </td>
                              <?php } ?>
                            </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>

                  <?php if(PAGINATION_ACTIVE=='Y'){ ?>
                    <div class="card-footer d-flex align-items-center">
                      <?php
                        echo (!empty($lo_pagination) ? $lo_pagination : '');
                        echo $lo_lines_page;
                      ?>
                    </div>
                  <?php } ?>

                </div>
            </div>

        </div>
    </div>
</div>
