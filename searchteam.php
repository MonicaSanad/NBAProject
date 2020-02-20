<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Search By Team</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
 <body>
 <?php if(isset($_COOKIE["name"])) : ?>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <img src="ball.png" height="30" width="30">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="search.php">Player Information</a>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="searchteam.php">Team Information</a>
      </li>
      <?php if(isset($_COOKIE["admin"])) : ?> 
        <li class="nav-item">
        <a class="nav-link" href="listreviews.php">All Reviews</a>
        </li>
        <?php else: ?>
        <li class="nav-item">
        <a class="nav-link" href="listreviews.php">My Reviews</a>
        </li>
        <?php endif; ?> 
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Log out</a>
      </li>
    </ul>
  </div>
</nav>
<?php else: ?>
<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <img src="ball.png" height="30" width="30">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="registeration.php">Register Here!</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Log In</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="search.php">Player Information</a>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="searchteam.php">Team Information</a>
          </li>
    </ul>
  </div>
</nav>
<?php endif; ?>
  <div class="container">
   <br />
   <h2>Learn more about teams here!</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-text">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by team information" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
   <form method="post" action="php/fetchteam.php" class="row">
	<div class="col-6"></div>
	<div class="col-6"><input type="submit" value="Export All" name="export" class="button" /></div>
  </form>
  </div>
 </body>
</html>


<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"php/fetchteam.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>