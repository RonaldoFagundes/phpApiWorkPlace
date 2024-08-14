<?php

require_once 'conn.php';


class DataConstruction extends Conn
{
     private $conn = "";
     private $pdo = "";

     function __construct()
     {
          $this->conn = new Conn();
          $this->pdo = $this->conn->pdo();
     }

     public function insertConstruction(ControllerConstrunction $constructions)
     {

          $query = " INSERT INTO tb_constructions (img_cts, name_cts, enterprise_cts, address_cts )
                                        VALUES( :img, :name, :ente, :addr ) ";

          $sql = $this->pdo->prepare($query);

          $sql->bindValue(":img", $constructions->getImg());
          $sql->bindValue(":name", $constructions->getName());
          $sql->bindValue(":ente", $constructions->getEnterprise());
          $sql->bindValue(":addr", $constructions->getAddress());

          if ($sql->execute()) {

               $constructions->setMsg(" Construtora " . $constructions->getName() . " cadastrada com sucesso ");
               return true;
          } else {

               $constructions->setMsg("error insertConstruction");
               return false;
          }

     }




     public function listConstructions(ControllerConstrunction $constructions)
     {
          $query = "SELECT * FROM tb_constructions";
          $sql = $this->pdo->query($query);
          $sql->execute();

          if ($sql->rowCount() > 0) {
               $list_constructions = array();

               while ($constru = $sql->fetchAll(PDO::FETCH_ASSOC)) {
                    $list_constructions = $constru;
               }
               $constructions->setListConstructions($list_constructions);
               return true;
          } else {
               $constructions->setMsg("error listConstructions");
               return false;
          }
     }

     public function deleteConstructions(ControllerConstrunction $constructions)
     {

          $query = "DELETE FROM tb_constructions WHERE id_cts= :id ";
          $sql = $this->pdo->prepare($query);

          $sql->bindValue(":id", $$constructions->getId());
          $sql->execute();

          if ($sql->rowCount() > 0) {
               $$constructions->setMsg("delete sucess");
          } else {
               $$constructions->setMsg("delete error");
          }
     }

}
