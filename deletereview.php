<?php
include_once("./php/librarydata.php"); 
$db = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// $search = mysqli_real_escape_string($db, $_GET["id"]);
// $userid = "";
// echo $search;
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $rid=$_GET["id"];
    $query = "
    DELETE FROM reviews WHERE review_id=".$rid;
    // echo $query;
    $result2 = mysqli_query($db, $query);
    $row2 = mysqli_fetch_array($result2);
    $finalurl = 'location: listreviews.php';
    header($finalurl); 
}
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $rid= $_POST['rid'];
//     $playerid= $_POST['pid'];
//     $feedback= $_POST['Feedback'];
//     $rating=$_POST['numofstars'];
//     $query = "UPDATE reviews 
//     SET 
//         Review = '$feedback',
//         Rating = '$rating'
//     WHERE
//         review_id =".$rid.";";
//     echo $query;    
//     mysqli_query($db, $query);
//     $finalurl = 'location: listreviews.php';
//     header($finalurl);      
// }
?>