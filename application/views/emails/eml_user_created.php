<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$loInfoMail = array(
    'email_address' => $info_email,
    'email_title' => 'Usuário ativado na plataforma '.SYSTEM_NAME);

$this->load->view('patterns/v_eml_header');
$this->load->view('patterns/v_eml_title', $loInfoMail);
?>

              <div style="margin:0px auto; max-width:750px;">
                <table style="width:100%" cellspacing="0" cellpadding="0" border="0" align="center">
                  <tbody>
                    <tr>
                      <h4></h4>
                      <td style="font-size:0px; padding:20px 0; padding-bottom:0; padding-left:40px; padding-right:40px; text-align:center">
                        <div style="font-size:0px; text-align:left; display:inline-block; vertical-align:top; width:100%">
                          <table style="vertical-align:top" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td style="font-size:0px; padding:0px; word-break:break-word" align="center">
                                  <div style="font-family:sans-serif; font-size:16px; line-height:150%; text-align:center; color:#555555"><br>

                                    <p>Você recebeu este e-mail porque foi cadastrado na plataforma <?php echo SYSTEM_NAME; ?>.</p>
                                    <p>Por favor utilize o link abaixo para solicitar sua alteração de senha.</p>
                                    <p></p>
                                    <a href="<?php echo base_url(RT_FORGOT_01); ?>"
                                       style="text-align:center; text-decoration:none; color:#FFFFFF;"
                                       target="_blank">
                                      <button style="background-color:#5eba00; border-color:#5eba00; border-radius:6px; padding:5px 15px; color:#fff; border:none; font-size:16px;">
                                        Alterar senha
                                      </button>
                                    </a>
                                    <p></p>

                                    <p style="font-family:sans-serif; font-size:0.75rem; line-height:150%;">
                                      Caso o link não funcione, copie o endereço e cole-o diretamente em seu navegador.<br>
                                      Se mesmo assim não funcionar, por favor entre em contato conosco.<br>
                                      Se você não fez esta solicitação, basta excluir este e-mail.
                                    </p>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>                

<?php
$this->load->view('patterns/v_eml_footer', $loInfoMail);
?>
