<?php
   $json = $_POST['json'];
   $name = $_POST['name'];
   $info = json_encode($json);
   $file = fopen( $name . '.json','w+');
   fwrite($file, $info);
   fclose($file);
?>