<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once '../microFrameWork/App.php';

require_once '../microFrameWork/validation.php';

use sessions\microFrameWork\validation;

$validator= new validation($session,$request);


// check come through submit

if($request->check($_POST,'submit')){
   
    // catch Data

$title = $request->filter($request->postData('name'));
$desc= $request->filter($request->postData('desc'));
$price= $request->filter($request->postData('price'));



// Start validation

// Name Validation
$validator->testTitle($title);


// price validation
   $validator->testPrice($price);


// Desc Validation
$validator->testDesc($desc);


// Image Validation

// chmod -R 777 uFiles

$validator->testImg(null);


// Start update
if(empty($session->getSession('errors'))){
    
    $data=[
        'title' => $title,
        'desc'=>$desc,
        'price'=>$price,
        'image'=> $validator->newImgName,
    ];
   

   

    // insert data into DB
    $DB->insert('Product',$data);
    

    $request->redirect("location:../index.php");

    $session->setSession('sucess',' Post has been added sucessfully');

}
else{
    $request->redirect("location:../add.php");
   
  
}
    
}else{
    $request->redirect('location:../index.php');
    echo 'hi';
  
}





?>

