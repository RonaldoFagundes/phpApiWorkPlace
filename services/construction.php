<?php

include_once 'controller/constructions.php';
include_once 'model/construction.php';

class serviceConstruction
{

    function __construct(){}

    public function sendDataInsert($img, $name, $enterprise, $address)
    {
        $c_constr = new ControllerConstrunction;
        $m_constr = new DataConstruction;
        $c_constr->setImg($img);
        $c_constr->setName($name);
        $c_constr->setEnterprise($enterprise);
        $c_constr->setAddress($address);

        if ($m_constr->insertConstruction($c_constr)) {
            http_response_code(200);
            $result = json_encode($c_constr->getMsg());
        } else {
            http_response_code(200);
            $result = json_encode($c_constr->getMsg());
        }
        return $result;
    }

    public function getDataList()
    {         
        $c_constr = new ControllerConstrunction();
        $m_constr = new DataConstruction;
        
        $m_constr->listConstructions($c_constr);

        if ($list_construct = $c_constr->getListConstructions()) {
            http_response_code(200);
            $result = json_encode($list_construct);
        } else {
            http_response_code(200);
            $result = json_encode($c_constr->getMsg());
        }
        return $result;
    }

    public function getResultDelete($id)
    {
        $c_constr = new ControllerConstrunction();
        $m_constr = new DataConstruction;

        $c_constr->setId($id);


        if ($m_constr->deleteConstructions($c_constr)) {
            http_response_code(200);
            $result = json_encode($c_constr->getMsg());
        } else {
            http_response_code(200);
            $result = json_encode($c_constr->getMsg());
        }
        return $result;
    }




}