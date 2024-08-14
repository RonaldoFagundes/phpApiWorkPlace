<?php

class ControllerTags{

private $id ;
	
private $status ;

private $desc ;

private $img ;

private $listTags = [];

private $msg;

public function __construct()
  {} 

	public function getId()
	{
			return $this->id;
	}
	public function setId($id): self
	{
			$this->id = $id;
			return $this;
	}
	
	function getStatus() { 
 		return $this->status; 
	} 
	function setStatus($status) {  
		$this->status = $status; 
	} 

	function getDesc() { 
 		return $this->desc; 
	} 
	function setDesc($desc) {  
		$this->desc = $desc; 
	} 

	function getImg() { 
 		return $this->img; 
	} 
	function setImg($img) {  
		$this->img = $img; 
	} 

	function getListTags() { 
		return $this->listTags; 
   } 
   function setListTags($listTags) {  
	   $this->listTags = $listTags; 
   } 

	function getMsg() { 
 		return $this->msg; 
	} 
	function setMsg($msg) {  
		$this->msg = $msg; 
	} 
}