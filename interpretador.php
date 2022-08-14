<?php
 include "./helper/helpers.php";
// require_once './php-excel-reader-2.23/excel_reader2.php';

 $fileTable  = $_FILES["xlsx"];
 $fileUpdate = $_FILES["xml"];

 $typeFileTable  = strstr($fileTable["name"],  ".");
 $typeFileUpdate = strstr($fileUpdate["name"], ".");

// if (!in_array($typeFileTable, [".xlsx", ".xls"]) || $typeFileUpdate != ".xml")
// {
//    echo ('Alguma das extensaoes nao batem com as necessarias');
//   exit();
// }
//

 ppp($fileTable);

 if (!empty($_FILES["xlsx"]["tmp_name"]))
 {


 }
