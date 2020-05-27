<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		html, body {
			margin: 0;
			height: 100%; 
			/*overflow: hidden;
*/			background-color: #C8C8C8; 
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
		input.inputs {
			height: 30px;
			width: 250px;
			border-radius: 5px;
			border : solid 2px #FF0000;
			padding: 10px 20px;
  			margin: 8px 0;
  			font-family: Arial;
  			font-size: 18px;
		}
		#header {
			font-family:  Trebuchet MS;
			font-size: 22px;
		}
		button.back {
			width: 60px;
			height: 30px;
			float: left;
			text-transform: uppercase;
			background: #FF0000;
			font-family: Verdana;
			font-size: 15px;
			color: #fff !important;
			border: none;
			border-radius: 5px;
		}
		button.back:hover {
			width: 65px;
			background: #434343;
			letter-spacing: 1px;
			box-shadow: 0px 0px 30px 5px #FF0000 ;
			transition: all 0.1s ease 0s;
		}
	</style>
</head>
<body>
	<?php 
	$done = 0;
	$username = "";
	$password = "";
	$username_err = "Username";
	$password_err = "Password";
	function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST['username'])) {
			$username_err = "Username is required";
		} else {
			$username = test_input($_POST['username']);
			$done = $done + 1;
		}
		if (empty($_POST['password'])) {
			$password_err = "Password is required";
		} else {
			$password = test_input($_POST['password']);
			$done = $done + 1;
		}
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
			  		<h4 id="header">Counter Login</h4>
			  		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  name="counter_login" autocomplete="off">
						<input type="text" placeholder="<?php echo $username_err;?>" class="inputs" pattern=".{5,}" title="Five or more characters" name="username" value="<?php echo $username;?>"><br><br>
						<input type="password" placeholder="<?php echo $password_err;?>" class="inputs" pattern=".{5,}" title="Five or more characters" name="password" value="<?php echo $password;?>"><br><br>
						<button class="login_button" type="submit">Log In</button>
			  		</form>
			  		<button class="back" onclick="document.location = 'main.php'" target="_blank">Back</button>
			  	</div>
			</th>
		</tr>
	</table>
	<?php 
		if ($done == 2) {	
			$db_servername = "localhost";
			$db_username = "root";
			$db_password = "";
			$db1_name = "login_details";
			if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
				$sql = "SELECT username, password, admin FROM login_details_table WHERE username = '".$username."'";
				if ($result = mysqli_query($conn, $sql)) {
					$row = mysqli_num_rows($result);
					if ($row == 0) {
						echo '<script language="javascript">';
						echo 'alert("Username Not Found")';
						echo '</script>';
					} else {
						$row = mysqli_fetch_assoc($result);	
						if ($row['admin'] == 0) {
							if (strcasecmp($row["password"], $password) == 0) {
								echo "valid admin";	
								$login = 1;
								session_start();
								$_SESSION['login_user'] = $username;
								header("location: counter_home_page.php");
							}else {
								echo '<script language="javascript">';
								echo 'alert("Incorrect Password")';
								echo '</script>';
							}
						} 
					}
				}else {
					echo "query failed".$conn->error;
				}
				$conn->close();
			} else {
				echo "connection to database failed";
			}
			
		}	
	?>
</body>
</html>