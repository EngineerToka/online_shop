<?php 
include_once '../microFrameWork/App.php';



if($request->check($_GET,'id') ){


$id= $request->getData('id');
   $cond= "id =$id";

   $DB->delete('Product',$cond);

    $request->redirect("location:../index.php");

    $session->setSession('sucess','Post has been deleted sucussfully');


}else{
    echo "Post hasn't been found";
}







?>