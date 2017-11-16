<?php

 //Establish Connection
$mysqli = new mysqli('localhost', 'root', '', 'CV_DB');

if(!$mysqli){
    die("Connection failed: ".mysqli_connect_error()); 
    }

//get values
$password = $_POST['_password'];
$username = $_POST['_username'];


$user = "SELECT * FROM user WHERE username = '$username'";
$users = $mysqli->query($user);
$row = mysqli_fetch_array($users, MYSQL_ASSOC);

//if username not taken...
if(mysqli_num_rows($users) == 0){
    header('Location: login_fail.html');
}

else{
    if($row['password'] != $password){
        header('Location: login_fail.html');
    }
    else{
        session_start();
        $_SESSION['username'] = $username;
        header('Location: form.php');
    }
}


?>