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

      }catch (Exception $e)
      {
        echo $e;
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
  }