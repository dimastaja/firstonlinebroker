<?
die();
//error_reporting
require_once('classes/pm/class.phpmailer.php');
require_once('classes//pm/class.smtp.php');
  $Mailer = new PHPMailer();
  //$Mailer->SMTPDebug = 1;
  $Mailer->CharSet = 'UTF-8';
  $Mailer->IsSMTP();
  $Mailer->Host = 'smtp.yandex.ru';
  $Mailer->Port = 25;
  $Mailer->SMTPAuth = true;
  $Mailer->Username = 'info@firstonlinebroker.ru';
  $Mailer->Password = 'f0bSite_1';

  $Mailer->SetFrom('info@firstonlinebroker.ru', 'Info');
  $Mailer->AddAddress('dmitriy.supov@gmail.com');
  $Mailer->AddBCC('s_dimon88@list.ru');
  $subject = "Test mail";
  $Mailer->Subject = $subject;
  $message="blablabla";
  $Mailer->Body = $message;
 if($Mailer->Send()) echo 'true'; else echo 'false';
die();

?>