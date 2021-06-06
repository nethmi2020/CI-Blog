<?php
if(!($this->session->userdata('loggedin'))){

    redirect('Welcome/login');
}

?>

<?php include 'includes/header.php' ?>
<?


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"></script> -->
    
</head>
<body>
    <div class="container">

 
        <h2  class="text-center  mt-2 mb-2"><?php  echo $title;?> </h2>

        <?php if($this->session->flashdata('msg'))  {

          echo "<h4>" .$this->session->flashdata('msg'). "</h4>";
        } 
        ?>

        <form action="" method="post" id="upload_form" enctype="multipart/form-data">

            <div class="form-group">
                <label for="uploadImage">Image</label>
                <input type="file" class="form-control" id="image_file"  name="image_file">
                
            </div>

            <div class="form-group">
                 <input type="submit" id="upload" class="form-control" value="Upload" name="upload">
            </div>

            <div class="form-group" id="uploaded_image">
                <?php echo $image_data ?>
            </div>
        
        </form>
    </div>
</body>
</html>
<?php include 'includes/footer.php' ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function(){
        $('#upload_form').on('submit', function(e){
            e.preventDefault();
            if($('#image_file').val()== ''){
                alert('Please select the file');
            }
            else{
                $.ajax({
                    url:"<?php echo base_url(); ?>" + "index.php/LoginController/ajax_upload",
                    method:"POST",
                    data:new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    success:function(data){
                        $('#uploaded_image').html(data);
                    }
                })
            }
        })

    })
</script>
