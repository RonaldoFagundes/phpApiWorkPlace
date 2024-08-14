<?php


class ControllerCompany
{
    private $name;

    private $address;

    private $postal_cod;

    private $state;

    private $country;

    private $phone;

    private $web_site;

    private $logo;

    private $icon;

    private $img;

    private $listCompany = [];

    private $msg;


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

    function getAddress()
    {
        return $this->address;
    }
    function setAddress($address)
    {
        $this->address = $address;
    }

    function getPostalcod()
    {
        return $this->postal_cod;
    }
    function setPostalcod($postalcod)
    {
        $this->postal_cod = $postalcod;
    }

    function getState()
    {
        return $this->state;
    }
    function setState($state)
    {
        $this->state = $state;
    }

    function getCountry()
    {
        return $this->country;
    }
    function setCountry($country)
    {
        $this->country = $country;
    }

    function getPhone()
    {
        return $this->phone;
    }
    function setPhone($phone)
    {
        $this->phone = $phone;
    }

    function getWebsite()
    {
        return $this->web_site;
    }
    function setWebsite($website)
    {
        $this->web_site = $website;
    }

    function getLogo()
    {
        return $this->logo;
    }
    function setLogo($logo)
    {
        $this->logo = $logo;
    }


    function getIcon()
    {
        return $this->icon;
    }
    function setIcon($icon)
    {
        $this->icon = $icon;
    }

    function getImg()
    {
        return $this->img;
    }
    function setImg($img)
    {
        $this->img = $img;
    }

    function getListCompany()
    {
        return $this->listCompany;
    }
    function setListCompany($listCompany)
    {
        $this->listCompany = $listCompany;
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