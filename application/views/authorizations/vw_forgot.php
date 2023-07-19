<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body class="d-flex flex-column">
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark">
                    <img src="<?php echo base_url(LOGO_MARCA); ?>"
                         class="header-brand-img" height="96"
                         alt="<?php echo SYSTEM_NAME; ?>">
                </a>
            </div>
            <?php if(isset($flash_message)){echo $flash_message;} ?>
            <div class="card card-md">
                <div class="card-body">                    
                    <div class="card-title"><b><h3>Esqueceu sua senha?</h3></b></div>
                    <div class="text-muted small mb-3">Digite abaixo seu endereço de e-mail para que possamos enviar as instruções para redefinição de senha.</div>
                    <form action="<?php echo base_url(RT_FORGOT_02);?>"
                          method="post" autocomplete="off" novalidate>
                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email"
                                   id="id_email"
                                   name="edt_email"
                                   value="<?php echo $this->session->flashdata('edt_email'); ?>"
                                   class="form-control">
                            <?php echo fsInputError($this->session->flashdata('error_email')); ?>
                        </div>
                        <div class="text-center text-muted mt-1 pt-0" style="text-align: right !important;">
                            <a href="<?php echo base_url(RT_SIGNIN_01);?>">Retornar</a>
                        </div>
                        <div class="form-footer">
                            <button type="submit"
                                    id="<?php echo BTN_POST_SAVE;?>"
                                    name="<?php echo BTN_POST_SAVE;?>" 
                                    class="btn btn-primary btn-block w-100">Enviar as instruções</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>
