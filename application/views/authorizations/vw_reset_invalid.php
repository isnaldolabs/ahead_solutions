<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="mb-6"></div>
              <div class="card">
                <div class="card-body p-6">
                  <div class="card-title"><b><h3>Acesso não permitido</h3></b></div>
                  
                  <div class="alert alert-icon alert-primary" role="alert">
                    <i class="fe fe-bell me-2" aria-hidden="true"></i>
                    Link para alteração de senha não é válido ou expirou.
                  </div>                  

                  <div class="form-footer">
                    <div class="text-center text-muted mt-1 pt-0" style="text-align: right !important;">
                      <a href="<?php echo base_url(RT_SIGNIN_01);?>"
                         class="btn btn-primary btn-block">Realizar o Login</a>
                    </div>                      
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>