<?php

class Conn
{

  private $host;
  private $user;
  private $password;
  private $db;


  public function pdo()
  {
    $this->host = "localhost";
    $this->user = "rfactory";
    $this->password = "faC*rF_71";
    $this->db = "db_rf_ideia";
    
    try {
      $pdo = new PDO(
        "mysql:host=$this->host;dbname=$this->db",
        $this->user,
        $this->password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
      );
      return $pdo;

    } catch (PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
    }

  }

}