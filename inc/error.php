<?php

require_once __DIR__ . '/../microFrameWork/App.php'; 
if(!empty($session->getsession('errors'))){
    foreach($session->getsession('errors') as $error)
    ?>
<div class="alert alert-danger" role="alert">
  <?php echo $error?>
</div>


<?php 
$session->deleteSession('errors')
?>

<?php } ?>