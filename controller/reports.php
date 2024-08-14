<?php


class ControllerReport
{

    private $id;
    private $fk_id;
    private $number;
    private $page;
    private $date;
    private $title;
    private $desc;
    private $status;
    private $img_one;
    private $img_two;
    private $img_three;
    private $img_four;
    private $msg;
    private $listReport = [];


    public function __construct()
    {
    }




    /**
     * Get the value of id
     */
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

    /**
     * Get the value of fk_id
     */
    public function getFkId()
    {
        return $this->fk_id;
    }
    /**
     * Set the value of fk_id
     */
    public function setFkId($fk_id): self
    {
        $this->fk_id = $fk_id;
        return $this;
    }
    /**
     * Get the value of number
     */
    public function getNumber()
    {
        return $this->number;
    }
    /**
     * Set the value of number
     */
    public function setNumber($number): self
    {
        $this->number = $number;
        return $this;
    }

    /**
     * Get the value of page
     */
    public function getPage()
    {
        return $this->page;
    }
    /**
     * Set the value of page
     */
    public function setPage($page): self
    {
        $this->page = $page;
        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * Set the value of date
     */
    public function setDate($date): self
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * Set the value of title
     */
    public function setTitle($title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get the value of desc
     */
    public function getDesc()
    {
        return $this->desc;
    }
    /**
     * Set the value of desc
     */
    public function setDesc($desc): self
    {
        $this->desc = $desc;
        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * Set the value of status
     */
    public function setStatus($status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get the value of img_one
     */
    public function getImgOne()
    {
        return $this->img_one;
    }
    /**
     * Set the value of img_one
     */
    public function setImgOne($img_one): self
    {
        $this->img_one = $img_one;
        return $this;
    }

    /**
     * Get the value of img_two
     */
    public function getImgTwo()
    {
        return $this->img_two;
    }
    /**
     * Set the value of img_two
     */
    public function setImgTwo($img_two): self
    {
        $this->img_two = $img_two;
        return $this;
    }

    /**
     * Get the value of img_three
     */
    public function getImgThree()
    {
        return $this->img_three;
    }
    /**
     * Set the value of img_three
     */
    public function setImgThree($img_three): self
    {
        $this->img_three = $img_three;
        return $this;
    }

    /**
     * Get the value of img_four
     */
    public function getImgFour()
    {
        return $this->img_four;
    }
    /**
     * Set the value of img_four
     */
    public function setImgFour($img_four): self
    {
        $this->img_four = $img_four;
        return $this;
    }

    /**
     * Get the value of msg
     */
    public function getMsg()
    {
        return $this->msg;
    }
    /**
     * Set the value of msg
     */
    public function setMsg($msg): self
    {
        $this->msg = $msg;
        return $this;
    }

    /**
     * Get the value of listReport
     */
    public function getListReport()
    {
        return $this->listReport;
    }
    /**
     * Set the value of listReport
     */
    public function setListReport($listReport): self
    {
        $this->listReport = $listReport;
        return $this;
    }


}
