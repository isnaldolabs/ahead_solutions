<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <?php echo fsReturnPage(RT_PROTOCOLS, '#'.$protocol_id.' '.$protocol_title); ?>
        <div class="my-3 my-md-5">
          <div class="container">

            <?php if(isset($flash_message)){echo $flash_message;} ?>

            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title"><?php echo $view_title; ?></h3>
                    <div class="card-options">
                      <?php if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_ATTACHS)==ACCESS_LEVEL_COMPLETE){ ?>
                        <a href="javascript:void(0)"
                           class="btn btn-primary btn-sm me-2"
                           data-bs-toggle="modal" data-bs-target="#modal-dialog-upload">
                            <i class="fe fe-upload me-1"></i>Upload
                        </a>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover card-table table-vcenter" id="task-table">
                      <thead>
                        <tr role="row">
                          <th class="text-center">Data e hora do upload</th>
                          <th>Responsável</th>
                          <th>Arquivo</th>
                          <?php if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_ATTACHS)==ACCESS_LEVEL_COMPLETE){ ?>
                            <th class="text-center"></th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($dataset as $row){ ?>
                        <tr role="row" class="odd">
                          <td class="text-center"><?php echo fdDateMySQL_to_DateBr($row->uploaded_at); ?></td>
                          <td><?php echo $row->user_name; ?></td>
                          <td><?php echo $row->file_name; ?></td>
                          <?php if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_ATTACHS)==ACCESS_LEVEL_COMPLETE){ ?>
                            <td class="text-end">
                                <a class="text-blue me-2"
                                    href="<?php echo $link_download."/".md5($row->attach_id); ?>">
                                    <i class="fe fe-download me-1 text-blue"></i>
                                </a>

                                <a href="javascript:void(0)"
                                   class="confirma_exclusao text-red"
                                   data-target="#modal_confirmation"
                                   data-key="<?php echo $link_delete."/".md5($row->attach_id); ?>"
                                   data-code="<?php echo $row->file_name; ?>"
                                   data-name=""
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
                          <?php } ?>
                        </tr>

                        <?php
                          if (fiLevelAccess(fi_get_user(), FNC_PROTOCOLS_ATTACHS)==ACCESS_LEVEL_COMPLETE){
                            echo fsModalDelete($row->attach_id);
                          }
                        ?>

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

                <!-- Begin: Modal -->
                <div class="modal fade" id="modal-dialog-upload" tabindex="-1" role="dialog" aria-labelledby="myModalUploadLabel">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalUploadLabel">
                          <i class="fe fe-upload me-2"></i>Anexar arquivos
                        </h4>
                      </div>
                      <div class="modal-body">
                            <form action="<?php echo $link_upload; ?>" method="post" enctype="multipart/form-data" />
                                <div class="alert alert-primary" role="alert">
                                    <p class="h4 alert-title">Observações:</p>
                                    <div class="d-flex">
                                        <p>
                                            O arquivo deve possuir no máximo 2MB</br>
                                            O arquivo deve ser do tipo pdf, xls, xlsx, doc, docx, png, jpg
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group mt-4">
                                    <div class="form-label">Localize o arquivo para upload</div>
                                    <input type="file" id="<?php echo FIELD_UPLOAD; ?>"
                                           class="form-control"
                                           name="<?php echo FIELD_UPLOAD; ?>" 
                                           accept=".pdf, .xls, .xlsx, .doc, .docx" />
                                </div>
                                <div class="text-end mt-4 pt-6">
                                    <input type="submit" name="btnUpload" id="btnUpload" class="btn btn-primary me-2" style="width: 100px;" value="Carregar" />
                                    <button type="button" class="btn me-auto" style="width: 100px;" data-bs-dismiss="modal">Retornar</button>
                                </div>
                            </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End: Modal -->

              </div>
            </div>
          </div>
        </div>
