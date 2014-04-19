<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>ProdeMundial</title>

  <LINK href="css/style.css" rel="stylesheet" type="text/css"> 
  <script src="js/libs/jquerymin.js"></script>
  <script src="js/utils.js"></script>
 
  
</head>
<script>
    

</script>

<body>

<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : 110528582328864,
      status     : true,
      xfbml      : true
    });

    FB.login(function(response){
      var token = reponse.data.access_token
      console.log(reponse);
    );

   FB.api('/me/friends', "get", {access_token:token}, function(response){friends = response.data});
  };

  (function(d){
     var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/es_LA/all.js";
     d.getElementsByTagName('head')[0].appendChild(js);
  }(document));

  </script>

<h1>ProDeMundial</h1>


<div id='dashboard'></div>
<div id='world'>
 
</div>
 <div id='save' class="save" onclick="">Ir Guardando</div>

<div id='friends'></div>
<div class="fb-like" data-send="true" data-width="450" data-show-faces="true"></div>
 <script src="js/worldcup.js"></script>
 
</body>
</html>
