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
                            <th>Nome</th>
                            <th class="text-center">Ativo</th>
                            <th>E-mail</th>
                            <th>Grupo</th>
                            <th class="text-center">Administrador</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($dataset as $row_user){ ?>
                            <tr role="row" class="odd">
                              <td><?php echo $row_user->full_name; ?></td>
                              <td class="text-center"><?php echo fsColumnActive($row_user->active); ?></td>
                              <td><?php echo $row_user->email; ?></td>
                              <td>
                                <?php if (fiLevelAccess(fi_get_user(), FNC_GROUPS_CONFIG)==ACCESS_LEVEL_COMPLETE){ ?>
                                <!-- Button trigger modal -->
                                <a href="" style="text-decoration: none; color: #000;" data-bs-toggle="modal" data-bs-target="#groupModal<?php echo $row_user->user_group_id; ?>">
                                    <i class="dropdown-icon fe fe-repeat pr-3 <?php echo ($row_user->group_name==NULL?'text-red':''); ?>"></i><?php echo $row_user->group_name; ?>
                                </a>
                                <?php }else{echo $row_user->group_name;} ?>
                              </td>
                              <td class="text-center"><?php echo fsColumnActive($row_user->is_admin); ?></td>
                            </tr>
                            <!-- Modal para escolha do grupo -->
                            <div class="modal fade" id="groupModal<?php echo $row_user->user_group_id; ?>" tabindex="-1" role="dialog" aria-labelledby="groupModalTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="groupModalTitle">Grupo para <?php echo $row_user->full_name; ?></h5>
                                  </div>
                                  <div class="modal-body">
                                    <?php foreach ($input_groups_list as $row_group){ ?>
                                      <a href="<?php echo $link_update."/".md5($row_user->user_group_id)."/".$row_group->column_key; ?>"
                                         class="dropdown-item"><i class="dropdown-icon fe fe-check"></i>
                                         <?php echo $row_group->column_name; ?>
                                      </a>
                                    <?php } ?>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                  </div>
                                </div>
                              </div>
                            </div>
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
