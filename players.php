<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
</body>
</html>
<?php
include_once("./php/librarydata.php"); 
$db = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE);
$search = mysqli_real_escape_string($db, $_GET["id"]);
// echo $search;
$query = "
 SELECT * FROM Player 
 WHERE Player_ID = ".$search."
";
$result = mysqli_query($db, $query);
$row = mysqli_fetch_assoc($result);
$query1 = "
 SELECT * FROM RS_Player_Stats
 WHERE Player_ID = ".$search."
";
$result1 = mysqli_query($db, $query1);
$row1 = mysqli_fetch_assoc($result1);
$query2 = "
 SELECT * FROM Plays_For
 WHERE Player_ID = ".$search."
";
$result2 = mysqli_query($db, $query2);
$row2 = mysqli_fetch_assoc($result2);
$query3 = "
 SELECT * FROM Playoff_Player_Stats
 WHERE Player_ID = ".$search."
";
$result3 = mysqli_query($db, $query3);
$row3 = mysqli_fetch_assoc($result3);

$query4 = "
 SELECT * FROM reviews
 WHERE Player_ID = ".$search."
";
$result4 = mysqli_query($db, $query4);
// $row4 = mysqli_fetch_assoc($result4);
$query5 = "
 SELECT * FROM Awards
 WHERE Player_ID = ".$search."
";
$result5 = mysqli_query($db, $query5);
$row5 = mysqli_fetch_assoc($result5);
$query6 = "
 SELECT * FROM All_Star
 WHERE Player_ID = ".$search."
";
$result6 = mysqli_query($db, $query6);
$row6 = mysqli_fetch_assoc($result6);
$query7 = "
 SELECT * FROM Honors
 WHERE Player_ID = ".$search."
