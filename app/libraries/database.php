<?php
class Database
{
  private $db_host = DB_HOST;
  private $db_name = DB_NAME;
  private $db_user = DB_USER;
  private $db_password = DB_PASSWORD;

  private $db_handler;
  private $stmt;
  private $error;

  public function __construct()
  {
    $dsn = "mysql:host=$this->db_host;dbname=$this->db_name";

    $options = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    try {
      $this->db_handler = new PDO($dsn, $this->db_user, $this->db_password, $options);
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
    }
  }
}
