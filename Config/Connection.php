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
  }