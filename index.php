<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8'>
  <title>ProdeMundial</title>

  <LINK href="css/style.css" rel="stylesheet" type="text/css"> 
  <script src="js/libs/jquerymin.js"></script>
  <script src="js/utils.js"></script>
  <script src="js/worldcup.js"></script>
  
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

    FB.login(function(response) {
      if (response && response.authResponse){
        uid = response.authResponse.userID;
        getMe();
        getFriends();
        initialize();
      }
      else
      {
        //debug
        uid = "1129200740";
        initialize();
      }
    }, {scope: 'basic_info,user_likes'});
  };

  (function(d){
     var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/es_LA/all.js";
     d.getElementsByTagName('head')[0].appendChild(js);
  }(document));

  function getFriends() {
    FB.api('/me/friends', function(response) {
       initializeFriends(response.data);
    });
  }
   function getMe() {
    FB.api('/me', function(response) {
      setMe(response);
    });
  }
  </script>

<div class="title">ProDelMundial</div>



<div id='dashboard'></div>
<div id='world'>
 
</div>
 <div id='save' class="save" onclick="">Ir Guardando</div>

<div id='friends'></div>

<div class="tagboard">
<!--  tagboard Mi@  -->
<script type="text/javascript" src="http://tagboards.miarroba.es/ver.php?id=217787"></script>
<!-- tagboard Mi@  -->
</div>

<div class="ecuestasContainer">
  
<div class="encuestas">
  
<!-- Votaciones online de miarroba.es -->
<script type="text/javascript" src="http://votaciones.miarroba.es/ver.php?id=280700"></script>
<!-- Votaciones online de miarroba.es -->

<!-- Votaciones online de miarroba.es -->
<script type="text/javascript" src="http://votaciones.miarroba.es/ver.php?id=306380"></script>
<!-- Votaciones online de miarroba.es -->

<!-- Votaciones online de miarroba.es -->
<script type="text/javascript" src="http://votaciones.miarroba.es/ver.php?id=306381"></script>
<!-- Votaciones online de miarroba.es -->

<!-- Votaciones online de miarroba.es -->
<script type="text/javascript" src="http://votaciones.miarroba.es/ver.php?id=306379"></script>
<!-- Votaciones online de miarroba.es -->

<!-- Votaciones online de miarroba.es -->
<script type="text/javascript" src="http://votaciones.miarroba.es/ver.php?id=306378"></script>
<!-- Votaciones online de miarroba.es -->


</div>
</div>

<div class="fb-like" data-send="true" data-width="450" data-show-faces="true"></div>

 
</body>
</html>
