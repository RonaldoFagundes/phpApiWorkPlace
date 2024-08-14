<?php

require_once 'conn.php';


class DataCompany extends Conn
{
     private $conn = "";
     private $pdo = "";

     function __construct()
     {
          $this->conn = new Conn();
          $this->pdo = $this->conn->pdo();
     }



     public function insertCompany(ControllerCompany $company)
     {
          $query = " INSERT INTO tb_company (name_com, address_com, postal_cod_com, state_com , country_com, phone_com, web_site_com, logo_img_com, icon_img_com ,img_com )
                                       VALUES( :name, :address, :postal, :state, :contry, :phone, :web, :logo, :icon, :img  ) ";
          $sql = $this->pdo->prepare($query);
          $sql->bindValue(":name", $company->getName());
          $sql->bindValue(":address", $company->getAddress());
          $sql->bindValue(":postal", $company->getPostalcod());
          $sql->bindValue(":state", $company->getState());
          $sql->bindValue(":contry", $company->getCountry());
          $sql->bindValue(":phone", $company->getPhone());
          $sql->bindValue(":web", $company->getWebsite());
          $sql->bindValue(":logo", $company->getLogo());
          $sql->bindValue(":icon", $company->getIcon());
          $sql->bindValue(":img", $company->getImg());
          if ($sql->execute()) {
               $company->setMsg(" Company " . $company->getName() . " cadastrada com sucesso ");
               return true;
          } else {
               $company->setMsg("error  insertCompany");
               return false;
          }
     }


     public function listCompany(ControllerCompany $company)
     {
          $query = "SELECT * FROM tb_company";
          $sql = $this->pdo->query($query);
          $sql->execute();
          if ($sql->rowCount() > 0) {         
            $list_company = array();
            while ($companys = $sql->fetchAll(PDO::FETCH_ASSOC)) {
                    $list_company = $companys;
              }
               $company->setListCompany($list_company);        
               return true;
            } else {
               $company->setMsg("not found");
               return false;
            }
     }    


}