<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <!-- <div class="container">
            <header>
                <div class="container">
                    <nav>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="registeration.html">Register</a></li>
                            <li><a href="login.html">Log in</a></li>
                            <li><a href="#">About</a></li>
                        </ul>
                    </nav>                
            </header>
    </div> -->
            <!-- <h2>Register</h2> -->
        <!-- </div> -->
    
                <div class="row">
                  <div class="col-lg-6 col-xl-5 mx-auto ">
                    <div class="card card-signin flex-row my-5">
                      <div class="card-img-left d-none d-md-flex">
                         <!-- Background image for card set in CSS! -->
                      </div>
                      <div class="card-body">
                        <h5 class="card-title text-center">Register</h5>
                        <form action="register.php" method="POST" >
                          <div class="form-label-group">
                            <label for="inputUserame">Username</label>
                            <input type="text" name="username" id="inputUserame" class="form-control" placeholder="Username" required autofocus>
                            
                          </div>
            
                          <div class="form-label-group">
                            <label for="inputEmail">Email address</label>
                            <input type="email"  name="email" id="inputEmail" class="form-control" placeholder="Email address" required>
                            
                          </div>
                          
                          <!-- <hr> -->
            
                          <div class="form-label-group">
                            <label for="inputPassword">Password</label>
                            <input type="password" name="password_1"  id="inputPassword" class="form-control" placeholder="Password" required>
                            
                          </div>
                          
                          <div class="form-label-group">
                                <label for="inputConfirmPassword">Confirm password</label>
                            <input type="password" name="password_2" id="inputConfirmPassword" class="form-control" placeholder="Password" required>
                           
                          </div>
                          <br>
                          <strong style="color:red"><?php
                          if(isset($_COOKIE['uerror']))
                          {
                          echo $_COOKIE['uerror'];
                          } ?></strong>
                          <strong style="color:red"><?php
                          if(isset($_COOKIE['eerror']))
                          {
                          echo $_COOKIE['eerror'];
                          } ?></strong>
                          <strong style="color:red"><?php
                          if(isset($_COOKIE['perror']))
                          {
                          echo $_COOKIE['perror'];
                          } ?></strong>
                          <strong style="color:red"><?php
                          if(isset($_COOKIE['pmatch']))
                          {
                          echo $_COOKIE['pmatch'];
                          } ?></strong>
                          <strong style="color:red"><?php
                          if(isset($_COOKIE['uexists']))
                          {
                          echo $_COOKIE['uexists'];
                          } ?></strong>
                          <strong style="color:red"><?php
                          if(isset($_COOKIE['eexists']))
                          {
                          echo $_COOKIE['eexists'];
                          } ?></strong>
                          
                          <button class="btn btn-lg btn-primary btn-block text-uppercase" name="sub" type="submit">Register</button>
                          <a class="d-block text-center mt-2 small" href="login.php">Log In</a>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
        <!-- <form action="register.php" method="POST">

            <?php include('errors.php')?>
            <div>
                <label for="username">Username: </label>
                <input type="text" name="username" required>
            </div>

            <div>
                <label for="email">Email: </label>
                <input type="email" name="email" required>
            </div>

            <div>
                <label for="password">Password: </label>
                <input type="password" name="password_1" required>
            </div>

            <div>
                <label for="password">Confirm Password: </label>
                <input type="password" name="password_2" required>
            </div>

            <button type="submit" name="sub"> Submit </button>

            <p>Already a user?<a href="login.html"><b>Log in</b></a></p>
        </form> -->
    </div>
    
</body>
</html>