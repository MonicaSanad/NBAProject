<?php 
unset($_COOKIE['name']);
setcookie('name', '', time() - 3600); // empty value and old timestamp
if(isset($_COOKIE['admin'])){
unset($_COOKIE['admin']);
setcookie('admin', '', time() - 3600); // empty value and old timestamp
}
header('location: index.php');
?>
