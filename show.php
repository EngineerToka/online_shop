<?php include 'inc/header.php';
include './microFrameWork/App.php';
 ?>


<?php if($request->Check($_GET,'id')){
    $id=$request->getData('id');
   $product= $DB->selectByCond('*','Product',"id = $id");
   foreach($product as $one){
   
    ?>
<div class="container my-5">

<div class="row">
<?php
  


  
  require_once './inc/sucess.php';
  
  ?>  


<div class="col-lg-6">
        <img src="images/<?php echo $one['image']?>" class="card-img-top">
        </div>
        <div class="col-lg-6">
        <h5 ><?php echo $one['title'] ?></h5>
        <p class="text-muted"><?php echo $one['price'] ?></p>
        <p><?php echo $one['desc'] ?></p>
        <a href="index.php" class="btn btn-primary">Back</a>
        <a href="edit.php?id=<?php echo $one['id'] ?>" class="btn btn-info">Edit</a>
        <a href="" class="btn btn-danger">Delete</a>
    </div>
    
</div>
</div>


  <?php }}else{
    echo 'product did not found';
   }?>





<?php include 'inc/footer.php'; ?>