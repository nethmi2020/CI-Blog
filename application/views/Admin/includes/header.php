
<?php
if(!($this->session->userdata('loggedin'))){

    redirect('Welcome/login');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blog</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo base_url('/index.php/AdminController/index')?>">Admin Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('/index.php/AdminController/addpost')?>">Add Post </a>
      </li>
     
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('/index.php/PostController/viewpost')?>">View Post </a>
      </li>
     
    </ul>
   
<ul class="navbar-nav navbar-right">
	
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $this->session->userdata('name') ; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url('/index.php/LoginController/image_upload')?>">Profile</a>
          <a class="dropdown-item" href="<?php echo base_url('/index.php/LoginController/logoutuser')?>">Logout</a>
       
      </li>
	  
	  </ul>
  </div>
</nav>