<?php

/***** DEBUG *****/
/**
 * Recebe um array ou objeto como parâmetro, imprimindo
 * o valor formatado (print_r com tags <pre>).
 *
 * @param $value
 */
function ppp($value)
{
  if (!$value instanceof Closure)
  {
    if (is_object($value))
      $value = clone $value;

    apagaConnRecursivo($value);
  }

  if (PHP_SAPI != 'cli') echo "<pre style='text-align: left'>";
  print_r($value);
  if (PHP_SAPI != 'cli') echo "</pre>";
}

function apagaConnRecursivo(&$object)
{
  if (!is_object($object) && !is_array($object)) return;

  if (is_object($object))
  {
    $object->objConn = null;
    unset($object->objConn);
  }

  foreach ($object as $obj)
  {
    if (is_object($obj))
    {
      apagaConnRecursivo($obj);
      $obj->objConn = null;
      unset($obj->objConn);
    }

    if (is_array($obj))
    {
      foreach ($obj as $ob)
      {
        if (is_object($ob))
        {
          apagaConnRecursivo($ob);
          $ob->objConn = null;
          unset($ob->objConn);
        }
      }
    }
  }
}

/**
 * retorna true se for um valor valido.
 * utilizado para verificar campos enviados por formulários
 *
 * @return boolean
 */
function str_value($value)
{
  return ($value !== '' && $value !== null && $value !== false);
}
