

<?php
if(!($this->session->userdata('loggedin'))){

    redirect('Welcome/login');
}

?>

<?php include 'includes/header.php' ?>
<div class="container">



<?php if($this->session->flashdata('msg'))  {

echo "<h4>" .$this->session->flashdata('msg'). "</h4>";
} 
?>


</div>
<?php include 'includes/footer.php' ?>

