<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <div class="my-3 my-md-5">
          <div class="container">

            <?php if(isset($flash_message)){echo $flash_message;} ?>

            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title"><?php echo $view_title; ?></h3>
                  </div>                    
                  <div class="table-responsive">
                    <table class="table table-hover card-table table-vcenter text-nowrap" id="task-table">
                      <thead>
                        <tr role="row">
                            <th>Grupo</th>
                            <th class="text-center">Administrador</th>
                            <th>Função</th>
                            <th class="text-center"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($dataset as $row){ ?>
                        <tr role="row" class="odd">
                          <td class="pt-2 pb-2 text-muted"><?php echo $row->group_name; ?></td>
                          <td class="text-center"><?php echo fsColumnActive($row->is_admin); ?></td>
                          <td class="pt-2 pb-2"><?php echo $row->function_name; ?></td>
                          <td class="pt-2 pb-2 text-right">

                            <?php if (fiLevelAccess(fi_get_user(), FNC_PERMISSIONS)==ACCESS_LEVEL_COMPLETE){ ?>
                              <a class="btn <?php echo ($row->level==ACCESS_LEVEL_DENIED?'btn-primary':'btn-secondary'); ?> me-1" href="<?php echo $link_update."/".md5($row->permission_id)."/".ACCESS_LEVEL_DENIED; ?>">
                                <i class="fe fe-x me-1"></i>Nenhuma
                              </a>
                              <a class="btn <?php echo ($row->level==ACCESS_LEVEL_READ?'btn-primary':'btn-secondary'); ?> me-1" href="<?php echo $link_update."/".md5($row->permission_id)."/".ACCESS_LEVEL_READ; ?>">
                                <i class="fe fe-book-open me-1"></i>Leitura
                              </a>
                              <a class="btn <?php echo ($row->level==ACCESS_LEVEL_COMPLETE?'btn-primary':'btn-secondary'); ?> me-1" href="<?php echo $link_update."/".md5($row->permission_id)."/".ACCESS_LEVEL_COMPLETE; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                   <path d="M13.5 6.5l4 4"></path>
                                </svg>Completo
                              </a>
                            <?php }else{ ?>
                              <a class="disabled btn <?php echo ($row->level==ACCESS_LEVEL_DENIED?'btn-primary':'btn-secondary'); ?> me-1" href="javascript:void();">
                                <i class="fe fe-x me-1"></i>Nenhuma
                              </a>
                              <a class="disabled btn <?php echo ($row->level==ACCESS_LEVEL_READ?'btn-primary':'btn-secondary'); ?> me-1" href="javascript:void();">
                                <i class="fe fe-book-open me-1"></i>Leitura
                              </a>
                              <a class="disabled btn <?php echo ($row->level==ACCESS_LEVEL_COMPLETE?'btn-primary':'btn-secondary'); ?> me-1" href="javascript:void();">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                   <path d="M13.5 6.5l4 4"></path>
                                </svg>Completo
                              </a>
                            <?php } ?>

                          </td>
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
