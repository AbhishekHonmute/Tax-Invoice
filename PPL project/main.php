<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		html, body {
			margin: 0;
			height: 100%; 
			background-color: #C8C8C8; 
		}
		table, tr, th {
			border-collapse: collapse;
		}
		table {
			width: 1000px;
			height: 450px;
			margin: auto;
			position: absolute;
			top:0;
			bottom: 0;
			left: 0;
			right: 0;
			box-shadow: 0px 0px 30px 5px;
		}
		#left {
			width: 500px;
			background-color: white;
		}
		#right {
			width: 500px;
			background-color: white;
		}
		button.login_button {
			width: 250px;
			color: #fff !important;
			text-transform: uppercase;
			text-decoration: none;
			background: #FF0000;
			padding: 20px;
			border-radius: 5px;
			display: inline-block;
			border: none;
			transition: all 0.4s ease 0s;
			font-family: Verdana;
			font-size: 15px; 
		}
		button.login_button:hover {
			background: #434343;
			width: 300px;
			letter-spacing: 1px;
			box-shadow: 0px 0px 30px 5px #FF0000 ;
			transition: all 0.1s ease 0s;
		}
		button.login_button:active {
			background-color: #434343 ;
            color: rgba(255, 255, 255, 1);
  			box-shadow: 0px 0px 30px 5px #434343 ;
		}
	</style>
</head>
<body>
	<?php 
		$db_servername = "localhost";
		$db_usrname = "root";
		$db_password = "";
		$db1_name = "login_details";
		try {	
			$conn = mysqli_connect($db_servername, $db_usrname, $db_password);
		} catch (Exception $ex) {
			die("Failed to connect to SQL server. Please make sure that you have connected to it.");
		}
		$sql = "SELECT SCHEMA_NAME
  			FROM INFORMATION_SCHEMA.SCHEMATA
 			WHERE SCHEMA_NAME = 'login_details'";
		if ($result = mysqli_query($conn, $sql)) {
			$row = mysqli_num_rows($result);
			if ($row == 0) {
				// echo "no database";
				?>
				<script type="text/javascript">
					window.location.href = 'new_admin_login.php';
				</script>
				<?php
			}
		} else {
			echo "query error";
		}
	?>
	<table>
		<tr>
			<th id="left">
			  	<div>
			    	<img src="invoice.png" alt="invoice">
			  	</div>
			</th>
			<th id="right">
			  	<div>
			    	<button class="login_button" onclick="document.location = 'admin_login.php'" target="_blank">Admin Login</button><br><br><br><br>
			    	<button class="login_button" onclick="document.location = 'counter_login.php'" target="_blank">Counter Login</button>
			  	</div>
			</th>
		</tr>
	</table>
</body>
</html>