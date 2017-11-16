<?php
    session_start();
    if(isset($_SESSION['username'])){
        echo "User Logged In: " . $_SESSION['username'];
    } 
    else {
        header('Location: index.html');
    }
 
$mysqli = new mysqli('localhost', 'root', '', 'CV_DB');

if(!$mysqli){
    die("Connection failed: ".mysqli_connect_error()); 
    }

?>


<?php

    $username = $_SESSION['username'];
    //gets username id  
    $uid = "SELECT uid 
            FROM user
            WHERE username = '$username'";
    $uids = $mysqli->query($uid);
    $row = mysqli_fetch_array($uids, MYSQL_ASSOC);
    $user_id = $row['uid'];


    //
    $imageData = mysqli_real_escape_string($mysqli, (file_get_contents($_FILES['photo']['tmp_name'])));

    $sqlphoto = "UPDATE user SET image = '$imageData' WHERE username='$username'";
    mysqli_query($mysqli, $sqlphoto);


    //
    
    //Get infor
    $name = $_POST['_name'];
    $address = $_POST['_address'];
    $email = $_POST['_email'];
    $phone = $_POST['_phone'];
    $skills = $_POST['_skills'];
    $optTitle = '';
    $optional = '';
    $university1 = $_POST['_school'];
    $degree1 = $_POST['_degree'];
    $major1 = $_POST['_major'];
    $gpa1 = $_POST['_gpa'];
    $grad1 = $_POST['_grad'];
    $university2 = $_POST['_school2'];
    $degree2 = $_POST['_degree2'];
    $major2 = $_POST['_major2'];
    $gpa2 = $_POST['_gpa2'];
    $grad2 = $_POST['_grad2'];
    $company1 = $_POST['_company'];
    $title1 = $_POST['_title'];
    $begin1 = $_POST['_begin'];
    $end1 = $_POST['_end'];
    $resp1 = $_POST['_workResp'];
    $company2 = $_POST['_company2'];
    $title2 = $_POST['_title2'];
    $begin2 = $_POST['_begin2'];
    $end2 = $_POST['_end2'];
    $resp2 = $_POST['_workResp2'];
    $company3 = $_POST['_company3'];
    $title3 = $_POST['_title3'];
    $begin3 = $_POST['_begin3'];
    $end3 = $_POST['_end3'];
    $resp3 = $_POST['_workResp3'];

    $sql1 = "UPDATE user SET name = '$name', address = '$address', email = '$email', phone = '$phone', skills = '$skills' WHERE username='$username'";
    mysqli_query($mysqli, $sql1);
    
    $sql2 = "UPDATE user SET university1 = '$university1', degree1 = '$degree1', major1 = '$major1', gpa1 = '$gpa1', grad1 = '$grad1' WHERE username='$username'";
    mysqli_query($mysqli, $sql2);

    $sql3 = "UPDATE user SET university2 = '$university2', degree2 = '$degree2', major2 = '$major2', gpa2 = '$gpa2', grad2 = '$grad2' WHERE username='$username'";
    mysqli_query($mysqli, $sql3);

    $sql4 = "UPDATE user SET company1 = '$company1', title1 = '$title1', begin1 = '$begin1', end1 = '$end1', resp1 = '$resp1' WHERE username='$username'";
    mysqli_query($mysqli, $sql4);

    $sql5 = "UPDATE user SET company2 = '$company2', title2 = '$title2', begin2 = '$begin2', end2 = '$end2', resp2 = '$resp2' WHERE username='$username'";
    mysqli_query($mysqli, $sql5);

    $sql6 = "UPDATE user SET company3 = '$company3', title3 = '$title3', begin3 = '$begin3', end3 = '$end3', resp3 = '$resp3' WHERE username='$username'";
    mysqli_query($mysqli, $sql6);

    if (isset($_POST['sectionName']) )
    {
        $optTitle = $_POST['sectionName'];
        $optional = $_POST['optional'];
        $sql7 = "UPDATE user SET optTitle = '$optTitle', optional = '$optional' WHERE username='$username'";
        mysqli_query($mysqli, $sql7);
    }

    header('Location: template.php');

?>

