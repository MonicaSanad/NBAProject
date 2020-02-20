<?php
include_once("./php/librarydata.php"); 
$username = "";
$email = "";
$password_1 = "";
$password_2 = "";
$errors = array();
$db = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE);
if (isset($_COOKIE['uerror'])) {
    unset($_COOKIE['uerror']);
    setcookie('uerror', '', time() - 3600); // empty value and old timestamp
}
if (isset($_COOKIE['eerror'])) {
    unset($_COOKIE['eerror']);
    setcookie('eerror', '', time() - 3600); // empty value and old timestamp
}
if (isset($_COOKIE['perror'])) {
    unset($_COOKIE['perror']);
    setcookie('perror', '', time() - 3600); // empty value and old timestamp
}
if (isset($_COOKIE['pmatch'])) {
    unset($_COOKIE['pmatch']);
    setcookie('pmatch', '', time() - 3600); // empty value and old timestamp
}
if (isset($_COOKIE['uexists'])) {
    unset($_COOKIE['uexists']);
    setcookie('uexists', '', time() - 3600); // empty value and old timestamp
}
if (isset($_COOKIE['eexists'])) {
    unset($_COOKIE['eexists']);
    setcookie('eexists', '', time() - 3600); // empty value and old timestamp
}
if (isset($_POST['sub'])) {
    if(isset($_POST['username'])){
        // echo 'inside user';
        $username = mysqli_real_escape_string($db, $_POST['username']);
    }
    if(isset($_POST['email'])){
        // echo 'inside email';
        $email = mysqli_real_escape_string($db, $_POST['email']);
    }
    if(isset($_POST['password_1'])){
        // echo 'inside password1';
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    }
    if(isset($_POST['password_2'])){
        // echo 'inside password2';
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    }
    // form validation
    if(empty($username)) {
        array_push($errors, "Username is required");
        $fmsg = "username required.";
        setcookie("uerror",$fmsg);
        // header('location: registration.php');
    }
    if(empty($email)) {
        array_push($errors, "Username is required");
        $fmsg = "email required.";
        setcookie("eerror",$fmsg);
        // header('location: registration.php');
    }
    if(empty($password_1)) {
        array_push($errors, "Username is required");
        $fmsg = "password required.";
        setcookie("perror",$fmsg);
        // header('location: registration.php');
    }
    if($password_1 !== $password_2) {
        array_push($errors, "Username is required");
        $fmsg = "passwords do not match.";
        setcookie("pmatch",$fmsg);
        // header('location: registration.php');
    }
    
    // check db for existing user with same username
    // $user_check = "SELECT * FROM users WHERE Names = '$username'";
    
    // $results = mysqli_query($db, $user_check);
    // $user = mysqli_fetch_assoc($results);
    $query = "SELECT * FROM users WHERE Names=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $results = $stmt->get_result();
    $user = mysqli_fetch_assoc($results);
    if($user) {
        if ($user['Names'] === $username) {
            array_push($errors, "Username is required");
            $fmsg = "Username already exists.";
            setcookie("uexists",$fmsg);
            // header('location: registration.php');
        }
        if ($user['Emails'] === $email) {
            array_push($errors, "Username is required");
            $fmsg = "Email already exists.";
            setcookie("eexists",$fmsg);
            // header('location: registration.php');
        }
    }
    
    // Register user 
    if (count($errors) == 0) {
        // $password = $password_1;
        $hash = password_hash($password_1, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (Names, Emails, passwords) VALUES (?,?,?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param("sss", $username,$email,$hash);
        $stmt->execute();
        setcookie("name",$username,time()+6000000);
        if (isset($_COOKIE['uerror'])) {
            unset($_COOKIE['uerror']);
            setcookie('uerror', '', time() - 3600); // empty value and old timestamp
        }
        if (isset($_COOKIE['eerror'])) {
            unset($_COOKIE['eerror']);
            setcookie('eerror', '', time() - 3600); // empty value and old timestamp
        }
        if (isset($_COOKIE['perror'])) {
            unset($_COOKIE['perror']);
            setcookie('perror', '', time() - 3600); // empty value and old timestamp
        }
        if (isset($_COOKIE['pmatch'])) {
            unset($_COOKIE['pmatch']);
            setcookie('pmatch', '', time() - 3600); // empty value and old timestamp
        }
        if (isset($_COOKIE['uexists'])) {
            unset($_COOKIE['uexists']);
            setcookie('uexists', '', time() - 3600); // empty value and old timestamp
        }
        if (isset($_COOKIE['eexists'])) {
            unset($_COOKIE['eexists']);
            setcookie('eexists', '', time() - 3600); // empty value and old timestamp
        }
        // $_SESSION['username'] = $username;
        // $_SESSION['success'] = "You are logged in now";
        header('location: index.php');
    } else {
        header('location: registeration.php');
    }
}
?>