<?php 
  
    // cargamos la clase que nos proporcionan 
    require_once('apis_externas/facebook/class_facebook.php'); 
  
    // datos de la aplicación que se nos facilitan cuando la registramos en Facebook  
    $appapikey = '110528582328864'; 
    $appsecret = '37f75cbbff200c77f8c4cb59ac310416'; 
  
    // inicializamos el objeto de la clase 
    $facebook = new Facebook($appapikey,$appsecret); 
  
    // si el usuario no está logueado en Facebook le redirigirá allí 
    $id_unico = $facebook->require_login(); 
  
    if(empty($id_unico)) 
    { 
        // si a estas alturas no tenemos el id único algo ha salido mal 
        $error_api = true; 
    } 
  
?> 