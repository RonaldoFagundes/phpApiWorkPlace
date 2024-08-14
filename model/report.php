<?php


require_once 'conn.php';

class DataReport extends Conn
{
     private $conn = "";
     private $pdo = "";


     function __construct()
     {
          $this->conn = new Conn();
          $this->pdo = $this->conn->pdo();
     }



     public function insertReport(ControllerReport $report)
     {
          $query = "INSERT INTO tb_reports(number_rpt, page_rpt, date_rpt, img_one_rpt, img_two_rpt, img_three_rpt, img_four_rpt, title_rpt, description_rpt, status_rpt, id_fk_cts)
      VALUES( :num, :pag, :dt, :imgOne, :imgTwo, :imgThree, :imgFour, :title, :desc, :st, :id)";

          $sql = $this->pdo->prepare($query);
          $sql->bindValue(":num", $report->getNumber());
          $sql->bindValue(":pag", $report->getPage());
          $sql->bindValue(":dt", $report->getDate());
          $sql->bindValue(":imgOne", $report->getImgOne());
          $sql->bindValue(":imgTwo", $report->getImgTwo());
          $sql->bindValue(":imgThree", $report->getImgThree());
          $sql->bindValue(":imgFour", $report->getImgFour());
          $sql->bindValue(":title", $report->getTitle());
          $sql->bindValue(":desc", $report->getDesc());
          $sql->bindValue(":st", $report->getStatus());
          $sql->bindValue(":id", $report->getFkId());

          if ($sql->execute()) {

               $report->setMsg("insert sucess");
               return true;
          } else {

               $report->setMsg("insert error");
               return false;
          }
     }




     public function listReport(ControllerReport $report)
     {
          $query = "SELECT * FROM tb_reports WHERE page_rpt =1 AND id_fk_cts = :id ";
          $sql = $this->pdo->prepare($query);
          $sql->bindValue(":id", $report->getFkId());
          $sql->execute();

          if ($sql->rowCount() > 0) {

               $list_reports = array();

               while ($reports = $sql->fetchAll(PDO::FETCH_ASSOC)) {
                    $list_reports = $reports;
               }
               $report->setListReport($list_reports);
               return true;
          } else {
               $report->setMsg("not found");
               return false;
          }

     }




     public function selectNumber(ControllerReport $report)
     {
       $query = "SELECT MAX(tb_reports.number_rpt)as number_rpt from tb_reports inner join
       tb_constructions on (tb_constructions.id_cts = tb_reports.id_fk_cts) 
       where tb_reports.id_fk_cts = :id";

          $sql = $this->pdo->prepare($query);

          $sql->bindValue(":id", $report->getFkId());
          $sql->execute();

          if ($sql->rowCount() > 0) {

               $last_number = $sql->fetch();
               $next_number = $last_number['number_rpt'] + 1;
               $report->setMsg($next_number);
               return true;

          } else {
               $report->setMsg("not found");
               return false;
          }
     }



     public function selectStatus(ControllerReport $report)
     {
          $query = "SELECT tb_reports.status_rpt from tb_reports inner join
       tb_constructions on (tb_constructions.id_cts = tb_reports.id_fk_cts) 
       where tb_reports.id_fk_cts = :id";

          $sql = $this->pdo->prepare($query);

          $sql->bindValue(":id", $report->getFkId());
          $sql->execute();

          if ($sql->rowCount() > 0) {

               $status = $sql->fetch();

               $report->setMsg($status['status_rpt']);

               return true;

          } else {
               $report->setMsg("not found");

               return false;
          }
     }


     public function listReportById(ControllerReport $report)
     {
          $query = "SELECT * FROM tb_reports WHERE id_rpt = :id";

          $sql = $this->pdo->prepare($query);

          $sql->bindValue(":id", $report->getId());
          $sql->execute();


          if ($sql->rowCount() > 0) {

               $list_reports = array();

               while ($reports = $sql->fetchAll(PDO::FETCH_ASSOC)) {
                    $list_reports = $reports;
               }
               $report->setListReport($list_reports);
               return true;
          } else {
               $report->setMsg("not found");
               return false;
          }
     }



     public function listReportByNumber(ControllerReport $report)
     {
          $query = "SELECT * FROM tb_reports WHERE number_rpt = :number AND id_fk_cts = :id_fk";

          $sql = $this->pdo->prepare($query);

          $sql->bindValue(":number", $report->getNumber());
          $sql->bindValue(":id_fk", $report->getFkId());
          $sql->execute();


          if ($sql->rowCount() > 0) {

               $list_reports = array();

               while ($reports = $sql->fetchAll(PDO::FETCH_ASSOC)) {
                    $list_reports = $reports;
               }
               $report->setListReport($list_reports);
               return true;
          } else {
               $report->setMsg("not found");
               return false;
          }
     }



     public function updateReport(ControllerReport $report)
     {
          $query = "UPDATE tb_reports SET date_rpt=:dt, img_one_rpt=:imgOne, img_two_rpt=:imgTwo, 
                 img_three_rpt=:imgThree, img_four_rpt=:imgFour, title_rpt=:title, 
                 description_rpt=:descr, status_rpt=:st WHERE id_rpt=:id ";

          $sql = $this->pdo->prepare($query);

          $sql->bindValue(":dt", $report->getDate());
          $sql->bindValue(":imgOne", $report->getImgOne());
          $sql->bindValue(":imgTwo", $report->getImgTwo());
          $sql->bindValue(":imgThree", $report->getImgThree());
          $sql->bindValue(":imgFour", $report->getImgFour());
          $sql->bindValue(":title", $report->getTitle());
          $sql->bindValue(":descr", $report->getDesc());
          $sql->bindValue(":st", $report->getStatus());
          $sql->bindValue(":id", $report->getId());

          $sql->execute();

          if ($sql->execute()) {
               $report->setMsg($report->getTitle());
          } else {
               $err = $sql->errorInfo();
               $report->setMsg("update error");
               //  $report->setMsg("update error" . $err[2]);
          }
     }




     public function deleteReport(ControllerReport $report)
     {

          $query = "DELETE FROM tb_reports WHERE number_rpt = :number ";

          $sql = $this->pdo->prepare($query);

          $sql->bindValue(":number", $report->getNumber());
          $sql->execute();

          if ($sql->rowCount() > 0) {
               $report->setMsg("delete sucess");
          } else {
               $report->setMsg("delete error");
          }
     }

}





