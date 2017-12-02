
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Creator</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,400italic">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="shortcut icon" href="favicon.png">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="json-builder/css/json-builder.css">
	  <link rel="stylesheet" href="css/bootstrap.css">
	  <link rel="stylesheet" href="css/style.css">
    <script>
            function setup() {
                document.getElementById('buttonid').addEventListener('click', openDialog);
                function openDialog() {
                    document.getElementById('fileid').click();
                }
                document.getElementById('fileid').addEventListener('change', submitForm);
                function submitForm() {
                    document.getElementById('formid').submit();
                }
            }
        </script>
</head>

<body class="preload">
    <aside id="sidebar">
		<div id="panel">
			<div class="inner">
			<div class="actions">
				<button id="export" class="button" data-placement="bottom" title="Download JSON"></button>
				<!--<button id="upload" class="button" data-placement="bottom" title="Upload Image"></button>!-->
        <a href="javascript:clickupload()" class="button">Upload Image</a>
        <form id='formid' action="upload.php" method="POST" enctype="multipart/form-data">
          <input type="file" id="my_file" name="my_file" style="display: none;" onchange="javascript:this.form.submit();"/>
        </form>
        <!--<form id='formid' action="upload.php" method="POST" enctype="multipart/form-data">
            <input id='fileid' type='file' name='filename' hidden/>
            <input id='buttonid' type='button' value='Upload MB' />
            <input type='submit' value='Submit' />
        </form>!-->
        <!--<form action="upload.php" method="post" enctype="multipart/form-data">
          Select image to upload:
          <input type="file" name="fileToUpload" id="fileToUpload">
          <input type="submit" value="Upload Image" name="submit">
        </form>!-->
				<button id="reset" class="button hidden">Reset</button>
				<button id="clear" class="button">Clear</button>
        <!--<button id="pdf" class="button">Export to PDF</button>!-->
        <a href="javascript:printFrame()" class="button">Print</a>
			</div>
			<div class="theme">
				Current theme:
				<strong id="theme-current"></strong>
			</div>
			<div class="tabs">
				<a href="#editor" data-toggle="tab" class="active">Editor</a>
				<a href="#themes" data-toggle="tab">Themes</a>
			</div>
			<div class="view">
				<a href="" class="active" data-type="html">HTML</a>
				<a href="" data-type="json">JSON</a>
			</div>
		</div>
		</div>
		<div id="editor" class="tab-pane active">
			<div class="tse-scrollable">
				<div id="form" class="tse-content"></div>
			</div>
		</div>
		<div id="themes" class="tab-pane">
			<div class="tse-scrollable">
				<div id="themes-list" class="tse-content">
					<a href="" class="item">
						<span class="version"></span>
						<span class="name"></span>
					</a>
				</div>
			</div>
		</div>
	</aside>
	<div id="preview">
		<div id="overlay"></div>
		<textarea id="json-editor"></textarea>
		<div id="iframe-wrapper" type="application/pdf">
			<iframe id="iframe" type="application/pdf"></iframe>
		</div>
	</div>

	<div class="modal" id="register-modal" tabindex="-1">
		<div class="modal-dialog" style="width: 400px;">
			<form class="register-form">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Register an Account</h4>
					</div>
					<div class="modal-body">
						<input type="text" class="form-control register-email" placeholder="Email" required autofocus><br />
						<input type="text" class="form-control register-username" placeholder="Username" required><br />
						<input type="password" class="form-control register-password" placeholder="Password" required>
					</div>
					<div class="modal-footer">
						<button type="submit" class="button">Register</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="modal" id="login-modal" tabindex="-1">
		<div class="modal-dialog" style="width: 400px;">
			<form class="login-form">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Login to your Account</h4>
					</div>
					<div class="modal-body">
						<input type="text" class="form-control login-email" value="thomasalwyndavis@gmail.com" placeholder="Email" required autofocus><br />
						<input type="password" class="form-control login-password" placeholder="Password" value="" required>
					</div>
					<div class="modal-footer">
						<button type="submit" class="button">Login</button>
					</div>
			</form>
			</div>
		</div>
	</div>
	<div class="modal" id="publish-modal" tabindex="-1">
		<div class="modal-dialog" style="width: 400px;">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Publish</h4>
				</div>
				<div class="modal-body">
					<p>Publishing...</p>
				</div>
			</div>
		</div>
	</div>
  <script>
  function printFrame() {
            $("iframe").get(0).contentWindow.print();
          }
  </script>
  <script>
        function clickupload() {
        $("input[id='my_file']").click();
        }
  </script>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/modal.js"></script>
    <script src="js/libs.min.js"></script>
  	<script src="json-builder/src/builder.js"></script>
  	<script src="json-builder/src/builder.templates.js"></script>
  	<script src="js/main.js"></script>
</body>

</html>
