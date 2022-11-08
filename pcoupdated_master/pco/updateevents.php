<?php

include 'header.php';


include 'db_connection.php';


$cito=$_GET['cito'];
$cito = str_replace(' ', '%20', $cito);
$city=$_GET['city'];


if(isset($_POST['update']))
{
    $id= $_POST['id'];
    $name= $_POST['name'];
    $venue= $_POST['venue'];
    $description= $_POST['description'];
    $fdate= $_POST['fdate'];
    
  
  
  
  
$sql2lau = "UPDATE allfetchedevents SET name='$name', venue='$venue',description='$description',fulldate='$fdate' WHERE id='$id'";
		  
 $resulta2lau = $conn->query($sql2lau);


if ($resulta2lau === TRUE) {


}


  
    
    
}


if(isset($_POST['del']))
{
    
    
    $id= $_POST['id'];
    
    
    
    $sql = "DELETE FROM allfetchedevents WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
  //echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
    
    
    
}


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
    $query = "SELECT * FROM allfetchedevents WHERE city='$cito'";  
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
    $query = "SELECT * FROM allfetchedevents WHERE city='$cito' LIMIT ".$results_per_page." OFFSET ".$page_first_result;  
    $result = mysqli_query($conn, $query);  
      
    //display the retrieved result on the webpage  
    
    ?>
    
    
    
    
          <div class="card radius-10">
                  <div class="card-body">
                   Events
                    <div class="my-3 border-top"></div>
                    <div class="accordion" id="accordionExample">
                     
                       
    
    
      <?php
        $pg=0;
    while ($row = mysqli_fetch_array($result)) {  
        
 

    
    ?>
    
    
    
            
                     
                      <form action='#' method='POST'>
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $pg;?>" aria-expanded="false" aria-controls="collapseOne">
                              <label>Event:</label>
                            &nbsp;<input name='name' class='form-control' value='<?php echo $row['name'];?>'>
                          </button>
                        </h2>
                        <div style='background-color:#E8E8E8;' id="collapse<?php echo $pg;?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                              
                              
                              
                             
                          
                          
                          <input style='display:none;' class='form-control' name='id' value='<?php echo $row['id'];?>'>
                          
                          <label>Venue</label>
                          <input class='form-control' name='venue' value='<?php echo $row['venue'];?>'>
                          
                          <label>Description</label>
                          <textarea rows="10" class='form-control' name='description'><?php echo $row['description'];?></textarea>
                          
                          <br/>
                          <label>Images</label>
                         
                         <a href="#" class="pop">
                             <img style='width:100px;'src='<?php echo $row['imagelink'];?>' class="img-responsive">
</a>
                         
                          
                          
                          <br/>
                           <label>Date</label>
                         
                         
                         
                         
                         
                         
                         
                         	<?php
													if (strpos($row['fulldate'], '-') !== false || strpos($row['fulldate'], 'Onwards') !== false) {
													    
													    
													    
													    if(strpos($row['fulldate'], 'Onwards') !== false)
													{
													    
													    
													    
													    $fda=str_replace(" Onwards","",$row['fulldate']);
													    $fda=str_replace("/","-",$fda);
													    ?>
													    	<input type='date' name='fdate' class='form-control' value="<?php echo $fda;?>" />
													
													    <?php
													    
													}
													else{
													   
													   
													   $f=explode(" - ", $row['fulldate']);
													      
													    //echo '<td>'.$f[0]; echo '-----'; echo $f[1].'</td>';
													   
													    ?>
													    
													   <input type="text" class='daterange form-control' name="fdate" value="<?php echo $f[0];?> - <?php echo $f[1];?>" />


													    
<script>
   
   $(function() {
  $('.daterange').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});


</script>
													
													    <?php
													    
													    
													}
													    
													    
													    
													}
													
													else
													{
													    $fd=$row['fulldate'];
													    
													    
													    
													    $fd=str_replace("/","-",$fd);
													    
													   
													?>
													
													
													
														<input type='date' class='form-control' name='fdate' value="<?php echo $fd;?>" />
														
													<?php
													
													}
													
													?>
														
                         
                         
                         
                         
                         <br/>
                         <br/>
                       
                       <div class='row'>
                           <div class='col-sm'>
                                 <input style='float:left;' type='submit' class='btn btn-danger' value='Delete' name='del'>
                           </div>
                             <div class='col-sm'>
                                 <input style='float:right;' type='submit' class='btn btn-success' value='Update' name='update'>
                           </div>
                       </div>
                         
                         
                         
                         
                         
                         
                         
                        
                         
                          
                          </div>
                        </div>
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

  

