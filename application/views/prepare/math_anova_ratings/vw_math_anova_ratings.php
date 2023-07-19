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
                      <thead class="text-center">
                        <tr role="row">
                          <th>Valor Mínimo</th>
                          <th>Valor Máximo</th>
                          <th>Classificação</th>
                          <th>Precisão</th>
                          <th>Cor</th>
                          <?php if (fiLevelAccess(fi_get_user(), FNC_MATH_ANOVA_RATINGS)==ACCESS_LEVEL_COMPLETE){ ?>
                            <th class="text-center"></th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($ds_dataset as $row){ ?>
                        <tr role="row" class="odd text-center">
                            <td><?php echo $row->min_value; ?></td>
                            <td><?php echo $row->max_value; ?></td>
                            <td><?php echo $row->sort; ?></td>
                            <td><?php echo $row->accuracy; ?></td>
                            <td><div class="<?php echo $row->color; ?>">Resultado</div></td>
                            <?php if (fiLevelAccess(fi_get_user(), FNC_MATH_ANOVA_RATINGS)==ACCESS_LEVEL_COMPLETE){ ?>
                              <td class="text-end">
                                <a class="text-blue me-2" href="<?php echo $link_update."/".md5($row->rating_id); ?>">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                   <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                   <path d="M13.5 6.5l4 4"></path>
                                  </svg>
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
