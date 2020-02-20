<?php
//fetch.php
include_once("./librarydata.php");
$connect = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE);
$output = ''; 
if(isset($_POST["query"])) {
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM (Player NATURAL JOIN Plays_For NATURAL JOIN RS_Player_Stats)
  WHERE FirstN LIKE '%".$search."%'
  OR LastN LIKE '%".$search."%' 
  OR Age LIKE '%".$search."%' 
  OR Draft_Year LIKE '%".$search."%'
  OR Team LIKE '%".$search."%'
  ORDER BY RAND()
 ";
} else {
 $query = "
  SELECT * FROM (Player NATURAL JOIN Plays_For NATURAL JOIN RS_Player_Stats) ORDER BY RAND() 
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0) {
 $output .= '
  <div class="table-responsive">
   <table class="table table-hover">
    <tr>
     <th>First Name</th>
     <th>Last Name</th>
     <th>Age</th>
     <th>Draft Year</th>
     <th>Team</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result)) {
  $output .= '
   <tr onclick=myFunction(this,'.$row["Player_ID"].')>
    <td>'.$row["FirstN"].'</td>
    <td>'.$row["LastN"].'</td>
    <td>'.$row["Age"].'</td>
    <td>'.$row["Draft_Year"].'</td>
    <td>'.$row["Team"].'</td>
   </tr>
  ';
 }
 // code for checking if user wants to export
 if(isset($_POST['export'])) {  
   $query = "
   SELECT * FROM (Player NATURAL JOIN Plays_For NATURAL JOIN RS_Player_Stats) ORDER BY RAND()
   ";
   $result = mysqli_query($connect, $query);
   if (!$result) die('Couldn\'t fetch records');
   $num_fields = mysqli_num_fields($result);
   $headers = array();
   while ($fieldinfo = mysqli_fetch_field($result)) {
      $headers[] = $fieldinfo->name;
   }
   $fp = fopen('php://output', 'w');
   if ($fp && $result) {
         header('Content-Type: text/csv');
         header('Content-Disposition: attachment; filename="players.csv"');
         header('Pragma: no-cache');
         header('Expires: 0');
         fputcsv($fp, $headers);
         while ($row = $result->fetch_array(MYSQLI_NUM)) {
            fputcsv($fp, array_values($row));
         }
         die;
   }  
 }
 echo $output;
} else {
 echo 'Data Not Found';
}

?>
