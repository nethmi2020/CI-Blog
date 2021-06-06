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
  <?php echo form_open('PostController/editsavepost'); ?>

  
		<?php if($this->session->flashdata('msg'))  {

		echo "<h4>" .$this->session->flashdata('msg'). "</h4>";
		} 
		?>
						
 			 <h1>Edit  post</h1>
    		<?php

                    foreach($fetch_data->result() as $row)
                                        
                    {
                ?> 
    		    
    		    <div class="form-group">
    		        <label for="title">Title </label>
    		        <input type="text" value="<?php echo $row->title ; ?>" class="form-control" name="title" />
    		    </div>
    		    
    		    <div class="form-group">
    		        <label for="description">Description</label>
    		        <textarea  class="form-control"  name="description" ><?php echo $row->description ; ?></textarea>
    		    </div>
    		    

				<div class="form-group">
    		        <label for="catergory">Catergory</label>
    		        <input type="text" class="form-control" value="<?php echo $row->catergory ; ?>" name="catergory" />
    		    </div>
                <div class="form-group">
    		       
    		        <input type="text" class="form-control " name="id" value="<?php echo $row->id ; ?>" />
    		    </div>
    		    
    		    <div class="form-group">
    		        <button type="submit" class="btn btn-primary">
    		            Save
    		        </button>
    		        <button class="btn btn-default">
    		            Cancel
    		        </button>
    		    </div>
    		    
                <?php
                        }

                ?>
				<?php echo form_close(''); ?>
		</div>
		
	</div>
</div>

<?php include 'includes/footer.php' ?>