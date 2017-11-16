<html>
    <?php
        session_start();
        if(isset($_SESSION['username'])){
            echo "User Logged In: " . $_SESSION['username'];
        } 
        else {
            header('Location: index.html');
	   }
        
    ?>
    
    <script src="script1.js" language="Javascript" type="text/javascript"></script>
    <head>
        <meta charset="utf-8">
        <title>CV Information Page</title>
    </head>
    <body>
        <h1>Input your work information here:</h1>
        
        <form class="form" action="save.php" method="post" enctype="multipart/form-data">
            <label for="photo">Add Profile Image: </label>
            <input type="file" name="photo" id="photo">
            <br>
            <fieldset>
                <legend>Personal Information</legend>
                    <label for="name">Full name: </label>
                    <input type="text" placeholder="Full Name" name="_name" id="name"/>
                    <label for="address">Address: </label>
                    <input type="text" placeholder="Address" name="_address" id="address"/>
                    <label for="email">Email: </label>
                    <input type="email" placeholder="Email" name="_email" id="email"/>
                    <label for="phone">Phone Number: </label>
                    <input type="tel" placeholder="Phone Number(###-###-####)" name="_phone" id="phone"/>
            </fieldset>
            <br>
            <fieldset>
                <legend>Education History</legend>
                    <h3>Education #1:</h3>
                    <label for="school">University: </label>
                    <input type="text" placeholder="University Name" name="_school" id="school"/>
                    <label for="degree">Degree: </label>
                    <input type="text" placeholder="Degree i.e. AA, BS, etc." name="_degree" id="degree"/>
                    <label for="major">Major: </label>
                    <input type="text" placeholder="Major" name="_major" id="major"/>
                    <label for="gpa">GPA: </label>
                    <input type="text" placeholder="GPA" name="_gpa" id="gpa"/>
                    <label for="grad">Graduation Date: </label>
                    <input type="text" placeholder="Month Year" name="_grad" id="grad"/>
                    <br><br>
                    <h3>Education #2:</h3>
                    <label for="school2">University: </label>
                    <input type="text" placeholder="University Name" name="_school2" id="school2"/>
                    <label for="degree2">Degree: </label>
                    <input type="text" placeholder="Degree i.e. AA, BS, etc." name="_degree2" id="degree2"/>
                    <label for="major2">Major: </label>
                    <input type="text" placeholder="Major" name="_major2" id="major2"/>
                    <label for="gpa2">GPA: </label>
                    <input type="text" placeholder="GPA" name="_gpa2" id="gpa2"/>
                    <label for="grad2">Graduation Date: </label>
                    <input type="text" placeholder="Month Year" name="_grad2" id="grad2"/>
            </fieldset>
            <br>
            <fieldset>
                <legend>Work History</legend>
                    <h3>Work History #1:</h3>
                    <label for="company">Company Name: </label>
                    <input type="text" placeholder="Company Name" name="_company" id="company"/>
                    <label for="title">Position Title: </label>
                    <input type="text" placeholder="Position Title" name="_title" id="title"/>
                    <br>
                    <label for="begin">Beginning Date: </label>
                    <input type="text" placeholder="Enter year, month year" name="_begin" id="begin"/>
                    <label for="end">End Date: </label>
                    <input type="text" placeholder="Enter year, month year, current" name="_end" id="end"/>
                    <br>
                    <label for="respo">Responsibilities: </label>
                    <textarea name="_workResp" id="respo" placeholder="Enter summary" rows="10" cols="30"></textarea>
                    <br><br>
                    <h3>Work History #2:</h3>
                    <label for="company2">Company Name: </label>
                    <input type="text" placeholder="Company Name" name="_company2" id="company2"/>
                    <label for="title2">Position Title: </label>
                    <input type="text" placeholder="Position Title" name="_title2" id="title2"/>
                    <br>
                    <label for="begin2">Beginning Date: </label>
                    <input type="text" placeholder="Enter year, month year" name="_begin2" id="begin2"/>
                    <label for="end2">End Date: </label>
                    <input type="text" placeholder="Enter year, month year, current" name="_end2" id="end2"/>
                    <br>
                    <label for="respo2">Responsibilities: </label>
                    <textarea name="_workResp2" id="respo2" placeholder="Enter summary" rows="10" cols="30"></textarea>
                    <br><br>
                    <h3>Work History #3:</h3>
                    <label for="company3">Company Name: </label>
                    <input type="text" placeholder="Company Name" name="_company3" id="company3"/>
                    <label for="title3">Position Title: </label>
                    <input type="text" placeholder="Position Title" name="_title3" id="title3"/>
                    <br>
                    <label for="begin3">Beginning Date: </label>
                    <input type="text" placeholder="Enter year, month year" name="_begin3" id="begin3"/>
                    <label for="end3">End Date: </label>
                    <input type="text" placeholder="Enter year, month year, current" name="_end3" id="end3"/>
                    <br>
                    <label for="respo3">Responsibilities: </label>
                    <textarea name="_workResp3" id="respo3" placeholder="Enter summary" rows="10" cols="30"></textarea>
            </fieldset>
            <br>
            <fieldset>
                <legend>Related Skills</legend>
                    <label for="skills">Skills: </label>
                    <textarea name="_skills" id="skills" placeholder="Enter skills" rows="10" cols="30"></textarea>
            </fieldset>
            <fieldset>
                <legend>Optional Section</legend>
                <div id="dynamicInput">
                </div>
                <input type="button" value="Add Section" id="newSection" onClick="addInput('dynamicInput');">
            </fieldset>
            
            <input type="submit" value="Submit"/>
        </form>
    </body>
</html>