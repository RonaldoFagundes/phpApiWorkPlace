<?php

require_once 'conn.php';


class DataStandard extends Conn
{
     private $conn = "";
     private $pdo = "";

     function __construct()
     {
          $this->conn = new Conn();
          $this->pdo = $this->conn->pdo();
     }


     public function insertStandard(ControllerStandards $standards)
     {
          $query = " INSERT INTO tb_standards (name_sta,desc_sta)
                                       VALUES( :name, :desc) ";
          $sql = $this->pdo->prepare($query);
          $sql->bindValue(":name", $standards->getName());
          $sql->bindValue(":desc", $standards->getDesc());

          if ($sql->execute()) {
               $standards->setMsg(" standards cadastrada com sucesso ");
               return true;
          } else {
               $standards->setMsg("error insertStandard");
               return false;
          }
     }

     public function listStandard(ControllerStandards $standards)
     {
          $query = "SELECT * FROM tb_standards";
          $sql = $this->pdo->query($query);
          $sql->execute();

          if ($sql->rowCount() > 0) {
               $list_standards = array();
               while ($standard = $sql->fetchAll(PDO::FETCH_ASSOC)) {
                    $list_standards = $standard;
               }
               $standards->setListStandards($list_standards);
               // $tag = $sql->fetchObject();
               // $tags->setListTags($tag);
               return true;
          } else {
               $standards->setMsg("not found");
               return false;
          }
     }


}