";
$result7 = mysqli_query($db, $query7);
$row7 = mysqli_fetch_assoc($result7);
?>
<?php if(!isset($row)){ ?>
    <h1 class="text-center"> Page not Found </h1>
 
<?php  } else{ ?>
<div class="row">
<div class="col">
</div>
<div class="col text-center">
    <h1> <?php echo $row['FirstN']. ' ' .$row['LastN'] ; ?> </h1>
    <br>
    <img src="<?php echo $row['imageUrl']; ?>" style="width:250px;height:300px;"> <br>
    Age: <b><?php echo $row['Age']; ?></b><br>
    Drafted in  <b><?php echo $row['Draft_Year']; ?></b> <br>
    Plays for: <b><?php echo $row2['Team']; ?></b>  <br>
    <b><?php if(isset($row5)){
        if($row5['MVP']==1){
            echo "Winner of the Most Valuable Player of the Year Award <br>";
        }
        if($row5['DPOY']==1){
            echo "Winner of the Defense Player of the Year Award <br>";
        }
        if($row5['Most_Improved']==1){
            echo "Winner of the Most Improved Player of the Year Award <br>";
        }
        if($row5['Sixth_Man']==1){
            echo "Winner of the Sixth Man of the Year Award <br>";
        }
        if($row5['Rookie_Of_Year']==1){
            echo "Winner of the Rookie of the Year Award <br>";
        }
    }?></b>
    <b><?php if(isset($row6)){
        if($row6['All_Star_Game']==1){
            echo "All Star Game Participant <br>";
        }
        if($row6['Rising_Star']==1){
            echo "Rising Stars Challenge Contestant <br>";
        }
        if($row6['Dunk_Contest']==1){
            echo "Dunk Contest Contestant <br>";
        }
        if($row6['Three_Point_Contest']==1){
            echo "Three Point Challenge Contestant <br>";
        }
        if($row6['Skills_Challenge']==1){
            echo "Skills Challenge Contestant <br>";
        }
    }?></b>
       <b><?php if(isset($row7)){
        if($row7['All_NBA']==1){
            echo "All NBA 1st Team Selection <br>";
        }
        if($row7['All_NBA']==2){
            echo "All NBA 2nd Team Selection <br>";
        }
        if($row7['All_NBA']==3){
            echo "All NBA 3rd Team Selection  <br>";
        }
        if($row7['All_Defensive']==1){
            echo "All Defensive 1st Team Selection <br>";
        }
        if($row7['All_Defensive']==2){
            echo "All Defensive 2nd Team Selection <br>";
        }
        if($row7['All_Rookie']==1){
            echo "All Rookie 1st Team Selection <br>";
        }
    }?></b>
</div>
<div class="col">
</div>
</div>
<br>
<br>
<?php if(isset($row1)){ ?> 
<div class="row">
<div class="col-10 mx-auto">
    <h1 class="text-center"> Regular Season Stats </h1>
<table class="table mx-auto text-center" style="font-size: 1.2em">
    <thead class="thead-dark">
      <tr>
        <th>Points Per Game</th>
        <th>Rebounds Per Game</th>
        <th>Assists Per Game</th>
        <th>Steals Per Game</th>
        <th>Blocks Per Game</th>
        <th>Minutes Per Game</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
      <td><?php echo $row1['Points_Per_Game']; ?> </td>
      <td><?php echo $row1['Rebounds_Per_Game']; ?> </td>
      <td><?php echo $row1['Assists_Per_Game']; ?> </td>
      <td><?php echo $row1['Steals_Per_Game']; ?> </td>
      <td><?php echo $row1['Blocks_Per_game']; ?> </td>
      <td><?php echo $row1['Minutes_Per_Game']; ?> </td>
      </tr>
    </tbody>
  </table>
</div>
</div>
<br>
<?php } ?>

<?php if(isset($row3)){ 
    echo '<div class="col-10 mx-auto">
    <h1 class="text-center"> Playoff Stats </h1>
<table class="table mx-auto text-center" style="font-size: 1.2em">
    <thead class="thead-dark">'.">
      <tr>
        <th>Points Per Game</th>
        <th>Rebounds Per Game</th>
        <th>Assists Per Game</th>
        <th>Steals Per Game</th>
        <th>Blocks Per Game</th>
        <th>Minutes Per Game</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <td>". $row3['PO_Points_Per_Game']." </td>
      <td>". $row3['PO_Rebounds_Per_Game']." </td>
      <td>". $row3['PO_Assists_Per_Game']." </td>
      <td>". $row3['PO_Steals_Per_Game']." </td>
      <td>". $row3['PO_Blocks_Per_game']." </td>
      <td>". $row3['PO_Minutes_Per_Game']." </td>
      </tr>
    </tbody>
  </table>
</div>
</div></div>";
} ?>
<div class="row">
    <div class="col" style="text-align:center">
    <?php if(isset($_COOKIE['name'])){ ?>
        <br><h1>Reviews</h1> <br>
   
    <div class="col-4 mx-auto">
    <?php
    while($row4 = mysqli_fetch_array($result4))
    {
        echo "<div class=" . '"card border-dark"' .">" .
       ' <h5 class="card-header bg-transparent border-dark" style="text-align:left"><i class="fas fa-user" > </i>: ' .$row4['username'].'</h5>'. 
        "<div class=" . "card-body" .">
          <p class="."card-text".">". $row4['Review'] ."</p> 
        </div>".' <h5 class="card-header bg-transparent border-dark" style="border-bottom:none;text-align:left"><i class="fas fa-star" > </i>: ' .$row4['Rating'].'/10</h5>'. 
      "</div> <br>";
    }
    ?>
    </div>
    <br>
    <button type="button" class="btn btn-success" onclick="myFunction(this,<?php echo $search; ?>)">+ Add A Review</button>
    <?php } 
    else{ 
        echo '<h2> Log in <a href="login.php">here</a> to view reviews and rate players! </h2>';
    } ?>
    </div>
</div>
</div>
</div>  
<?php } ?>
<script>
    function myFunction(x,index){
        var k = window.location.toString();
        // alert(k);
        var n = k.lastIndexOf("/");
         var i= k.substring(0,parseInt(n)+1);
        i=i+"reviews.php?id="+index;
        window.location.href = i;
    }
</script>