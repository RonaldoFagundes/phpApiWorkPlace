<?php

include_once 'controller/companys.php';
include_once 'model/company.php';

class serviceCompany
{ 
    
    
   
    private $c_cpny = "";
    private $m_cpny = ""; 



    function __construct()
    {
        $this->c_cpny = new ControllerCompany();
        $this->m_cpny = new DataCompany();
    }



    //$this->c_credit_card->setId($data['cadCreditCard']['id']);  

    public function sendDataCompany($data)
    {
        $this->c_cpny->setName($data['company']['name']);
        $this->c_cpny->setAddress($data['company']['address']);
        $this->c_cpny->setPostalcod($data['company']['postal']);
        $this->c_cpny->setState($data['company']['state']);
        $this->c_cpny->setCountry($data['company']['contry']);
        $this->c_cpny->setPhone($data['company']['phone']);
        $this->c_cpny->setWebsite($data['company']['web']);
        $this->c_cpny->setLogo($data['company']['base_64_logo']);
        $this->c_cpny->setIcon($data['company']['base_64_icon']);          

        $this->m_cpny->insertCompany($this->c_cpny);
        return $this->c_cpny->getMsg();  


        /*
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
        */
    }









    public function sendDataCompany2( $name, $address, $postal, $state, $contry, $phone, $web, $logo, $icon, $img)
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
        
        if( $this->m_cpny->listCompany($this->c_cpny) ){
              
             http_response_code(200);
             $result =  json_encode($this->c_cpny->getListCompany());

        }else{

            http_response_code(200);
            $result = json_encode($this->c_cpny->getMsg());
        }
               
        return $result;
    }






    public function getDataCompany2()
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