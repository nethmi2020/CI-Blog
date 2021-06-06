<?php include 'partials/header.php' ?>



<h2 class="text-center mt-5 mb-5">Blog posts new</h2>

<?php
                    if($fetch_data->num_rows()>0)
                    {
                

                        foreach($fetch_data->result() as $row)
                      
                        {
                            ?> 
                           
                           <div class="container mt-5 bg-dark text-light p-5 mb-5">
                             
                                <h4 class="display-4"><?php echo $row->title;  ?></h4>
                                <p>Catergory :<?php echo $row->catergory;  ?></p>
                                <p><?php echo word_limiter( $row->description,60);  ?></p>
                                
                                <button class="btn btn-danger large">
                                <a href="<?php echo base_url('index.php/PostController/singlepost/'.$row->id) ; ?>">Read More</a></button>
                          </div>  
                            
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
                    

<?php include 'partials/footer.php' ?>