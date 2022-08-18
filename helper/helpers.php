<?php
  function removeSingleQuotes($dsString)
  {
    return str_replace("'", "''", $dsString);
  }

/**
 * Recebe os dados dos torcedores e trata para nao dar bug de banco
 * @param $arrData
 * @return mixed
 */
  function prepareArrayData($arrData)
  {
    $arrData["nome"]      = strtoupper(removeSingleQuotes($arrData["nome"]));
    $arrData["documento"] =  preg_replace("/[^0-9]/","",  $arrData["documento"]);
    $arrData["cep"]       = preg_replace("/[^0-9]/","",  $arrData["cep"]);
    $arrData["endereco"]  = removeSingleQuotes($arrData["endereco"]);
    $arrData["bairro"]    = removeSingleQuotes($arrData["bairro"]);
    $arrData["cidade"]    = removeSingleQuotes($arrData["cidade"]);
    $arrData["cidade"]    = removeSingleQuotes($arrData["cidade"]);
    $arrData["telefone"]  = preg_replace("/[^0-9]/","",  $arrData["telefone"]);
    $arrData["ativo"]     = ($arrData["ativo"] == 1) ? 1 : 0;

    return $arrData;
  }