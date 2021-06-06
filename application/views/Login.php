<?php include 'partials/header.php' ?>


<style>
  .form{
      background-color: rgb(248, 242, 242);
      box-shadow:  0 0 5px grey;
      border-radius: 5px;
  
  }
  .form:hover{
      box-shadow:  0 0 25px rgb(100, 98, 98);
      z-index: 100;
  }
</style>


<div class="container mt-5 align-items-center">

  <?php echo validation_errors();  ?>
  <?php echo form_open('LoginController/loginUser'); ?>
  
    <div  class="form p-5">
        <h2  class="text-center  mt-2 mb-2">Login</h2>

        <?php if($this->session->flashdata('msg'))  {

          echo "<h4>" .$this->session->flashdata('msg'). "</h4>";
        } 
        ?>

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            
          </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>

      
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  
</div>
<?php include 'partials/footer.php' ?>