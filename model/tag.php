<?php

require_once 'conn.php';


class DataTag extends Conn
{
     private $conn = "";
     private $pdo = "";

     function __construct()
     {
          $this->conn = new Conn();
          $this->pdo = $this->conn->pdo();
     }

     public function insertTags(ControllerTags $tags)
     {
          $query = " INSERT INTO tb_tags (status_tag, desc_tag, img_tag)
                                       VALUES( :status, :desc, :img) ";
          $sql = $this->pdo->prepare($query);
          $sql->bindValue(":status", $tags->getStatus());
          $sql->bindValue(":desc", $tags->getDesc());
          $sql->bindValue(":img", $tags->getImg());

          if ($sql->execute()) {
               $tags->setMsg("Tag cadastrada com sucesso");
               return true;
          } else {
               $tags->setMsg("error  insertTags");
               return false;
          }
     }

     public function listTags(ControllerTags $tags)
     {
          $query = "SELECT * FROM tb_tags";
          $sql = $this->pdo->query($query);
          $sql->execute();

          if ($sql->rowCount() > 0) {
              
               $list_tags = array();
               while ($tag = $sql->fetchAll(PDO::FETCH_ASSOC)) {
                    $list_tags = $tag;
               }
               $tags->setListTags($list_tags);
               
               return true;
          } else {
               $tags->setMsg("not found");
               return false;
          }
     }


     public function selectTagImg(ControllerTags $tags)
     {
          $query = "SELECT status_tag ,img_tag  FROM tb_tags WHERE status_tag=:status";

          $sql = $this->pdo->prepare($query);
          $sql->bindValue(":status", $tags->getStatus());
          $sql->execute();        
          
          if ($sql->rowCount() > 0) {

               $list_tags = array();
               while ($tag = $sql->fetchAll(PDO::FETCH_ASSOC)) {
                    $list_tags = $tag;
               }
               $tags->setListTags($list_tags);

               return true;
          } else {
               $tags->setMsg("not found");
               return false;
          }
     }



     public function deleteTag(ControllerTags $tags)
     {

          $query = "DELETE FROM tb_tags WHERE id_tag = :id ";

          $sql = $this->pdo->prepare($query);
          $sql->bindValue(":id", $tags->getId());
          $sql->execute();  

          if ($sql->rowCount() > 0) {
               $tags->setMsg("delete sucess");
          } else {
               $tags->setMsg("delete error");
          }
     }


}