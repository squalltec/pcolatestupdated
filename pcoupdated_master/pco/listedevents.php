<?php

include 'header.php';


include 'db_connection.php';



?>




<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />






<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" data-dismiss="modal">
    <div class="modal-content"  >              
      <div class="modal-body">
       
        <img src="" class="imagepreview" style="width: 100%;" >
      </div> 
 

    </div>
  </div>
</div>


<script>
     $(function() {
            $('.pop').on('click', function() {
                $('.imagepreview').attr('src', $(this).find('img').attr('src'));
                $('#imagemodal').modal('show');   
            });     
    });
</script>


























<main class='page-content'>
    
    

                     
                     
                     
             
               
               
            
    
    
    <?php  

  
    //define total number of results you want per page  
    $results_per_page = 100;  
  
  
  
  
  
  
    //find the total number of results stored in the database  
    $query = "SELECT * FROM allfetchedevents GROUP BY city";  
    $result = mysqli_query($conn, $query);  
    $number_of_result = mysqli_num_rows($result);  
  
    //determine the total number of pages available  
    $number_of_page = ceil ($number_of_result / $results_per_page);  
  
    //determine which page number visitor is currently on  
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    }  
  
    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page-1) * $results_per_page;  


  
    //retrieve the selected results from database   
    $query = "SELECT * FROM allfetchedevents GROUP BY city LIMIT ".$results_per_page." OFFSET ".$page_first_result;  
    $result = mysqli_query($conn, $query);  
      
    //display the retrieved result on the webpage  
    
    ?>
    
    
    
    
          <div class="card radius-10">
                  <div class="card-body">
                   Cities
                    <div class="my-3 border-top"></div>
                    <div class="accordion" id="accordionExample">
                     
                       
    
    
      <?php
        $pg=0;
    while ($row = mysqli_fetch_array($result)) {  
        
 

    
    ?>
    
    
    
            
                     
                      
                      <div class="accordion-item">
                       <a href='updateevents.php?cito=<?php echo $row['city'];?>'><h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $pg;?>" aria-expanded="false" aria-controls="collapseOne">
                              <label>Event:</label>
                            &nbsp;<input name='name' class='form-control' value='<?php echo str_replace('%20', ' ', $row['city']);?>'>
                          </button>
                        </h2></a> 
                       
                      </div>
               
                </form>
               
               
       <?php
       
        $pg= $pg+1;
       
    }
    ?>
               
               
               
               
                    </div>
                  </div>
                </div>

    
						
  <ul class="pagination pagination-lg">
  
							<?php
							
							$papa=1;
							  //display the link of the pages in URL  
    for($page = 1; $page<= $number_of_page; $page++) {  
        
 
 
 echo '<li class="page-item"><a class="page-link" href = "updateevents.php?city='.$city.'&page=' . $page . '">' . $page . ' </a></li>';  
       
     
        
    }  
    
    
?>
</ul>




</main>



<br/>
<br/>
<br/>




<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

  

