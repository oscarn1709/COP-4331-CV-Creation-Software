<?php
$connection = mysqli_connect('localhost', 'blaypw_cvmaker', 'COPGroup9!');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'blaypw_cvmaker');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
