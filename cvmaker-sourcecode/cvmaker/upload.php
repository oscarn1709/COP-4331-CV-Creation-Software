<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["my_file"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["my_file"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["my_file"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["my_file"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["my_file"]["name"]). " has been uploaded. ";
        echo "<pre>";
        echo "Please copy this into the image field: uploads/" . basename( $_FILES["my_file"]["name"]);
        echo "<pre>";
        //echo " Click here to return: http://cvmaker.ucfevents.co/creator.php";
        echo '<a href="http://cvmaker.ucfevents.co/creator.php">Click here to return</a>';

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
