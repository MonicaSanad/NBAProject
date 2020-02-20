<?php
// initialize vars
$username = "";
$email = "";
$password_1 = "";
$password_2 = "";
$errors = array();
//connect to db
$db = mysqli_connect('localhost', 'msanad', 'mysecretcleartextpassword', 'msanad') or die("could not connect to db");
echo 'Now you are connected to the database <br/>';

?>