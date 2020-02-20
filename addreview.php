<?php
include_once("./php/librarydata.php"); 
$db = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// echo $search;

$playerid= $_POST['pid'];
$usern= $_COOKIE['name'];
$feedback= $_POST['Feedback'];
$rating=$_POST['numofstars'];
echo $playerid . " " . $usern. " " . $feedback . " " . $rating;
$query = "INSERT INTO reviews (Player_ID, Review, Rating, username) VALUES ('$playerid', '$feedback', '$rating','$usern')";
mysqli_query($db, $query);
$finalurl = 'location: players.php?id='.$playerid;
header($finalurl);
// $query1 = "
//  SELECT * FROM RS_Player_Stats
//  WHERE Player_ID = ".$search."
// ";
// $result = mysqli_query($db, $query);
// $row = mysqli_fetch_assoc($result);
?>