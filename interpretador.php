<?php
  include "./helper/helpers.php";
  require 'vendor/autoload.php';
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\IOFactory;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

  $fileTable  = $_FILES["xlsx"];
  $fileUpdate = $_FILES["xml"];

  $typeFileTable  = strstr($fileTable["name"],  ".");
  $typeFileUpdate = strstr($fileUpdate["name"], ".");

  $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
  $sheet = "";

  $spreadsheet = $reader->load($_FILES["xlsx"]["tmp_name"]);
  $sheet_count = $spreadsheet->getSheetCount();

  $data = $spreadsheet->getActiveSheet()->toArray();

  try {
    $conection = new Config\Connection();
    $conection->connect();
    echo 'A connection to the PostgreSQL database sever has been established successfully.';
  } catch (\PDOException $e) {
    echo $e->getMessage();
  }

