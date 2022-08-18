<?php
  require 'vendor/autoload.php';
  use Config\Connection;
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
  ini_set('default_charset','ISO-8859-1');

  $spreadsheet = new Spreadsheet();
  $writer      = new Xlsx($spreadsheet);
  $sheet       = $spreadsheet->getActiveSheet();

  $connect = new Connection();
  $data    = $connect->getAllData();

  $cells = [
    ['NOME', 'DOCUMENTO', 'CEP', 'ENDERECO', 'BAIRRO', 'CIDADE', 'UF', 'TELEFONE', 'E-MAIL', 'ATIVO']
  ];

  foreach ($data as $key => $value)
  {
    $cells[] = [
      $value["nm_torcedor"],
      $value["nr_doc"],
      $value["nr_cep"],
      $value["ds_endereco"],
      $value["nm_bairro"],
      $value["nm_cidade"],
      $value["ds_uf"],
      $value["nr_telefone"],
      $value["ds_email"],
      $value["id_ativo"] = ($value["id_ativo"] == 1 ? "SIM" : "NAO")
    ];
  }

  $sheet->fromArray($cells, null, "A1");
  $writer->save("torcedores.xlsx");

  header('location: /');