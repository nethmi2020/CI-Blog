<?php include 'partials/header.php' ?>

<?php

    foreach($fetch_data->result() as $row)
                        
                            {
                                ?> 
                            
                            <div class="container mt-5 bg-light text-dark p-5 mb-5">
                                
                                    <h4 class="display-4"><?php echo $row->title;  ?></h4>
                                    <p>Catergory :<?php echo $row->catergory;  ?></p>
                                    <p><?php echo  $row->description;  ?></p>
                                    
                                  
                            </div>  
                                
                                <?php
                            }

                            ?>




<?php include 'partials/footer.php' ?>