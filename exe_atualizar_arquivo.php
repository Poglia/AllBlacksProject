<?php
  use PhpOffice\PhpSpreadsheet\IOFactory;

  include "./helper/helpers.php";
  require 'vendor/autoload.php';
  ini_set('max_execution_time', '300');

  try {
    $connect = new Config\Connection();
    $connect->connect();
    //echo 'A connection to the PostgreSQL database sever has been established successfully.';
  } catch (\PDOException $e) {
      //echo $e->getMessage();
  }

  if (str_contains($_FILES["arquivo"]["name"], "xml"))
  {
    $dadosXml = simplexml_load_file($_FILES["arquivo"]["tmp_name"]);

    foreach ($dadosXml as $key => $value)
    {
      $arrData = prepareArrayData($value);
      $connect->updateOrInsertFromXml($arrData);
    }
  }
  else if (str_contains($_FILES["arquivo"]["name"], "xlsx") || str_contains($_FILES["arquivo"]["name"], "xls"))
  {
    $connect->resetData();

    $reader      = IOFactory::createReader("Xlsx");
    $spreadsheet = $reader->load($_FILES["arquivo"]["tmp_name"]);
    $sheet_count = $spreadsheet->getSheetCount();
    $data        = $spreadsheet->getActiveSheet()->toArray();

    foreach ($data as $key => $value)
    {
      if ($key == 0)
        continue;

      $value[0] = removeSingleQuotes($value[0]);
      $value[5] = removeSingleQuotes($value[5]);
      $value[3] = removeSingleQuotes($value[3]);
      $value[9] = ($value[9] == "SIM") ? 1 : 0;

      $sql = <<<SQL
          INSERT INTO torcedores (nm_torcedor, nr_doc, nr_cep, ds_endereco, nm_bairro, nm_cidade, ds_uf, nr_telefone, ds_email, id_ativo)
          VALUES ('{$value[0]}', '{$value[1]}', '{$value[2]}', '{$value[3]}', '{$value[4]}', '{$value[5]}', '{$value[6]}', '{$value[7]}', '{$value[8]}', '{$value[9]}');
    SQL;

      $connect->save($sql);
    }
  }
  else
    echo "Arquivo não Suportado";

  header('location: /');

