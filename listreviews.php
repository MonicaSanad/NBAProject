<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <title>Databasketball</title>
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
      <li class="nav-item">
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
      <li class="nav-item">
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
</body>
</html>
<?php
include_once("./php/librarydata.php"); 
$db = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// $search = mysqli_real_escape_string($db, $_GET["id"]);
// $userid = "";
// echo $search;
if(isset($_COOKIE['name'])){
$query = "
 SELECT * FROM reviews NATURAL JOIN Player
 WHERE username = '". $_COOKIE['name'] ."'";
if(isset($_COOKIE['admin'])){
  $query = "
 SELECT * FROM reviews NATURAL JOIN Player";
}
// echo $query;
$result = mysqli_query($db, $query);
$count = mysqli_num_rows($result);
}
else{
    $count=0;
}
?>
<br>
<br>
<div class="row">
<div class="col-4"></div>
<div class="col-4" style="text-align:center;">
<?php    
    
    
    if($count > 0){
      if(isset($_COOKIE['admin'])){
        echo "<h2> All Reviews </h2>";
      }
      else{
        echo "<h2> My Reviews </h2>";
      }
    while($row = mysqli_fetch_array($result)) { 
    
    echo '
    <div class="card text-left" style="width:100%" >
    <div class="card-body">
    <h5 class="card-title">'.$row['FirstN']. " ". $row['LastN']. ' ' . 'Review'.'</h5>
    <p class="card-text">'.$row['Review'].' <br> <br>
    '.'<i class="fas fa-star" > </i>: ' .$row['Rating'].'/10</p>'.'

    <div class=row>
        <div class=col-1>
    <a href="editreview.php?id='.$row['review_id'] .'" class="btn btn-dark"><i class="far fa-edit"></i></a>
</div>
<div class=col-1>
    <a href="deletereview.php?id='.$row['review_id'] .'" class=" dlte btn btn-danger"><i class="fas fa-trash-alt"></i></a>
</div>
</div> </div> </div><br>';
    }
}
else{
    echo '<h2> You have No Reviews Currently!</h2>';
}
    ?>
</div>
</div>

</div>
<div class="col-4"></div>
</div>
<script>
     $('.dlte').click(function() {
        // Don't follow the link
        var href = this.href;
        event.preventDefault();

        var r= confirm("Are you sure you would like to delete this Review?")
        if (r == true) {
            window.location = href;
        } 
    });
</script>
