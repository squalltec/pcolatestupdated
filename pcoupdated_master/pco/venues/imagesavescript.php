
  <?php

    $data = $_POST['imgBase64'];
    list($type, $data) = explode(';', $data);
    list(, $data)      = explode(',', $data);
    $data = base64_decode($data);

   

    file_put_contents("iima/".time().'.png', $data);
    die;
?>
  
  
  
  
  
  
  
  
  
  
  
  