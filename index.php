<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Accept, Authorization, X-Requested-With, X-Auth-Token, Origin, Application");
header("Content-Type: application/json; charset=utf-8");

include_once 'services/construction.php';
include_once 'services/report.php';
include_once 'services/company.php';
include_once 'services/standard.php';
include_once 'services/tag.php';

$s_constr = new serviceConstruction();
$s_report = new serviceReport();
$s_company = new serviceCompany();
$s_std = new serviceStandard();
$s_tag = new serviceTag();

$response_json = file_get_contents("php://input");
$dados = json_decode($response_json, true);

if ($_GET['action'] === 'cad_contruction') {

  $img = $dados['construction']['base64'];
  $name = $dados['construction']['name'];
  $enterprise = $dados['construction']['enterprise'];
  $address = $dados['construction']['address'];
  echo $s_constr->sendDataInsert($img, $name, $enterprise, $address);

} else if ($_GET['action'] === 'list_construction') {
  echo $s_constr->getDataList();

} else if ($_GET['action'] === 'delete_construction') {
  $id = $dados['idConstruction'];
  echo $s_constr->getResultDelete($id);

} else if ($_GET['action'] === 'cad_report') {
  $number = $dados['dataRel']['number_rpt'];
  $page = $dados['dataRel']['page'];
  $date = $dados['dataRel']['date'];
  $title = $dados['dataRel']['title'];
  $desc = $dados['dataRel']['desc'];
  $status = $dados['dataRel']['status'];
  $img_one = $dados['dataRel']['base64_one'];
  $img_two = $dados['dataRel']['base64_two'];
  $img_three = $dados['dataRel']['base64_three'];
  $img_four = $dados['dataRel']['base64_four'];
  $id = $dados['dataRel']['idConst'];
  echo $s_report->sendDataInsert($number, $page, $date, $title, $desc, $status, $img_one, $img_two, $img_three, $img_four, $id);

} else if ($_GET['action'] === 'list_report') {
  $id = $dados['idConstruction'];
  echo $s_report->getListReport($id);

} else if ($_GET['action'] === 'report_number') {
  $id = $dados['idConstruction'];
  echo $s_report->getReportNumber($id);

} else if ($_GET['action'] === 'report_status') {
  $id = $dados['idConst'];
  echo $s_report->getReportStatus($id);

} else if ($_GET['action'] === 'list_report_by_id') {
  $id = $dados['idReport'];
  echo $s_report->getReportById($id);

} else if ($_GET['action'] === 'list_report_by_number') {
  $number = $dados['reportNumber'];
  $id_fk = $dados['idConstruction'];
  echo $s_report->getReportByNumber($number, $id_fk);

} else if ($_GET['action'] === 'update_report') {
  $date = $dados['dataRel']['date'];
  $title = $dados['dataRel']['title'];
  $desc = $dados['dataRel']['desc'];
  $status = $dados['dataRel']['status'];
  $img_one = $dados['dataRel']['img_one'];
  $img_two = $dados['dataRel']['img_two'];
  $img_three = $dados['dataRel']['img_three'];
  $img_four = $dados['dataRel']['img_four'];
  $id = $dados['dataRel']['id'];
  echo $s_report->sendDataUpdate($date, $title, $desc, $status, $img_one, $img_two, $img_three, $img_four, $id);

} else if ($_GET['action'] === 'delete_report') {
  $number = $dados['reportNumber'];
  echo $s_report->getResultDelete($number);

} else if ($_GET['action'] === 'list_standards') {
  echo $s_std->getDataStandard();

} else if ($_GET['action'] === 'list_company') {
  echo $s_company->getDataCompany();

} else if ($_GET['action'] === 'list_tags') {
  echo $s_tag->getDataTag();

} else {
  echo json_encode("invalid action");
}







