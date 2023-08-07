<!DOCTYPE html>
<html>
<head>
	<title>Insert data in MySQL database using Ajax</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="mystyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div id="targetLegit"> </div>
<p id="target">
</p>    
<script>
$(document).ready(function() {
$('#targetLegit').load('show2.php');	
$('#butsave').on('click', function() {
let name = $('#name').val();
let email = $('#email').val();
	$.ajax({
		url: "save2.php",
		type: "POST",
		data: {
			name: name,
			email: email
		},
		cache: false,
		success: function(dataResult){
			dataResult = JSON.parse(dataResult);
			if(dataResult.statusCode==200){
				$("#butsave").removeAttr("disabled");
				$('#fupForm').find('input:text').val('');
				$("#success").show();
				$('#success').html('Data added successfully !'); 	
				$('#targetLegit').load('show2.php');
			}
			else if(dataResult.statusCode==201){
				alert("Error occured !");
			}
			
		
	}

	});
});
});
</script>
<?php
session_start();
  if(!isset($_SESSION['user_id'])){
        echo "You're not logged in<br>";
        echo <<<EOT
<a href="login2.php"><img src="loginicon.png"></a>
</a><br>
<a href="register2.php"><img src="RegisterButton.png"></a>
</p>
EOT;
        exit;
    } else {
    	        echo <<<EOT
        <p> FORUM CODE HERE </p>
<div style="margin: auto;width: 60%;">
	<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<form id="fupForm" name="form1" method="post">
		<div class="form-group">
			<label for="email">Name:</label>
			<input type="text" class="form-control" id="name" placeholder="Name" name="name">
		</div>
		<div class="form-group">
			<label for="pwd">Email:</label>
			<input type="email" class="form-control" id="email" placeholder="Email" name="email">
		</div>
		<input type="button" name="save" class="btn btn-primary btn-lg" value="Save to Database" id="butsave">
	</form>
</div>
</body>
EOT;
   echo "Yo you're logged in"; 
    }
?>
      <p>Log-out icon on a styled link button:
        <a href="logout2.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Log Out
        </a>
      </p>

</html>