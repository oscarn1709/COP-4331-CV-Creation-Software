<?php
	require('db.php');
    // If the values are posted, insert them into the database.
    if (isset($_POST['name']) && isset($_POST['password'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        //check to see if the email is already registered in the system
        $checkEmail = "SELECT 1 FROM  user WHERE email = '$email'";
        $emailResult = mysqli_query($connection, $checkEmail);
        $countEmail = mysqli_num_rows($emailResult);

        //checks to make sure the fields are filled out
        if (ctype_space($name) || $name == '') {
            $fmsg1 = 'You must enter a name';
        }
        else if(ctype_space($email) || $email == ''){
            $fmsg1 = 'You must enter a email';
        }
        else if(ctype_space($password) || $password == ''){
            $fmsg1 = 'You must enter a password';
        }
        else if($countEmail > 0){
            $fmsg1 = 'The Email you have provided is already in use please try a different Email.';
        }
        else if(strlen($password) < 8){
            $fmsg1 = 'Please provide a password that is 8 characters or longer.';
        }
        else{
            $query = "INSERT INTO `user` (name, email, password) VALUES ('$name', '$email', '$password')";

            //$query = "CALL usp_InsertUser('$firstName', '$lastname', '$email', '$password', '$idUniversity')";
            $result = mysqli_query($connection, $query);

            if($result){
                $smsg = "User Created Successfully.";
                flush();
                header('Location: http://cvmaker.ucfevents.co/creator.php');
            }else{
                $fmsg1 ="User Registration Failed";
            }
        }


    }

if (isset($_POST['emailin']) and isset($_POST['passwordin'])){
//3.1.1 Assigning posted values to variables.
$email = $_POST['emailin'];
$password = $_POST['passwordin'];
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `user` WHERE email='$email' and password='$password'";

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);


//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
$_SESSION['emailin'] = $email;

//Get the id, university, and type of the user who logged in and store it in a session variable
$queryUser = "SELECT name FROM user WHERE email = '$email' and password = '$password'";
$resultUser = mysqli_query($connection, $queryUser);
$fetchUser = mysqli_fetch_array($resultUser);
$_SESSION['name'] = $fetchUser['name'];

}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
$fmsg2 = "Invalid Username or Password.";
}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['emailin'])){
$email = $_SESSION['emailin'];
flush();
header('Location: http://www.cvmaker.ucfevents.co/creator.php');
}else{
//3.2 When the user visits the page first time, simple login form will be displayed.
}
    ?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,400italic">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand" href="#"><i class="glyphicon glyphicon-blackboard"></i>Resume Creator</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" role="presentation">
                        <a href="#">
                            <button class="btn btn-primary" type="button" data-toggle="modal" href="/index.html">Home </button>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#" id="login">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal1">Login </button>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal2">Register </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron hero">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-push-7 phone-preview"><img src="assets/img/resume.jpg" style="height:1244px;max-height:500px;">
                    <div class="iphone-mockup">
                        <div class="screen"></div>
                    </div>
                </div>
                <div class="col-md-6 col-md-pull-3 get-it">
                    <h1>Resume Creator </h1>
                    <p>Are you tired of manually making and changing resumes for different jobs? Use our software to build and export easy to make resumes.</p>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <section class="features">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Resume Creator Features</h2>
                    <p>Our software allows you to customize your resume as you like whiile also providing structure. Feel free to explore the many templates we have.</p>
                </div>
                <div class="col-md-6">
                    <div class="row icon-features">
                        <div class="col-xs-4 icon-feature"><i class="fa fa-flash" style="font-size:60px;"></i>
                            <p>Fast and Responsive</p>
                        </div>
                        <div class="col-xs-4 icon-feature"><i class="glyphicon glyphicon-export"></i>
                            <p>Export to PDF</p>
                        </div>
                        <div class="col-xs-4 icon-feature"><i class="material-icons" style="font-size:60px;">image</i>
                            <p>Custom Templates</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h5>Resume Creator © 2017</h5></div>
                <div class="col-sm-6 social-icons"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
            </div>
        </div>
    </footer>
    <div class="modal fade" role="dialog" tabindex="-1" id="modal1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Log In</h4></div>
                <div class="modal-body">
                    <p>Welcome to Resume Creator! Please log in with your credentials.</p>
                    <form method="post">
                        <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
                        <?php if(isset($fmsg2)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg2; ?> </div><?php } ?>
                    <div id="email">
                        <label>Email: </label>
                        <div id="emailbox">
                            <input class = "modal-body" name = "emailin" placeholder = "Email" type = "text"/>
                        </div>
                    </div>
                    <div id="password">
                        <label>Password: </label>
                        <div id="pwbox">
                            <div>
                                <input class = "modal-body" name = "passwordin" placeholder = "Choose a Password" type = "password"/>
                            </div>
                        </div>
                    </div>
                    <p> </p>
                    <p>If you are new, register
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal2" style="height:24px;padding:2px;" data-dismiss="modal">here </button>
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Log in</button>
                </div>
              </form>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="modal2">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Register </h4></div>
                <div class="modal-body">
                    <p>Welcome to Resume Creator! Please register your account.</p>
                    <form method="post">
                        <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
                        <?php if(isset($fmsg1)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg1; ?> </div><?php } ?>
                    <div id="name">
                        <label>Full Name:</label>
                        <div id="namebox">
                            <input class = "modal-body" name = "name" placeholder = "Name" type = "text"/>
                        </div>
                    </div>
                    <div id="email">
                        <label>Email: </label>
                        <div id="emailbox">
                            <input class = "modal-body" name = "email" placeholder = "Email Address" type = "text"/>
                        </div>
                    </div>
                    <div id="password">
                        <label>Password: </label>
                        <div id="pwbox">
                            <div></div>
                            <input class = "modal-body" name = "password" placeholder = "Choose a Password" type = "password"/>
                        </div>
                    </div>
                    <p> </p>
                    <p>If you already have an account, login
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal1" style="height:24px;padding:2px;" data-dismiss="modal">here </button>
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#modal2">Register</button>
                </div>
              </form>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/modal.js"></script>
</body>

</html>
