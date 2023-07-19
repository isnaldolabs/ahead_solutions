<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define('SEND_MAIL_PATH', './phpmailer/class.phpmailer.php');

/*
|------------------------------------------------------------------------------|
| foEmailUserCreated: usuário criado na plataforma.
|------------------------------------------------------------------------------|
*/
function foEmailUserCreated($poFields, $poContent){
  require_once(SEND_MAIL_PATH);
  $mail = new PHPMailer();
  $mail->IsSMTP();

  $loLoadMail = fo_get_appweb_email();
  $mail->Host        = $loLoadMail['host'];
  $mail->SMTPSecure  = $loLoadMail['smtp_secure'];
  $mail->Port        = $loLoadMail['port'];
  $mail->SMTPAutoTLS = $loLoadMail['smtp_auto_tls'];
  $mail->SMTPAuth    = $loLoadMail['smtp_auth'];
  $mail->CharSet     = $loLoadMail['charset'];
  $mail->Username    = $loLoadMail['username'];
  $mail->Password    = $loLoadMail['password'];
  $mail->SMTPDebug   = $loLoadMail['smtp_debug'];
  $mail->From        = $loLoadMail['from'];
  $mail->FromName    = $loLoadMail['name'];

  // Destinatário
  $mail->AddAddress($poFields['info_email'], $poFields['info_name']);

  // Define tipo de Mensagem que vai ser enviado
  $mail->IsHTML(TRUE); // Define que o e-mail será enviado como HTML

  // Assunto e Mensagem do email
  $mail->Subject = '['.SYSTEM_NAME.'] Usuário cadastrado';
  $mail->Body = $poContent;

  // Envia a Mensagem
  $lbSent = $mail->Send();

  /* Limpa tudo */
  $mail->ClearAllRecipients();
  $mail->ClearAttachments();

  // Verifica se o email foi enviado
  return $lbSent;
}

/*
|------------------------------------------------------------------------------|
| foEmailForgot: função para envio de e-mail de instrução de alteração de senha.
|------------------------------------------------------------------------------|
*/
function foEmailForgot($poFields, $poContent){
  require_once(SEND_MAIL_PATH);
  $mail = new PHPMailer();
  $mail->IsSMTP();

  $loLoadMail = fo_get_appweb_email();
  $mail->Host        = $loLoadMail['host'];
  $mail->SMTPSecure  = $loLoadMail['smtp_secure'];
  $mail->Port        = $loLoadMail['port'];
  $mail->SMTPAutoTLS = $loLoadMail['smtp_auto_tls'];
  $mail->SMTPAuth    = $loLoadMail['smtp_auth'];
  $mail->CharSet     = $loLoadMail['charset'];
  $mail->Username    = $loLoadMail['username'];
  $mail->Password    = $loLoadMail['password'];
  $mail->SMTPDebug   = $loLoadMail['smtp_debug'];
  $mail->From        = $loLoadMail['from'];
  $mail->FromName    = $loLoadMail['name'];

  // Destinatário
  $mail->AddAddress($poFields['info_email'], $poFields['info_name']);

  // Define tipo de Mensagem que vai ser enviado
  $mail->IsHTML(TRUE); // Define que o e-mail será enviado como HTML

  // Assunto e Mensagem do email
  $mail->Subject = 'Alteração de senha solicitada';
  $mail->Body = $poContent;

  // Envia a Mensagem
  $lbSent = $mail->Send();

  /* Limpa tudo */
  $mail->ClearAllRecipients();
  $mail->ClearAttachments();

  // Verifica se o email foi enviado
  return $lbSent;
}

/*
|------------------------------------------------------------------------------|
| foEmailResetPasswordDone: envio de e-mail de aviso de alteração de senha.
|------------------------------------------------------------------------------|
*/
function foEmailResetPasswordDone($poFields, $poContent){
  require_once(SEND_MAIL_PATH);
  $mail = new PHPMailer();
  $mail->IsSMTP();

  $loLoadMail = fo_get_appweb_email();
  $mail->Host        = $loLoadMail['host'];
  $mail->SMTPSecure  = $loLoadMail['smtp_secure'];
  $mail->Port        = $loLoadMail['port'];
  $mail->SMTPAutoTLS = $loLoadMail['smtp_auto_tls'];
  $mail->SMTPAuth    = $loLoadMail['smtp_auth'];
  $mail->CharSet     = $loLoadMail['charset'];
  $mail->Username    = $loLoadMail['username'];
  $mail->Password    = $loLoadMail['password'];
  $mail->SMTPDebug   = $loLoadMail['smtp_debug'];
  $mail->From        = $loLoadMail['from'];
  $mail->FromName    = $loLoadMail['name'];

  // Destinatário
  $mail->AddAddress($poFields['info_email'], $poFields['info_name']);

  // Define tipo de Mensagem que vai ser enviado
  $mail->IsHTML(TRUE); // Define que o e-mail será enviado como HTML

  // Assunto e Mensagem do email
  $mail->Subject = 'Senha alterada com sucesso';
  $mail->Body = $poContent;

  // Envia a Mensagem
  $lbSent = $mail->Send();

  /* Limpa tudo */
  $mail->ClearAllRecipients();
  $mail->ClearAttachments();

  // Verifica se o email foi enviado
  return $lbSent;
}

