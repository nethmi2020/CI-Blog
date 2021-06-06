<?php
if(!($this->session->userdata('loggedin'))){

    redirect('Welcome/login');
}

?>

<?php include 'includes/header.php' ?>
<?


?>

        <div class="container">

        <h3 class="mt-5 display-4 text-center">Post Lists</h3>

        <?php if($this->session->flashdata('msg'))  {

            echo "<h4>" .$this->session->flashdata('msg'). "</h4>";
            } 
?>

        <table class="table mt-5">
                <thead style="background-color:aquamarine">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Catergory</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Update</th>
                    </tr>
                </thead>
                <?php
                    if($fetch_data->num_rows()>0)
                    {
                

                        foreach($fetch_data->result() as $row)
                      
                        {
                            ?> 
                            <tr>
                                <td><?php echo $row->id;  ?></td>
                                <td><?php echo $row->title;  ?></td>
                                <td><?php echo $row->description;  ?></td>
                                <td><?php echo $row->catergory;  ?></td>
                                
                                <td> <a href="<?php echo base_url('index.php/PostController/deletepost/'.$row->id) ; ?>" >Delete</a></td>
                                <td> <a href="<?php echo base_url('index.php/PostController/editpost/'.$row->id) ; ?>" >Edit</a></td>
                                <!-- <td> <a href="#" id="<?php echo $row->id ; ?>" class="delete_post" id="<?php echo $row->id ; ?>" >Delete</a></td> -->
                            </tr>
                            <?php
                        }

                  
                    }
                    else
                    {
                     ?>
                     <tr>
                     <td colspan="3">No Data Found</td>
                     </tr>
                     <?php


                    }
                ?>
                    
                    
</table>

        </div>
  <?php include 'includes/footer.php' ?>
                        <script>
                            $(document).ready(function(){
                                // e.preventDefault();
                                $('.delete_post').click(function(){
                                    
                                    var id=$(this).attr("id");

                                    // alert(id);
                                   
                                    if(confirm("Are you sure want to delete data")){
                                        window.location="<?php echo base_url(); ?>index.php/PostController/deletepost/"+id;
                                    }
                                    else{
                                        retun false;
                                    }
                                })
                            })

                        </script>
