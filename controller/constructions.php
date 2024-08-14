<?php


class ControllerConstrunction
{

    private $id;
    private $img;
    private $name;
    private $address;
    private $enterprise;
    private $msg;
    private $listConstructions = [];


    public function __construct()
    {

    }

    public function getId()
    {
        return $this->id;
    }
    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }


    public function getImg()
    {
        return $this->img;
    }
    public function setImg($img)
    {
        $this->img = $img;
        return $this;
    }


    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }


    public function getEnterprise()
    {
        return $this->enterprise;
    }
    public function setEnterprise($enterprise)
    {
        $this->enterprise = $enterprise;
    }


    public function getAddress()
    {
        return $this->address;
    }
    public function setAddress($address)
    {
        $this->address = $address;
    }


    public function getMsg()
    {
        return $this->msg;
    }
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }



    public function getListConstructions()
    {
        return $this->listConstructions;
    }
    public function setListConstructions($listConstructions)
    {
        $this->listConstructions = $listConstructions;
    }

}