<?php

include_once 'controller/tags.php';
include_once 'model/tag.php';

 class serviceTag
{  
   function __construct(){}

  public function sendDataTag($status, $desc, $img)
  {
      $c_tags = new ControllerTags();
      $m_tags = new DataTag();
    
      $c_tags->setStatus($status);
      $c_tags->setDesc($desc);
      $c_tags->setImg($img);          

      if ($m_tags->insertTags($c_tags)) {
          http_response_code(200);
          $result = json_encode($c_tags->getMsg());
      } else {
          http_response_code(200);
          $result = json_encode($c_tags->getMsg());
      }
      return $result;
  }

  

    public function getDataTag()
    {
        $c_tags = new ControllerTags();
        $m_tags = new DataTag();
        $m_tags->listTags($c_tags);
  
        if ($list_tags = $c_tags->getListTags()) {
          http_response_code(200);
          $result = json_encode($list_tags);
        } else {
          http_response_code(200);
          $result = json_encode($c_tags->getMsg());
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