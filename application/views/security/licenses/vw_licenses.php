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
                    <div class="card-options">
                        <a href="<?php echo $link_insert; ?>" class="btn btn-primary">
                            <span class="me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M12 5l0 14"></path>
                                   <path d="M5 12l14 0"></path>
                                </svg>
                            </span>Incluir</a>
                    </div>
                  </div>                    
                  <div class="table-responsive">
                    <table class="table table-hover card-table table-vcenter text-nowrap" id="task-table">
                      <thead>
                        <tr role="row">
                          <th>Nome</th>
                          <th>Abreviado</th>
                          <th class="text-center"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($dataset as $row){ ?>
                            <tr role="row" class="odd">
                              <td><?php echo $row->name; ?></td>
                              <td><?php echo $row->short_name; ?></td>
                              <td class="text-end">
                                <a class="text-blue me-2" href="<?php echo $link_update."/".md5($row->license_id); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                        <path d="M13.5 6.5l4 4"></path>
                                    </svg>
                                </a>
                                <a href="javascript:void(0)"
                                   class="confirma_exclusao text-red"
                                   data-target="#modal_confirmation"
                                   data-key="<?php echo $link_delete."/".md5($row->license_id); ?>"
                                   data-code="<?php echo $row->license_id; ?>"
                                   data-name="<?php echo $row->name; ?>"
                                   data-desc="" >
                                   <span class="me-1 text-red">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <path d="M4 7l16 0"></path>
                                       <path d="M10 11l0 6"></path>
                                       <path d="M14 11l0 6"></path>
                                       <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                       <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                    </svg>
                                  </span>
                                </a>
                              </td>
                            </tr>
                            <?php echo fsModalDelete($row->license_id); ?>
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
