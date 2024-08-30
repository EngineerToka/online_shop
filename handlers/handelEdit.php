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

$id = $request->getData('id');


// Fetch old image

$allDat=$DB->selectByCond('image','Product',"id=$id");
foreach($allDat as $image){
    $oldImgNameArr = $image;
}
$oldImgName=$oldImgNameArr['image'];



// Start validation

// Name Validation
$validator->testTitle($title);


// price validation
   $validator->testPrice($price);


// Desc Validation
$validator->testDesc($desc);


// Image Validation

// chmod -R 777 uFiles

$validator->testImg($oldImgName);


// Start update
if(empty($session->getSession('errors'))){
    
    $data=[
        'title' => $title,
        'desc'=>$desc,
        'price'=>$price,
        'image'=> $validator->newImgName,
    ];
   

    $cond="id =$id";

    // update data into DB
    $DB->update('Product',$data,$cond);
    

    $request->redirect("location:../show.php?id=$id");

    $session->setSession('sucess',' Post has been updated sucessfully');

}
else{
    $request->redirect("location:../edit.php?id=$id");
   
  
}
    
}else{
    $request->redirect('location:../index.php');
    echo 'hi';
  
}





?>

