<?php

include_once 'controller/tags.php';
include_once 'model/tag.php';

 class serviceTag
{  

  private $c_tags ;
  private $m_tags;

   function __construct(){
    $this->c_tags = new ControllerTags();
    $this->m_tags = new DataTag();
   }




  public function sendDataTag($data)
  {
     // $c_tags = new ControllerTags();
     // $m_tags = new DataTag();
       
      $this->c_tags->setStatus($data['tags']['status']);
      $this->c_tags->setDesc($data['tags']['desc']);
      $this->c_tags->setImg($data['tags']['base_64_img']);          

      $this->m_tags->insertTags($this->c_tags);
      //http_response_code(200);
      return json_encode($this->c_tags->getMsg());     
  }

  



    public function getDataTag()
    {   

       if($this->m_tags->listTags($this->c_tags)){
            
          $list_tags = $this->c_tags->getListTags();           
          http_response_code(200);
          $result = json_encode($list_tags);

       }else{

          http_response_code(200);
          $result = json_encode($this->c_tags->getMsg());

       }

        return $result;
    }






    public function getDataImgTag($value)
    {
        $c_tags = new ControllerTags();
        $m_tags = new DataTag();       

        $c_tags->setStatus($value);
        $m_tags->selectTagImg($c_tags);

        if ($list_tags = $c_tags->getListTags()) {
          http_response_code(200);
          $result = json_encode($list_tags);
        } else {
          http_response_code(200);
          $result = json_encode($c_tags->getMsg());
        }
        return $result;
    }




    
    public function getDataIdTag($value)
    {
        $c_tags = new ControllerTags();
        $m_tags = new DataTag();      
        $c_tags->setId($value);       

        if ($m_tags->deleteTag($c_tags)) {
          http_response_code(200);
            $result = json_encode($c_tags->getMsg());
        } else {
          http_response_code(200);
          $result = json_encode($c_tags->getMsg());
        }
        return $result;
    }



   
}