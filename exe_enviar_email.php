<?php
  echo 'O processo de E-mail não funciona em localhost, apenas em um servidor que ofereça esse serviço, então não será possivel testa-lo em desenvolvimento';
  echo 'Para Debbugar o processo pode comentar Essas mensagens juntamente com o Exit'; exit();

  use Config\Connection;
  require 'vendor/autoload.php';

  $nmEmpresa  = 'Nome empresa';
  $dsEmail    = 'emailEmpresa.com';
  $dsMensagem = 'Uma mensagem de teste';

  $dtEnvio = date('d/m/Y');
  $hrEnvio = date('H:i:s');

  $dsArquivo = <<<HTML
    <p><b>Nome: </b>$nmEmpresa</p>
    <p><b>E-mail: </b>$dsEmail</p>
    <p><b>Mensagem: </b>$dsMensagem</p>
    <p>Este e-mail foi enviado em <b>$dtEnvio</b> às <b>$hrEnvio</b></p>
  HTML;

  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers .= "From: $nmEmpresa <$dsEmail>";

  $dsEmailTorcedor = "";
  $dsAssunto       = "Teste Envio de E-mail";

  $connect   = new Connection();
  $arrEmails = $connect->getEmailAtivos();

  foreach ($arrEmails as $email)
  {
    $dsEmailTorcedor = $email["ds_email"];
    mail($dsEmailTorcedor, $dsAssunto, $dsArquivo, $headers);
  }

  header('location: /');