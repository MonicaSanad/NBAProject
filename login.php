<?php 
if(isset($_COOKIE["name"]))
{ 
  header( 'Location: index.php' );
} 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" type = text/css href="style.css" /> -->
    <!-- <script src="main.js"></script> -->
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
            <!-- <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="registeration.html">Register</a></li>
                    <li><a href="login.html">Log in</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </nav>                 -->
    <!-- <form action="login.php" method="post">
        <div class="login">
            <h1>Welcome! Log into your account</h1>
            <form action="login.php" method="post">
                <p><input type="text" name="username" value="" placeholder="Username or Email" required></p>
                <p><input type="password" name="password" value="" placeholder="Password" re></p>
                <button type="submit" name="login_user"> Log in </button>
            </div>
        </form>
        <div class="login-help">
            <p>Forgot your password? <a href="#">Click here to reset it</a>.</p>
        </div>
        <p>Not a user?<a href="registeration.html"><b>Register here</b></a></p>
    </form> -->
    <div class="row">
            <div class="col-lg-6 col-xl-5 mx-auto ">
              <div class="card card-signin flex-row my-5">
                <div class="card-img-left d-none d-md-flex">
                   <!-- Background image for card set in CSS! -->
                </div>
                <div class="card-body">
                  <h5 class="card-title text-center">Log In</h5>
                  <form action="loginhelper.php" method="POST" >
                    <div class="form-label-group">
                      <label for="inputUserame">Username</label>
                      <input type="text" name="username" id="inputUserame" class="form-control" placeholder="Username" required autofocus>
                      
                    </div>  
                    <div class="form-label-group">
                      <label for="inputPassword">Password</label>
                      <input type="password" name="password"  id="inputPassword" class="form-control" placeholder="Password" required>
                      
                    </div>
                    <strong style="color:red"><?php
                    if(isset($_COOKIE['loginerror']))
                    {
                      echo $_COOKIE['loginerror'];
                    } ?></strong>
                    <br>
                    <button class="btn btn-lg btn-primary btn-block text-uppercase" name="login_user" type="submit">Log In</button>
                    <a class="d-block text-center mt-2 small" href="registeration.php">Don't have an account? Sign Up Here</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
</div>

</body>
</html>

