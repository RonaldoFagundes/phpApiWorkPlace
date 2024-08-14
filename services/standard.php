<?php

 include_once 'controller/standards.php';
 include_once 'model/standard.php';

 class serviceStandard
{ 
    function __construct()
    {
    }

  public function sendDataStandard($name, $desc)
  {
    $c_std = new ControllerStandards();
    $m_std = new DataStandard();

      $c_std->setName($name);
      $c_std->setDesc($desc);      

      if ($m_std->insertStandard($c_std)) {
          http_response_code(200);
          $result = json_encode($c_std->getMsg());
      } else {
          http_response_code(200);
          $result = json_encode($c_std->getMsg());
      }
      return $result;
  }

  
    public function getDataStandard()
    {
        $c_std = new ControllerStandards();
        $m_std = new DataStandard();
        $m_std->listStandard($c_std);  
        if ($list_standards = $c_std->getListStandards()) {
          http_response_code(200);
          $result = json_encode($list_standards);
        } else {
          http_response_code(200);
          $result = json_encode($c_std->getMsg());
        }
        return $result;
    }



}