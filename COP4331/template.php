<?php
    $mysqli = new mysqli('localhost', 'root', '', 'CV_DB');

    if(!$mysqli){
        die("Connection failed: ".mysqli_connect_error()); 
    }

    session_start();
    
    if(isset($_SESSION['username'])){
        echo "User Logged In: " . $_SESSION['username'];
    } 
    else {
        header('Location: index.html');
    }
    
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $rows = $mysqli->query($sql);
    $row = mysqli_fetch_array($rows, MYSQL_ASSOC);
        
?>

<html>
    <head>
        <title>Your Template Here!</title>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
          $( function() {
            $( ".draggable" ).draggable();
          } );
        </script>
    </head>
    <link rel="stylesheet" href="temp.css">
    <link rel="stylesheet" href="print.css" media="print">
    <body>
        <?php
            if(!empty($row['image'])){
                echo '<img src="data:image/jpeg;base64,'. base64_encode($row['image']) . '" id="photo" class="draggable" />';
            }
        ?>
        <div id="personal-info" class="draggable">
            <?php
                echo "<div id = 'name'>" .$row['name'] . "</div>";
                echo "<div id = 'address'>" .$row['address'] . "</div>";
                echo "<div id = 'email'>" .$row['email'] . "</div>";
                echo "<div id = 'phone'>" .$row['phone'] . "</div>";
            ?>
        </div>
        <?php
            if(!empty($row['university1'])){
                echo "<div id = 'education' class='draggable'>";
                    echo "<div id = 'uni1'>";
                        echo "<div id = 'u_name1'>" .$row['university1'] . "</div>";
                        echo "<div id = 'degree_major1'>" .$row['degree1'] . " in " .$row['major1'] . "</div>";
                        echo "<div id = 'gpa1'>" .$row['gpa1'] . "</div>";
                        echo "<div id = 'gradDate1'>" .$row['grad1'] . "</div>";
                    echo "</div>";
                    if(!empty($row['university2'])){
                        echo "<br>";
                        echo "<div id = 'uni2'>";
                            echo "<div id = 'u_name2'>" .$row['university2'] . "</div>";
                            echo "<div id = 'degree_major2'>" .$row['degree2'] . " in " .$row['major2'] . "</div>";
                            echo "<div id = 'gpa2'>" .$row['gpa2'] . "</div>";
                            echo "<div id = 'gradDate2'>" .$row['grad2'] . "</div>";
                        echo "</div>";
                    }
                
                echo "</div>";
            }
        
            if(!empty($row['company1'])){
                echo "<div id = 'work' class='draggable'>";
                    echo "<div id = 'work1'>";
                        echo "<div id = 'company1'>" .$row['company1'] . "</div>";
                        echo "<div id = 'title1'>" .$row['title1'] . "</div>";
                        echo "<div id = 'dates1'>" .$row['begin1'] . " - " .$row['end1'] . "</div>";
                        echo "<div id = 'resp1'>" .$row['resp1'] . "</div>";
                    echo "</div>";
                    if(!empty($row['company2'])){
                        echo "<br>";
                        echo "<div id = 'work2'>";
                            echo "<div id = 'company2'>" .$row['company2'] . "</div>";
                            echo "<div id = 'title2'>" .$row['title2'] . "</div>";
                            echo "<div id = 'dates2'>" .$row['begin2'] . " - " .$row['end2'] . "</div>";
                            echo "<div id = 'resp2'>" .$row['resp2'] . "</div>";
                    echo "</div>";
                    }
                    if(!empty($row['company3'])){
                        echo "<br>";
                        echo "<div id = 'work3'>";
                            echo "<div id = 'company3'>" .$row['company3'] . "</div>";
                            echo "<div id = 'title3'>" .$row['title3'] . "</div>";
                            echo "<div id = 'dates2'>" .$row['begin3'] . " - " .$row['end3'] . "</div>";
                            echo "<div id = 'resp3'>" .$row['resp3'] . "</div>";
                    echo "</div>";
                    }
                
                echo "</div>";
            }
        
            if(!empty($row['skills'])){
                echo "<div id = 'skills' class='draggable'>";
                    echo "<div id ='skillTitle'>Related Skills</div>";
                    echo "<div id = 'relatedSkills'>" .$row['skills'] . "</div>";
                echo "</div>";
            }
        
            if(!empty($row['optTitle'])){
                echo "<div id = 'optional' class='draggable'>";
                    echo "<div id ='optTitle'>" . $row['optTitle'] . "</div>";
                    echo "<div id = 'opt'>" .$row['optional'] . "</div>";
                echo "</div>";
            }
        ?>
    </body>
</html>
