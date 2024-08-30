<?php

namespace sessions\microFrameWork;

error_reporting(E_ALL);
ini_set('display_errors', 1);


class Request{

   
     
    public function getData($key){
     return isset($_GET[$key])? $_GET[$key]:null;
   
    }

    public function postData($key){
     return isset($_POST[$key])? $_POST[$key] :null;

    }

    public function Check($method,$key){
     return isset($method[$key]);

    }

    public function filter($data){
        if($data!=null){
      return htmlspecialchars(trim($data));       
        }
    
    }

    public function methodCheck(){
     return $_SERVER['REQUEST_METHOD'];
    }
    
    public function redirect($path){
     return header($path);
    }

   
    }


    ?>
