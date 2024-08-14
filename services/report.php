<?php

include_once 'controller/reports.php';
include_once 'model/report.php';

class serviceReport
{
    function __construct(){}

    public function sendDataInsert($number, $page, $date, $title, $desc, $status, $img_one, $img_two, $img_three, $img_four, $id)
    {
        $c_report = new ControllerReport;
        $m_report = new DataReport;
        
        $c_report->setNumber($number);
        $c_report->setPage($page);
        $c_report->setDate($date);
        $c_report->setTitle($title);
        $c_report->setDesc($desc);
        $c_report->setStatus($status);
        $c_report->setImgOne($img_one);
        $c_report->setImgTwo($img_two);
        $c_report->setImgThree($img_three);
        $c_report->setImgFour($img_four);
        $c_report->setFkId($id);

        if ($m_report->insertReport($c_report)) {
            http_response_code(200);
            $result = json_encode($c_report->getMsg());
        } else {
            http_response_code(200);
            $result = json_encode($c_report->getMsg());
        }
        return $result;
    }

    public function getListReport($id_cons)
    {
        $c_report = new ControllerReport;
        $m_report = new DataReport;
        $c_report->setFkId($id_cons);
        $m_report->listReport($c_report);
        if ($list_report = $c_report->getListReport()) {
            http_response_code(200);
            $result = json_encode($list_report);
        } else {
            http_response_code(200);
            $result = json_encode($c_report->getMsg());
        }
        return $result;
    }

    public function getReportNumber($id_cons)
    {
        $c_report = new ControllerReport;
        $m_report = new DataReport;
        $c_report->setFkId($id_cons);
        if ($m_report->selectNumber($c_report)) {
            http_response_code(200);
            $result = json_encode($c_report->getMsg());
        } else {
            http_response_code(200);
            $result = json_encode($c_report->getMsg());
        }
        return $result;
    }

    public function getReportStatus($id_cons)
    {
        $c_report = new ControllerReport;
        $m_report = new DataReport;
        $c_report->setFkId($id_cons);
        if ($m_report->selectStatus($c_report)) {
            http_response_code(200);
            $result = json_encode($c_report->getMsg());
        } else {
            http_response_code(200);
            $result = json_encode($c_report->getMsg());
        }
        return $result;
    }

    public function getReportById($id_cons)
    {
        $c_report = new ControllerReport;
        $m_report = new DataReport;
        $c_report->setId($id_cons);
        $m_report->listReportById($c_report);
        if ($list_report = $c_report->getListReport()) {
            http_response_code(200);
            $result = json_encode($list_report);
        } else {
            http_response_code(200);
            $result = json_encode($c_report->getMsg());
        }
        return $result;
    }

    public function getReportByNumber($number , $id_fk)
    {
        $c_report = new ControllerReport;
        $m_report = new DataReport;
        $c_report->setNumber($number);
        $c_report->setFkId($id_fk);
        $m_report->listReportByNumber($c_report);
        if ($list_report = $c_report->getListReport()) {
            http_response_code(200);
            $result = json_encode($list_report);
        } else {
            http_response_code(200);
            $result = json_encode($c_report->getMsg());
        }
        return $result;
    }

    public function sendDataUpdate($date, $title, $desc, $status, $img_one, $img_two, $img_three, $img_four, $id)
    {
        $c_report = new ControllerReport;
        $m_report = new DataReport;
        $c_report->setDate($date);
        $c_report->setTitle($title);
        $c_report->setDesc($desc);
        $c_report->setStatus($status);
        $c_report->setImgOne($img_one);
        $c_report->setImgTwo($img_two);
        $c_report->setImgThree($img_three);
        $c_report->setImgFour($img_four);
        $c_report->setId($id);
        if ($m_report->updateReport($c_report)) {
            http_response_code(200);
            $result = json_encode($c_report->getMsg());
        } else {
            http_response_code(200);
            $result = json_encode($c_report->getMsg());
        }
        return $result;
    }

    public function getResultDelete($number)
    {
        $c_report = new ControllerReport;
        $m_report = new DataReport;
        $c_report->setNumber($number);
        if ($m_report->deleteReport($c_report)) {
            http_response_code(200);
            $result = json_encode($c_report->getMsg());
        } else {
            http_response_code(200);
            $result = json_encode($c_report->getMsg());
        }
        return $result;
    }

}