/*
|------------------------------------------------------------------------------|
| foEmailChecks: envio de e-mail com as avaliações para seus responsáveis.
|------------------------------------------------------------------------------|
*/
function foEmailChecks($poFields, $poContent){
  require_once(SEND_MAIL_PATH);
  $mail = new PHPMailer();
  $mail->IsSMTP();

  $loLoadMail = fo_get_appweb_email();
  $mail->Host        = $loLoadMail['host'];
  $mail->SMTPSecure  = $loLoadMail['smtp_secure'];
  $mail->Port        = $loLoadMail['port'];
  $mail->SMTPAutoTLS = $loLoadMail['smtp_auto_tls'];
  $mail->SMTPAuth    = $loLoadMail['smtp_auth'];
  $mail->CharSet     = $loLoadMail['charset'];
  $mail->Username    = $loLoadMail['username'];
  $mail->Password    = $loLoadMail['password'];
  $mail->SMTPDebug   = $loLoadMail['smtp_debug'];
  $mail->From        = $loLoadMail['from'];
  $mail->FromName    = $loLoadMail['name'];

  // Destinatário
  $mail->AddAddress($poFields['info_email'], $poFields['info_name']);

  // Define tipo de Mensagem que vai ser enviado
  $mail->IsHTML(TRUE); // Define que o e-mail será enviado como HTML

  // Assunto e Mensagem do email
  $mail->Subject = 'Cronograma de avaliações do experimento #'.$poFields['info_protocol'];
  $mail->Body = $poContent;

  // Envia a Mensagem
  try
  {
    $mail->Send();
  } catch (Exception $ex) {
    throw $ex->message();
  }

  /* Limpa tudo */
  $mail->ClearAllRecipients();
  $mail->ClearAttachments();

  // Verifica se o email foi enviado
}




































/*
|------------------------------------------------------------------------------|
| foEmailRegistration: função para envio de e-mail de registro realizado.
|------------------------------------------------------------------------------|
*/
function foEmailRegistration($poFields, $poContent){
  require_once(SEND_MAIL_PATH);
  $mail = new PHPMailer();
  $mail->IsSMTP();

  $loLoadMail = fo_get_appweb_email();
  $mail->Host        = $loLoadMail['host'];
  $mail->SMTPSecure  = $loLoadMail['smtp_secure'];
  $mail->Port        = $loLoadMail['port'];
  $mail->SMTPAutoTLS = $loLoadMail['smtp_auto_tls'];
  $mail->SMTPAuth    = $loLoadMail['smtp_auth'];
  $mail->CharSet     = $loLoadMail['charset'];
  $mail->Username    = $loLoadMail['username'];
  $mail->Password    = $loLoadMail['password'];
  $mail->SMTPDebug   = $loLoadMail['smtp_debug'];
  $mail->From        = $loLoadMail['from'];
  $mail->FromName    = $loLoadMail['name'];

  $mail->AddAddress($poFields['info_email'], $poFields['info_name']);
  $mail->IsHTML(TRUE);
  $mail->Subject = 'Bem-vindo';
  $mail->Body = $poContent;
  $lbSent = $mail->Send();
  $mail->ClearAllRecipients();
  $mail->ClearAttachments();
  return $lbSent;
}

/*
|------------------------------------------------------------------------------|
| foEmailUpChangeUserPassword: aviso para alteração de password
|------------------------------------------------------------------------------|
*/
function foEmailUpChangeUserPassword($poFields, $poContent){
  require_once(SEND_MAIL_PATH);
  $mail = new PHPMailer();
  $mail->IsSMTP();

  $loLoadMail = fo_get_appweb_email();
  $mail->Host        = $loLoadMail['host'];
  $mail->SMTPSecure  = $loLoadMail['smtp_secure'];
  $mail->Port        = $loLoadMail['port'];
  $mail->SMTPAutoTLS = $loLoadMail['smtp_auto_tls'];
  $mail->SMTPAuth    = $loLoadMail['smtp_auth'];
  $mail->CharSet     = $loLoadMail['charset'];
  $mail->Username    = $loLoadMail['username'];
  $mail->Password    = $loLoadMail['password'];
  $mail->SMTPDebug   = $loLoadMail['smtp_debug'];
  $mail->From        = $loLoadMail['from'];
  $mail->FromName    = $loLoadMail['name'];

  $mail->AddAddress($poFields['info_mail'], $poFields['info_mail']);

  $mail->IsHTML(TRUE); // Define que o e-mail será enviado como HTML
  $mail->Subject = 'Senha alterada com sucesso';
  $mail->Body = $poContent;
  $lbSent = $mail->Send();

  $mail->ClearAllRecipients();
  $mail->ClearAttachments();

  return $lbSent;
}

