<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>ProdeMundial</title>

  <LINK href="css/style.css" rel="stylesheet" type="text/css"> 
  <script src="js/libs/jquerymin.js"></script>
  <script src="js/utils.js"></script>
 
  
</head>
<body>

<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '110528582328864',
      status     : true,
      xfbml      : true
    });

    FB.Event.subscribe('auth.authResponseChange', function(response) {
	    if (response.status === 'connected') {
	      console.log('Logged in');
	    } else {
	      FB.login();
	    }
  	});
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/es_AR/all.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
  

</script>

<h1>ProDeMundial</h1>

<div class="fb-like" data-send="true" data-width="450" data-show-faces="true"></div>

<div id='world'></div>
<div id='save' class="save" onclick="">Ir Guardando</div>

 <script src="js/worldcup.js"></script>
 
</body>
</html>
