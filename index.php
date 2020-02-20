
<?php session_start(); ?>   

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
<!-- <nav class="navbar navbar-light bg-light">

</nav> -->
    <!-- <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="registeration.html">Register</a></li>
            <li><a href="login.html">Log in</a></li>
            <li><a href="#">About</a></li>
            <li><a href="search.html">Search</a></li>
        </ul>
    </nav>                 -->
    <div class="jumbotron">
    <h1 class="display-4">DataBasketball</h1>
    <p class="lead">Learn more about NBA players, and teams here! Sign up to add reviews and rate players!</p>
    <hr class="my-4">
    <?php if(isset($_COOKIE["name"])) : ?>
        <h2 class="lead">Welcome <strong><?php echo $_COOKIE["name"]; ?>!</strong></h2>
        <!-- <button><a href="index.php?logout='1'"></a></button> -->
    <?php endif ?>
    </div>
    <img src="teamlogo.png" class="img-fluid" alt="Responsive image" width=100% height=30%>

</body>
</html>