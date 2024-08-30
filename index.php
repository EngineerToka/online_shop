<?php 
require_once  './inc/header.php';
require_once './microFrameWork/App.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);


?>

<div class="container my-5">

    <div class="row">
      <?php
  

      require_once './inc/error.php';
      
      require_once './inc/sucess.php';
      
      ?>  

<?php 

foreach($DB->selectAll('*','Product') as $product){?>

    <div class="col-lg-4 mb-3">



            <div class="card">
            <img src="images/<?php echo $product['image']?>" class="card-img-top">
            <div class="card-body">
            <h5 class="card-title"><?php echo $product['title']?></h5>
            <p class="text-muted"><?php echo $product['price']?></p>
            <p class="card-text"><?php echo $product['desc']?></p>
            <a href="show.php?id=<?php echo $product['id']?>" class="btn btn-primary">Show</a>

            <a href="edit.php?id=<?php echo $product['id']?>" class="btn btn-info">Edit</a>
            <a href="./handlers/handelDelete.php?id=<?php echo $product['id']?>" class="btn btn-danger" >Delete</a>

            </div>
        </div>
        
    </div>
   
<?php } ?>

 
        
    </div>

</div>



<?php include 'inc/footer.php'; ?>