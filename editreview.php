<?php
include_once("./php/librarydata.php"); 
$db = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// $search = mysqli_real_escape_string($db, $_GET["id"]);
// $userid = "";
// echo $search;
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = "
    SELECT * FROM reviews
    WHERE review_id=".$_GET["id"];
    // echo $query;
    $result2 = mysqli_query($db, $query);
    $row2 = mysqli_fetch_array($result2);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rid= $_POST['rid'];
    $playerid= $_POST['pid'];
    $feedback= $_POST['Feedback'];
    $rating=$_POST['numofstars'];
    $query = "UPDATE reviews 
    SET 
        Review = '$feedback',
        Rating = '$rating'
    WHERE
        review_id =".$rid.";";
    echo $query;    
    mysqli_query($db, $query);
    $finalurl = 'location: listreviews.php';
    header($finalurl);      
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
if(isset($_GET['id'])){
$search = mysqli_real_escape_string($db, $_GET["id"]);
// echo $search;
$query = "
 SELECT * FROM reviews NATURAL JOIN Player
 WHERE review_id = '". $_GET['id'] ."'";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
}
?>
<br>
<br>
<div class="row">
<div class="col"></div>
<div class="col" style="text-align:center;">
    <h2> Update Review for <?php echo $row['FirstN']. " " . $row['LastN']; ?> </h2>
    <div class="form-group">
   <form method="post" action="editreview.php" class="row">
   <input hidden name="pid" value=<?php echo $search ?>> 
   <input hidden name="rid" value="<?php if(isset($_GET['id'])){echo $_GET['id'];} ?>"> 
   <div class="col-12">
    <label for="customRange3" style="font-weight:bold">Player Rating</label>
    <input type="range" class="custom-range" name="numofstars" min="0" max="10" step="1" value="<?php echo $row2['Rating'];?>" id="customRange3" required>
    <p>Value: <span id="demo"></span></p> 
       </div>

    <br>
    <div class="col-12">
    <label for="feedback" style="font-weight:bold">Player Review</label>
    <textarea class="form-control" name="Feedback" id="feedback" rows="5"><?php echo $row2['Review'];?></textarea>
    </div>
    <div class="text-center col-12" style="padding-top: 30px;">
    <button class="btn btn-lg btn-primary" type="submit">Submit</button>
    </div>
</form>
  </div>
</div>
<div class="col"></div>
</div>
<script>
        var slider = document.getElementById("customRange3");
        var o = document.getElementById("demo");
        o.innerHTML = slider.value;
        
        slider.oninput = function() {
          o.innerHTML = this.value;
        }
</script>
