
<?php 
include_once("./php/librarydata.php"); 
session_start();
$db = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE) or die("could not connect to db");
// echo "hello";
// if (isset($_POST['login_user'])) {
    if (isset($_POST['username']) and isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
//Checking if the values exist in the database or not
        // $query = "SELECT * FROM users WHERE Names='$username' and passwords='$password'";
        // $result = mysqli_query($db, $query);
        // $foundMatch = mysqli_num_rows($result);
        $query = "SELECT * FROM users WHERE Names=?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $foundMatch = mysqli_num_rows($result);
        $admin=false;
// If the values are equal to the database values, a session will be created.
        if($foundMatch ==  1){
            $row = $result->fetch_assoc();
            if($row['Admin']==1){
                $admin=true;
            }
            echo print_r($row);
            if (!password_verify($password, $row['passwords'])) {
                $foundMatch=0;
            }
        }
        if ($foundMatch == 1){
            setcookie('name',$username,time()+3600);
            if($admin==true){
                setcookie('admin',"admin",time()+3600);
            }
            if (isset($_COOKIE['loginerror'])) {
                unset($_COOKIE['loginerror']);
                setcookie('loginerror', '', time() - 3600); // empty value and old timestamp
            }
            header('location: index.php');
            // if (isset($_SESSION['username'])){
            //     $username = $_SESSION['username'];

            //     echo "<br/> Welcome home, ". $username . "";
            // }
        }else{
//If the login doesn't match, an error message will be displayed.
            $fmsg = "Invalid Login Credentials";
            setcookie("loginerror",$fmsg);
            header('location: login.php');   
        }
    }
// }
?>
