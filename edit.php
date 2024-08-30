<?php 
require_once 'inc/header.php';

require_once './microFrameWork/App.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);


?>

<?php if($request->Check($_GET,'id')){
    $id=$request->getData('id');
   $product= $DB->selectByCond('*','Product',"id = $id");
   foreach($product as $one){
   
    ?>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
        <?php
  

  require_once './inc/error.php';
  
  ?>  


            <form action="./handlers/handelEdit.php?id=<?php echo $one['id']?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name = "name" value= <?php echo $one['title']?>>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" value=<?php echo $one['price'] ?>>
                </div>

                <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "desc"><?php echo $one['desc'] ?></textarea>
                </div>

                <div class="mb-3">
                <label for="formFile" class="form-label">Image:</label>
                <input class="form-control" type="file" id="formFile" name="img">
                </div>

                <div class="col-lg-3">
                        <img src="./images/<?php echo $one['image']?>" class="card-img-top">
                        </div>
                        
                <center><button on type="submit" class="btn btn-primary" name="submit">Add</button></center>
            </form>
        </div>
    </div>
</div>

<?php }}?>

<?php include 'inc/footer.php'; ?>