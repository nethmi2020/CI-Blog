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

    <!-- <?php echo validation_errors();  ?> -->
  <?php echo form_open('RegisterController/registerUser'); ?>


     <div class=" form p-5">
        <h2 class="text-center  mt-2 mb-2">Register</h2>


             

                  
               


        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="name" class="form-control" id="exampleInputName" value="<?php echo set_value('name') ?>"  name="name">
          <?php echo form_error('name','<div class="alert alert-danger">',' </div>' ) ?>
        
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo set_value('email') ?>"  name="email" aria-describedby="emailHelp">
            <?php echo form_error('email','<div class="alert alert-danger">',' </div>' ) ?>
          </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" name="password" value="<?php echo set_value('password') ?>"  id="exampleInputPassword1">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Password Again</label>
            <input type="password" class="form-control" name="againpassword" id="exampleInputPassword1">
          </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <?php echo form_close(''); ?>
</div>
<?php include 'partials/footer.php' ?>