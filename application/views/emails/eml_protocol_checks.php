<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$loInfoMail = array(
    'email_address' => $info_email,
    'email_title' => 'Senha alterada');

$this->load->view('patterns/v_eml_header');
$this->load->view('patterns/v_eml_title', $loInfoMail);
?>

              <div style="margin:0px auto; max-width:750px;">
                <table style="width:100%" cellspacing="0" cellpadding="0" border="0" align="center">
                  <tbody>
                    <tr>
                      <h4></h4>
                      <td style="font-size:0px; padding:0px 20px 0px 20px; text-align:center">
                        <div style="font-size:0px; text-align:left; display:inline-block; vertical-align:top; width:100%">
                          <table style="vertical-align:top" width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                              <tr>
                                <td style="font-size:0px; padding:20px 0px;" align="center">
                                  <div style="font-family:sans-serif; font-size:16px; line-height:150%; text-align:center; color:#555555;">
                                    Senha de acesso para a plataforma <?php echo SYSTEM_NAME; ?> foi alterada com sucesso.
                                    <br><br>
                                    <a href="<?php echo base_url(); ?>"
                                       style="text-align:center; text-decoration:none; color:#FFFFFF;"
                                       target="_blank">
                                      <button style="background-color:#467fcf; border-color:#467fcf; border-radius:6px; padding:5px 15px; color:#fff; border:none; font-size:16px;">
                                        Ir para a <?php echo SYSTEM_NAME; ?>
                                      </button>
                                    </a>
                                    <p style="font-family:sans-serif; font-size:0.75rem; line-height:150%;">
                                      Caso o link não funcione, copie o endereço acima e cole-o diretamente em seu navegador. Se mesmo assim não funcionar, por favor entre em contato conosco.<br>
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
