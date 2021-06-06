<?php
if(!($this->session->userdata('loggedin'))){

    redirect('Welcome/login');
}

?>

<?php include 'includes/header.php' ?>




<div class="container">
	<div class="row mt-5 align-items-center">
	    
	    <div class="col-md-8 col-md-offset-2">
	        
    		
			<?php echo validation_errors();  ?>
  <?php echo form_open('PostController/savepost'); ?>

  
		<?php if($this->session->flashdata('msg'))  {

		echo "<h4>" .$this->session->flashdata('msg'). "</h4>";
		} 
		?>
						
 			 <h1>Create post</h1>
    		
    		    
    		    <div class="form-group">
    		        <label for="title">Title </label>
    		        <input type="text" class="form-control" name="title" />
    		    </div>
    		    
    		    <div class="form-group">
    		        <label for="description">Description</label>
    		        <textarea rows="5" class="form-control" name="description" ></textarea>
    		    </div>
    		    

				<div class="form-group">
    		        <label for="catergory">Catergory</label>
    		        <input type="text" class="form-control" name="catergory" />
    		    </div>
                <!-- <div class="form-group">
    		        <label for="description">Post Image</label>
    		        <input type="file" class="form-control " name="image" />
    		    </div> -->
    		    
    		    <div class="form-group">
    		        <button type="submit" class="btn btn-primary">
    		            Create
    		        </button>
    		        <button class="btn btn-default">
    		            Cancel
    		        </button>
    		    </div>
    		    
				<?php echo form_close(''); ?>
		</div>
		
	</div>
</div>

<?php include 'includes/footer.php' ?>