<?php
  namespace Config;

  use Dotenv\Dotenv;
  use PDO;

  class Connection {
    public function connect(): PDO
    {
      $dotenv = Dotenv::createImmutable('./');
      $dotenv->load();

      $pdo = new PDO("pgsql: host=" . $_ENV["DB_SERVER"] . ";port=" . $_ENV["DB_SERVER_PORT"] . ";dbname=" . $_ENV["DB_DATABASE"] . ";", $_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      return $pdo;
    }

    public function save($sql)
    {
      try {
        $pdo = $this->connect();
        $pdo->exec($sql);

      }catch (\PDOException $e)
      {
        echo $e->getMessage();
      }
    }

    public function getAllData()
    {
        $pdo = $this->connect();
        $sql = $pdo->prepare("SELECT nm_torcedor,   
                                           nr_doc, 
                                           nr_cep,  
                                           ds_endereco,      
                                           nm_bairro,      
                                           nm_cidade,         
                                           ds_uf,      
                                           nr_telefone,       
                                           ds_email,
                                           id_ativo
                                      FROM torcedores");

        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEmailAtivos()
    {
      $pdo = $this->connect();
      $sql = $pdo->prepare("SELECT ds_email
                                    FROM torcedores
                                   WHERE id_ativo = 1");

      $sql->execute();
      return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function resetData()
    {
      $pdo = $this->connect();
      $sql = $pdo->prepare("DELETE FROM torcedores WHERE TRUE;");
      $sql->execute();

    }

    public function updateOrInsertFromXml($arrValues)
    {
      $pdo        = $this->connect();
      $idTorcedor = self::verifyExistenceByDocument($arrValues["documento"], $pdo);

      try {
        if ($idTorcedor == "")
        {
          $sql = <<<SQL
            INSERT INTO torcedores (nm_torcedor, nr_doc, nr_cep, ds_endereco, nm_bairro, nm_cidade, ds_uf, nr_telefone, ds_email, id_ativo)
            VALUES ('{$arrValues["nome"]}', '{$arrValues["documento"]}', '{$arrValues["cep"]}', '{$arrValues["endereco"]}', 
                    '{$arrValues["bairro"]}', '{$arrValues["cidade"]}', '{$arrValues["uf"]}', '{$arrValues["telefone"]}', 
                    '{$arrValues["email"]}', '{$arrValues["ativo"]}');
          SQL;
        }
        else
        {
          $sql = <<<SQL
            UPDATE torcedores 
            SET nm_torcedor = '{$arrValues["nome"]}',
                nr_doc      = '{$arrValues["documento"]}',
                nr_cep      = '{$arrValues["cep"]}',
                ds_endereco = '{$arrValues["endereco"]}', 
                nm_bairro   = '{$arrValues["bairro"]}',
                nm_cidade   = '{$arrValues["cidade"]}',
                ds_uf       = '{$arrValues["uf"]}', 
                nr_telefone = '{$arrValues["telefone"]}',  
                ds_email    = '{$arrValues["email"]}', 
                id_ativo    = '{$arrValues["ativo"]}' 
            WHERE id_torcedor = '{$idTorcedor}';
          SQL;

        }

        $this->save($sql);
      }
      catch (\PDOException $e)
      {
        echo $e->getMessage();
      }
    }

    public function verifyExistenceByDocument($nrDoc, &$pdo)
    {
      $search = $pdo->prepare("SELECT id_torcedor FROM torcedores WHERE nr_doc = '{$nrDoc}'");
      $search->execute();

      $idTorcedor = $search->fetchAll(PDO::FETCH_COLUMN);

      return implode($idTorcedor);
    }
  }