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
                    <div class="card-title"><b><h3>Alteração de senha solicitada</h3></b></div>
                    <div class="card-body p-0 mb-4">
                            Acesse sua caixa de correio e lembre-se de seguir as orientações abaixo para realizar a mudança com segurança.
                            Mínimo de 5 caracteres.<br/>
                            Utilize apenas caracteres alfanuméricos
                        <br>
                            Se você não encontrar o e-mail, verifique outros lugares como as pastas de lixo eletrônico ou spam.
                    </div>
                    <div class="card-body p-0 mb-4">
                        Utilize o botão abaixo para acessar a platafoma.
                        <div class="mt-4">
                            <a href="<?php echo base_url(RT_SIGNIN_01);?>"
                               class="btn btn-primary w-100">Entrar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
