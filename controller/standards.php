<?php


class ControllerStandards
{


    private $name;
    private $desc;
    private $msg;
    private $listStandards = [];


    public function __construct()
    {

    }

    function getName()
    {
        return $this->name;
    }
    function setName($name)
    {
        $this->name = $name;
    }

    function getDesc()
    {
        return $this->desc;
    }
    function setDesc($desc)
    {
        $this->desc = $desc;
    }

    function getListStandards() { 
        return $this->listStandards; 
   } 

   function setListStandards($listStandards) {  
       $this->listStandards = $listStandards; 
   } 


    function getMsg()
    {
        return $this->msg;
    }
    function setMsg($msg)
    {
        $this->msg = $msg;
    }


}