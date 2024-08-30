
<?php

require_once __DIR__ . '/../microFrameWork/App.php'; 

if(!empty($session->getsession('sucess'))){
    ?>
<div class="alert alert-success" role="alert">
<?php echo $session->getsession('sucess')?>
</div>

<?php
$session->deleteSession('sucess')
?>


<?php } ?>





