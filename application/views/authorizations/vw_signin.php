<body class="d-flex flex-column">
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark">
                    <img src="<?php echo base_url(LOGO_MARCA); ?>"
                         class="header-brand-img" height="64"
                         alt="<?php echo SYSTEM_NAME; ?>">
                </a>
            </div>
            <?php if(isset($flash_message)){echo $flash_message;} ?>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Acessar minha conta</h2>
                    <div class="text-muted small mb-3">Você pode ter acesso aos nossos serviços fazendo o login com seu e-mail</div>
                    <form action="<?php echo base_url(RT_SIGNIN_02);?>"
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
                        <div class="mb-2">
                            <label class="form-label">Senha</label>
                            <input type="password"
                                   id="id_password"
                                   name="edt_password"
                                   class="form-control">
                            <?php echo fsInputError($this->session->flashdata('error_password')); ?>
                        </div>
                        <div class="text-center text-muted mt-1 pt-0" style="text-align: right !important;">
                            <a href="<?php echo base_url(RT_FORGOT_01);?>">Esqueceu a senha ?</a>
                        </div>
                        <div class="form-footer">
                            <button type="submit"
                                    id="<?php echo BTN_POST_SAVE;?>"
                                    name="<?php echo BTN_POST_SAVE;?>"
                                    class="btn btn-primary btn-block w-100">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>