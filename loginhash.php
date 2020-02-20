<?php require('DBconnect.php')?>
<?php 
session_start();
$db = mysqli_connect('mysql.cs.virginia.edu', 'mjh5uf', '4bSGTXUI', 'mjh5uf_...') or die("could not connect to db");
if (isset($_POST['login_user'])) {
    if (isset($_POST['username']) and isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
//Checking if the values exist in the database or not

$passwordhashed = password_hash($password, PASSWORD_BCRYPT);

        $query = "SELECT * FROM users WHERE Names='$username'";
        if(password_verify($password, $passwordhashed)){
            $result = mysqli_query($db, $query);
            $foundMatch = mysqli_num_rows($result);
        }
// If the values are equal to the database values, a session will be created.
        if ($foundMatch == 1){
            $_SESSION['username'] = $username;
            if (isset($_SESSION['username'])){
                $username = $_SESSION['username'];
            }
        }else{
//If the login doesn't match, an error message will be displayed.
            $fmsg = "<br/> Invalid Login Credentials.";
            echo $fmsg;
        }
    }
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
    <link rel="stylesheet" type = text/css href="style.css" />
    <script src="main.js"></script>
</head>
<body>

<header>
    <div class="container">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="registeration.html">Register</a></li>
                <li><a href="login.php">My Profile</a></li>
                <li><a href="#">About</a></li>
                <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h3>Categories</h3
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="#">Tablets</a>
                <a class="dropdown-item" href="#">Smart Watches</a>
                <a class="dropdown-item" href="#">Phones</a>
             </div>
            </li>                                
            </ul>
        </nav>                
    </div>
</header>
    
</body>
</html>
