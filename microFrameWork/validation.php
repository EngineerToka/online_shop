<?php

namespace sessions\microFrameWork;
require_once '../microFrameWork/App.php';



class validation {
    protected $session;
    protected $request;
    public $newImgName;

public function __construct($session,$request)
{
    $this->session=$session;
    $this->request=$request;
    
}


// Name Validation
public function testTitle($title){
if(empty($title)){
    $this->session->setSession('errors',['Title is required']);
   
   }elseif(strlen($title)>20){
       $this->session->setSession('errors',[' Name should be max 20 characters']);
     
   };
}


      // price validation
      public function testPrice($price){
      if(empty($price)){
       $this->session->setSession('errors',[' Price is required']);
       
    } elseif(!is_numeric($price)){
       $this->session->setSession('errors',[' price should be only numbers']);
   
   
   }elseif($price<0){
       $this->session->setSession('errors',[' price should be more than 0$']);
   
   }
}


public function testDesc($desc){
   // Desc Validation
   if(empty($desc)){
       $this->session->setSession('errors',[' Description is required']);
       
    }elseif(strlen($desc)>300){
       $this->session->setSession('errors',[' Description be max 300 characters']);
   
   
   }}

   
   // Image Validation
   
   public function testImg($oldImgName){
  
   
   if($this->request->check($_FILES,'img')&& $_FILES['img']['error'] == UPLOAD_ERR_OK){
      $uPhoto= $_FILES['img'];
      $imgName=$uPhoto['name'];
      $ext=pathinfo($imgName,PATHINFO_EXTENSION);
      $this->newImgName=uniqid().".".$ext;
      $imgError=$uPhoto['error'];
      $imgsize=$uPhoto['size']/(1024*1024);
   
      var_dump($uPhoto) ;
   if($imgsize>5){
       $this->session->setSession('errors',[' uPhoto should be max 5 MB']);
   
   }elseif(!in_array($ext,['jpg','png'])){
       $this->session->setSession('errors',[' Extension should be only jpg or png ']);
    
   
   }else{
       move_uploaded_file($uPhoto['tmp_name'], "../images/$this->newImgName");
   
   if ($oldImgName &&file_exists("../images/$oldImgName")) {
       unlink("../images/$oldImgName");
       
   }
}
   
   
   }else{
    $this->newImgName=$oldImgName;
      
   }}
   



}


?>