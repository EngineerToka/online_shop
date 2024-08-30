<?php

namespace sessions\microFrameWork;

class Session{

public function __construct(){
    session_start();
}

public function setSession($key,$value){
    $_SESSION[$key]=$value;
}


public function getSession($key){
   return isset($_SESSION[$key])? $_SESSION[$key]:null;
}

public function deleteSession($key){
   unset($_SESSION[$key]);
}

public function destroySession(){
  return session_destroy();
}

}

?>