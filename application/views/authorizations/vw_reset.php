<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <?php if(isset($flash_message)){echo $flash_message;} ?>
              <div class="mb-6"></div>
              <form class="card" action="<?php echo base_url(RT_RESET_01);?>" method="post">
                <div class="card-body p-6">
                  <div class="card-title"><b><h3>Alterar sua senha</h3></b></div>
                  <div class="text-muted small mb-3">Para prosseguir, defina uma nova senha</div>
                  <div class="form-group">
                    <label class="form-label">Nova senha
                      <small class="d-block text-muted">[use letras, números e caracteres especiais]</small>
                    </label>
                    <input type="password"
                           id="id_password"
                           name="edt_password"                           
                           class="form-control">
                    <?php echo fsInputError($this->session->flashdata('error_password')); ?>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Informe a nova senha mais uma vez
                      <small class="d-block text-muted">[use letras, números e caracteres especiais]</small>
                    </label>
                    <input type="password"
                           id="id_password"
                           name="edt_passconf"                           
                           class="form-control">
                    <?php echo fsInputError($this->session->flashdata('error_passconf')); ?>
                  </div>
                  <div class="text-center text-muted mt-1 pt-0" style="text-align: right !important;">
                    <a href="<?php echo base_url(RT_SIGNIN_01);?>">Realizar o Login</a>
                  </div>
                  <div class="form-footer">
                    <button type="submit"
                            id="<?php echo BTN_POST_SAVE;?>"
                            name="<?php echo BTN_POST_SAVE;?>" 
                            class="btn btn-primary btn-block">Atualizar a senha</button>
                  </div>
                </div>
                <input type="hidden" name="edt_key" value="<?php echo $token_key;?>" id="edt_key">
                <input type="hidden" name="edt_code" value="<?php echo $token_code;?>" id="edt_code">
              </form>
            </div>
          </div>
        </div>
      </div>