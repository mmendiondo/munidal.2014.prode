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

var uid , accessToken;
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '110528582328864',
      status     : true,
      xfbml      : true
    });

    FB.Event.subscribe('auth.authResponseChange', function(response) {
      if (response.status === 'connected') {
          uid = response.authResponse.userID;
          accessToken = response.authResponse.accessToken;
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

    function fetchFriends()
    {
      FB.api('/me/friends',function(response) {
        var friends = [];
        for(var friend in response.data)
        {
          friends.push(response.data);
        }
        initializeFriends(friends);
      });
    }

    $(document).ready(function()
      {
        fetchFriends();       
      });

</script>

<body>

<div id="fb-root"></div>
<h1>ProDeMundial</h1>


<div id='dashboard'></div>
<div id='world'></div>
<div id='save' class="save" onclick="">Ir Guardando</div>
<div id='friends'></div>
<div class="fb-like" data-send="true" data-width="450" data-show-faces="true"></div>
 <script src="js/worldcup.js"></script>
 
</body>
</html>
