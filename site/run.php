<!DOCTYPE html>
<html>
<head>
  <title>Google Photos to Contacts</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
  <style>
    .w3-card-inv{
      box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
      background-color:#009688;
      color:white !important;

    }
    .w3-card-inv .w3-text-theme{
       color:white !important;
    }
    .google-button {
  height: 40px;
  border-width: 0;
  background: white;
  color: #737373;
  border-radius: 5px;
  white-space: nowrap;
  -webkit-box-shadow: 1px 1px 0px 1px rgba(0, 0, 0, 0.05);
          box-shadow: 1px 1px 0px 1px rgba(0, 0, 0, 0.05);
  -webkit-transition-property: background-color, -webkit-box-shadow;
  transition-property: background-color, -webkit-box-shadow;
  transition-property: background-color, box-shadow;
  transition-property: background-color, box-shadow, -webkit-box-shadow;
  -webkit-transition-duration: 150ms;
          transition-duration: 150ms;
  -webkit-transition-timing-function: ease-in-out;
          transition-timing-function: ease-in-out;
  padding: 0;
  margin-top: 4px;
  width: 190px;
    }
    .google-button__icon {
  display: inline-block;
  vertical-align: middle;
  margin: 8px 0 8px 8px;
  width: 18px;
  height: 18px;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

.google-button__icon--plus {
  width: 27px;
}

.google-button__text {
  display: inline-block;
  vertical-align: middle;
  padding: 0 5px;
  font-size: 14px;
  font-weight: bold;
  font-family: 'Roboto',arial,sans-serif;
}
    .w3-third{
      width: 25% !important;
    }
    .w3-disabled{
      cursor: not-allowed;
      pointer-events: none;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<script>
  var data;
  <?php
    if($_POST['data']){
      echo "data = ".$_POST['data'].";";
    }
  ?>
</script>
<!-- Header -->
<header class="w3-container w3-theme w3-padding" id="myHeader">
  <div class="w3-center">
    <h1>Google Photos to Contacts</h1>
    <h4 class="w3-animate-bottom">Made by Jacob Richman</h4>
  </div>
</header>

<div class="w3-row-padding w3-center w3-margin-top">
<div class="w3-third">
  <div id="firstCard" class=" w3-container" style="min-height:460px">
  <h3>Import Photos</h3><br>
  <i class="fa fa-cloud-download w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
    <hr>
  <div id="notDownloaded" style="display:none">
    <p>Please download and run the chrome extension.</p>
    <button class="w3-btn w3-xlarge w3-dark-grey w3-hover-light-grey" style="font-weight:900;">Get Extension</button>
  </div>
  <div id="isDownloaded" style="display:none">
    <p><span id="numImported">xx</span> Photos imported.</p>
    <p>Details can be viewed <a href="#isDownloadedTable">below</a></p>
  </div>
  </div>
</div>

<div class="w3-third">
  <div  id="secondCard" class="w3-card w3-container" style="min-height:460px">
  <h3>Google Login</h3><br>
  <i class="fa fa-sign-in w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
    <hr>
    <button id="googleSignInButton" class="w3-button w3-disabled google-button">
      <span class="google-button__icon">
          <svg viewBox="0 0 366 372" xmlns="http://www.w3.org/2000/svg"><path d="M125.9 10.2c40.2-13.9 85.3-13.6 125.3 1.1 22.2 8.2 42.5 21 59.9 37.1-5.8 6.3-12.1 12.2-18.1 18.3l-34.2 34.2c-11.3-10.8-25.1-19-40.1-23.6-17.6-5.3-36.6-6.1-54.6-2.2-21 4.5-40.5 15.5-55.6 30.9-12.2 12.3-21.4 27.5-27 43.9-20.3-15.8-40.6-31.5-61-47.3 21.5-43 60.1-76.9 105.4-92.4z" id="Shape" fill="#EA4335"/><path d="M20.6 102.4c20.3 15.8 40.6 31.5 61 47.3-8 23.3-8 49.2 0 72.4-20.3 15.8-40.6 31.6-60.9 47.3C1.9 232.7-3.8 189.6 4.4 149.2c3.3-16.2 8.7-32 16.2-46.8z" id="Shape" fill="#FBBC05"/><path d="M361.7 151.1c5.8 32.7 4.5 66.8-4.7 98.8-8.5 29.3-24.6 56.5-47.1 77.2l-59.1-45.9c19.5-13.1 33.3-34.3 37.2-57.5H186.6c.1-24.2.1-48.4.1-72.6h175z" id="Shape" fill="#4285F4"/><path d="M81.4 222.2c7.8 22.9 22.8 43.2 42.6 57.1 12.4 8.7 26.6 14.9 41.4 17.9 14.6 3 29.7 2.6 44.4.1 14.6-2.6 28.7-7.9 41-16.2l59.1 45.9c-21.3 19.7-48 33.1-76.2 39.6-31.2 7.1-64.2 7.3-95.2-1-24.6-6.5-47.7-18.2-67.6-34.1-20.9-16.6-38.3-38-50.4-62 20.3-15.7 40.6-31.5 60.9-47.3z" fill="#34A853"/></svg>
      </span>
      <span class="google-button__text">Sign in with Google</span>
    </button>
    <div id="loggedInCreds"></div>
  </div>
</div>
  
<div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
  <h3>Find Matches</h3><br>
  <i class="fa fa-arrows-alt w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
  <hr>
  <button id="beginSearchButton" class="w3-button w3-theme-d3 w3-disabled">Begin Search</button> 
    <br><br>
  <div class="w3-light-gray">
    <div id="mySearchBar" class="w3-center w3-padding w3-theme" style="display:none; width:0%;"></div>
  </div>
  </div>
</div>

<div class="w3-third">
  <div class="w3-card w3-container" style="min-height:460px">
  <h3>Upload Photos</h3><br>
  <i class="fa fa-upload w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
  <hr>
  <button id="beginUploadButton" class="w3-button w3-theme-d3 w3-disabled">Begin Upload</button> 
    <br><br>
  <div class="w3-light-gray">
    <div id="myBar" class="w3-center w3-padding w3-theme" style="display:none; width:0%;"></div>
  </div>
  </div>
</div>
</div>

<div id="isDownloadedTable" style="display:none" class="w3-container">
    <hr>
  <div class="w3-center">
    <h2>Contacts</h2>
    <p w3-class="w3-large"><span id="numImportedTable">xx</span> Conacts pictures were found.</p>
    <div style="margin: 0 auto; width:500px" class="w3-responsive w3-card-4">
      <table  id="dataTable" class="w3-table w3-striped w3-bordered">
        <thead>
          <tr class="w3-theme">
            <th>#</th>
            <th>Name</th>
            <th>Photo</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
   </div>
</div>

<hr>

<!-- Footer -->
<footer class="w3-container w3-theme-dark w3-padding-16">
  <h3>Google Photos to Contacts</h3>
  <div style="position:relative;bottom:55px;" class="w3-tooltip w3-right">
    <span class="w3-text w3-theme-light w3-padding">Go To Top</span>    
    <a class="w3-text-white" href="#myHeader"><span class="w3-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
</footer>

<!-- Script for Sidebar, Tabs, Accordions, Progress bars and slideshows -->
<script>
  var timer;
  function checkLocalStorage(){
    var access_token = localStorage.getItem('access_token');
    if(access_token){
      clearInterval(timer);
      loggedIn();
    }
  }
  
$(document).ready(function(){
  $( "#googleSignInButton" ).click(function() {
    var client_id = '31446335233-mv1gr3dj67t37ke2t57a1qsvhqfcs9ph.apps.googleusercontent.com';
    var refresh_token = localStorage.getItem('refresh_token');
    if(refresh_token){
      $.post( "https://www.googleapis.com/oauth2/v4/token", {
        'refresh_token' : refresh_token,
        'client_id' : client_id,
        'client_secret' : 'hdriaIOzjJnxDS7rQvTaEBQK',
        'grant_type' : 'refresh_token'
      }).done(function( data ) {
        localStorage.setItem('access_token', data['access_token']);
        loggedIn();
      });
    }
    else{
      var url = "https://accounts.google.com/o/oauth2/v2/auth?client_id="+client_id+"&response_type=code&prompt=consent&scope=https://www.google.com/m8/feeds&access_type=offline&redirect_uri=https://contactphotos.app/redirect.php";
      window.open(url,'popUpWindow','height=700,width=500,left=50,top=20,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
      timer= setInterval("checkLocalStorage()", 1000);
    }
  });
  
  if (data){
    $("#firstCard").addClass("w3-card-inv");
    $("#isDownloaded").show();
    $("#isDownloadedTable").show();
    $("#numImported").html(data.length);
    $("#numImportedTable").html(data.length);
    $("#googleSignInButton").removeClass("w3-disabled");
    var $table = $('#dataTable');
    for(var i = 0; i< data.length; i++){
      $table.append('<tr id="table_' + i + '"><td>' + (i+1) + '</td><td>' + data[i]['name'] + '</td><td><img id="image_' + i +'" width="60" src="' + data[i]['url'] + '"></td></tr>');
    }
  }
  else{
    $("#firstCard").addClass("w3-card");
    $("#notDownloaded").show();
  }
  
  function loggedIn(){
    $("#secondCard").addClass("w3-card-inv");
    $("#googleSignInButton").addClass("w3-disabled");
    $("#beginSearchButton").removeClass("w3-disabled");
    $.ajax({
      url: 'https://www.google.com/m8/feeds/contacts/default/full?access_token='+localStorage.getItem('access_token'),
      type: 'GET', 
      dataType: 'xml',
      success: function(returnedXMLResponse){
        $('feed', returnedXMLResponse).each(function(){
          var name = $('name', $('author', this)).text();
          var email = $('email', $('author', this)).text();
          $("#loggedInCreds").html('<br><p>Logged in as <b>'+name+'</b><br>'+email+'</p>');
        })
      }
    }); 
  }
  
  $( "#beginSearchButton" ).click(function() {
    $("#beginSearchButton").addClass("w3-disabled");
    $("#mySearchBar").show();
    for(var i = 0; i< data.length; i++){
      getImageURL(i,data);
    }
  });
  
  var numSearchDone = 0;
  var numSearchGood = 0;
  function getImageURL(i, data){
    $.ajax({
        url: 'https://www.google.com/m8/feeds/contacts/default/full?access_token='+localStorage.getItem('access_token')+'&q='+data[i]['name'],
        type: 'GET', 
        dataType: 'xml',
        success: function(returnedXMLResponse){
          $('feed', returnedXMLResponse).each(function(){
            var uploadLink = jQuery($('link', $('entry', this)[0])[0]).attr('href');
            if(uploadLink != "/favicon.ico"){
              data[i]['uploadLink'] = uploadLink;

              numSearchGood++;
              var newval = Math.round((numSearchGood/data.length)*100)+'%';
              $("#mySearchBar").html(newval);
              $("#mySearchBar").css({'width': newval});
            }
            
            numSearchDone++;
            if(numSearchDone == data.length){
              $("#beginUploadButton").removeClass("w3-disabled");
            }
          })
        }
      }); 
  }
  
  var batchSize = 10;
  $( "#beginUploadButton" ).click(function() {
    $("#beginUploadButton").addClass("w3-disabled");
    $("#myBar").show();
    for(var p = 0; p<batchSize; p++){
      if(data.length>p){uploadImage(data, p);}
    }
  });
  
  function uploadNext(data, i){
    if(i+batchSize < data.length){
      i=i+batchSize;
      uploadImage(data, i);
    }
  }
  
  var numUploadDone=0;
  function uploadImage(data,i){
    if (!data[i]['uploadLink']) {
      $("#table_"+i).css('background-color', 'red');
      uploadNext(data, i);
      
      return;
    }
    $.ajax({
      url: 'https://contactphotos.app/uploadImage.php', 
      type: 'POST',
      dataType: 'xml',
      timeout: 3000,
      data: {
        'access_token' : localStorage.getItem('access_token'),
        'newImageURL' : data[i]['url'],
        'uploadLink' : data[i]['uploadLink']
      },
      complete: function(resultData) {
        var updated = $(resultData.responseText).find('updated')[0];
        if (updated){
          $("#table_"+i).addClass("w3-theme");

          numUploadDone++;
          var newval = Math.round((numUploadDone/numSearchGood)*100)+'%';
          $("#myBar").html(newval);
          $("#myBar").css({'width': newval});
          
          if(numUploadDone==numSearchGood){
            alert('Congratulations!!! Your upload to Google Contacts is complete.');
            window.location.href = "https://contacts.google.com";
          }
          
          uploadNext(data, i);
        }
        else{
          $("#table_"+i).css('background-color', 'purple');
          uploadImage(data, i);
        }
        
       }
    });

  }

});
</script>

</body>
</html>
