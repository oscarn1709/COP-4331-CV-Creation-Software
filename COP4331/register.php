<?php

 //Establish Connection
$mysqli = new mysqli('localhost', 'root', '', 'CV_DB');

if(!$mysqli){
    die("Connection failed: ".mysqli_connect_error()); 
    }

//get values
$password = $_POST['_password'];
$confirm = $_POST['_confirm'];

//if password is empty or doesn't match...
if($password <> $confirm || empty($password) || empty($confirm)){
    header('Location: register_password_fail.html');
}
else{

    $username = $_POST['_username'];

    $user = "SELECT * FROM user WHERE username = '$username'";
    $users = $mysqli->query($user);
    $row = mysqli_fetch_array($users, MYSQL_ASSOC);

    //if username not taken...
    if(mysqli_num_rows($users) == 0){
        //insert into db...
        $sql = "INSERT INTO user (username, password) "
                . "VALUES ('$username', '$password')";
        mysqli_query($mysqli, $sql);

        session_start();
        $_SESSION['username'] = $username;
        header('Location: form.php');
    }

    else{
        header('Location: register_username_fail.html');
    }
}

?>