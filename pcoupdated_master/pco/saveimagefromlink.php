<?php
$url    = 'https://busni.de/wp-content/uploads/2015/07/IMG_5458.jpg';
$img    = 'miki.png';
$file   = file($url);
$result = file_put_contents('imagesfromlinks/'.$img, $file)


?>