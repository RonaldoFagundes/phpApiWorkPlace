<?php

include_once 'controller/companys.php';
include_once 'model/company.php';

class serviceCompany
{  
    function __construct(){}

    public function sendDataCompany( $name, $address, $postal, $state, $contry, $phone, $web, $logo, $icon, $img)
    {
        $c_cpny = new ControllerCompany();
        $m_cpny = new DataCompany();
        $c_cpny->setName($name);
        $c_cpny->setAddress($address);
        $c_cpny->setPostalcod($postal);
        $c_cpny->setState($state);
        $c_cpny->setCountry($contry);
        $c_cpny->setPhone($phone);
        $c_cpny->setWebsite($web);
        $c_cpny->setLogo($logo);
        $c_cpny->setIcon($icon);
        $c_cpny->setImg($img);
        
        if ($m_cpny->insertCompany($c_cpny)) {
            http_response_code(200);
            $result = json_encode($c_cpny->getMsg());
        } else {
            http_response_code(200);
            $result = json_encode($c_cpny->getMsg());
        }
        return $result;
    }

    public function getDataCompany()
    {
        $c_cpny = new ControllerCompany();
        $m_cpny = new DataCompany();
        $m_cpny->listCompany($c_cpny);
        if ($list_company = $c_cpny->getListCompany()) {
            http_response_code(200);
            $result = json_encode($list_company);
        } else {
            http_response_code(200);
            $result = json_encode($c_cpny->getMsg());
        }
        return $result;
    }

   

}