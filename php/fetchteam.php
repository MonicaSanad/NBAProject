<?php
//fetch.php
include_once("./librarydata.php");
$connect = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE);
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM (Team_Records NATURAL JOIN Coaches)
  WHERE Team LIKE '%".$search."%'
  OR Coach_Name LIKE '%".$search."%' 
  OR Wins LIKE '%".$search."%' 
  OR Losses LIKE '%".$search."%'
  ORDER BY Losses 
 ";
}
else
{
 $query = "
  SELECT * FROM (Team_Records NATURAL JOIN Coaches) ORDER BY Losses
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Team</th>
     <th>Coach</th>
     <th>Wins</th>
     <th>Losses</th>
    </tr>
 ';

 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["Team"].'</td>
    <td>'.$row["Coach_Name"].'</td>
    <td>'.$row["Wins"].'</td>
    <td>'.$row["Losses"].'</td>
   </tr>
  ';
 }
 // code for checking if user wants to export
 if(isset($_POST['export'])) {  
   $query = "
   SELECT * FROM (Team_Records NATURAL JOIN Coaches) ORDER BY Losses
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
         header('Content-Disposition: attachment; filename="team.csv"');
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
}
else
{
 echo 'Data Not Found';
}

?>