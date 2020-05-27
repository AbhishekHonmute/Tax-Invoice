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
			width: 600px;
			height: 730px;
			margin: auto;
			position: absolute;
			top:0;
			bottom: 0;
			left: 0;
			right: 0;
			box-shadow: 0px 0px 30px 5px;
			margin-top: 50px;
			margin-bottom: 50px;
		}
		#box {
			width: 500px;
			background-color: white;
			padding-bottom: 70px;
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
  			margin: 14px 0;
  			font-family: Arial;
  			font-size: 18px;
		}
		#header {
			font-family:  Trebuchet MS;
			font-size: 30px;
			line-height: 20px;
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
			margin: 40px;
		}
		button.back:hover {
			width: 65px;
			background: #434343;
			letter-spacing: 1px;
			box-shadow: 0px 0px 30px 5px #FF0000 ;
			transition: all 0.1s ease 0s;
		}
		label.gend {
			font-size: 20px;
			font-family: Arial;
		}
		#gender_err {
			color: #FF0000;
		}
	</style>
</head>
<body>
	<!-- creating database if not exists -->
	<?php 
		$db_servername = "localhost";
		$db_usrname = "root";
		$db_password = "";
		$db1_name = "login_details";
		$db2_name = "products_stock";
		$database_done = 0;
		try {	
			$conn = mysqli_connect($db_servername, $db_usrname, $db_password);
		} catch (Exception $ex) {
			die("Failed to connect to SQL server. Please make sure that you have connected to it.");
		}
		$sql = "CREATE DATABASE IF NOT EXISTS products_stock";
		if ($conn->query($sql)) {
			$database_done = $database_done + 1;
			$conn->close();
			$conn = mysqli_connect($db_servername, $db_usrname, $db_password, $db2_name); 
			$sql = "CREATE TABLE IF NOT EXISTS products_stock_table (
	            product_name VARCHAR(255) NOT NULL UNIQUE,
	            product_id INT(16) NOT NULL UNIQUE,
	            product_discription VARCHAR(255) ,
	            product_brand VARCHAR(255) ,
	            product_rate INT(16) NOT NULL,
	            quantity INT(16) DEFAULT '0'
	            )";	
			if (mysqli_query($conn, $sql)) {
				$conn->close();
			} else {
				echo '<script type="text/javascript">';
				echo '	alert("Unable to create table products_stock_table!!");';
				echo '</script>';
			}
		} else {
			echo '<script type="text/javascript">';
			echo '	alert("Unable to create database products_stock!!");';
			echo '</script>';
		}

		$conn = mysqli_connect($db_servername, $db_usrname, $db_password);
		$sql = "CREATE DATABASE IF NOT EXISTS login_details";
		if ($conn->query($sql)) {
			$database_done = $database_done + 1;
			$conn->close();
			$conn = mysqli_connect($db_servername, $db_usrname, $db_password, $db1_name); 
			$sql = "CREATE TABLE IF NOT EXISTS login_details_table (
	            admin INT(16) NOT NULL DEFAULT '0',
	            fullname VARCHAR(255) NOT NULL,
				gender VARCHAR(30) NOT NULL,
				email VARCHAR(255) NOT NULL UNIQUE,
	            username VARCHAR(255) NOT NULL PRIMARY KEY UNIQUE,
				password VARCHAR(255) NOT NULL
	            )";	
			if (mysqli_query($conn, $sql)) {
				$conn->close();
			} else {
				echo '<script type="text/javascript">';
				echo '	alert("Unable to create table login_details_table!!");';
				echo '</script>';
			}
		} else {
			echo '<script type="text/javascript">';
			echo '	alert("Unable to create database login_details!!");';
			echo '</script>';
		}
	?>

	<?php 
	$done = 0;
	$fullname = "";
	$gender = "";
	$email = "";
	$username = "";
	$password = "";
	$fullname_err = "Full Name";
	$email_err = "Email";
	$username_err = "Username";
	$password_err = "Password";
	$gender_err = "";
	$admin = 1;
	$invalid_name_err = "";
	$invalid_email_err = "";
	$email_exists_err = "";
	$username_exists_err = "";
	function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST['fullname'])) {
			$fullname_err = "First Name is required";
		} else {
			$fullname = test_input($_POST['fullname']);
			if (!preg_match("/^[a-zA-Z ]*$/", $fullname)) {
				$invalid_name_err = "Only letters and whitespace is allowed in name";
			} else {
				$done = $done + 1;
			}
		}
		if (empty($_POST['gender'])) {
			$gender_err = "Gender is required";
		} else {
			$gender = test_input($_POST['gender']);
			$done = $done + 1;
		}
		if (empty($_POST['email'])) {
			$email_err = "Email is required";
		} else {
			$email = test_input($_POST['email']);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$invalid_email_err = "Inavlid email format";
			} else {
				$done = $done + 1;
			}
		}
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
			<th id="box">
			  	<div>
			  		<h4 id="header">ADD ADMIN</h4>
			  		<p><b>Remember that there will be only one admin</b></p>
			  		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  name="new_admin_login" autocomplete="off">
			  			<input type="text" placeholder="<?php echo $fullname_err;?>" class="inputs" name="fullname" value="<?php echo $fullname;?>"><p id="gender_err"><?php echo $invalid_name_err;?></p>
			  			<input type="radio" name="gender" value="Male"  <?php if (isset($gender) && $gender == "Male") echo "checked";?>><label class="gend">Male</label>&nbsp&nbsp&nbsp&nbsp&nbsp
			  			<input type="radio" name="gender" value="Female" <?php if (isset($gender) && $gender == "Female") echo "checked";?>><label class="gend">Female</label>&nbsp&nbsp&nbsp&nbsp&nbsp
			  			<input type="radio" name="gender" value="Other" <?php if (isset($gender) && $gender == "Other") echo "checked";?>><label class="gend">Other</label>
			  			<p id="gender_err"><?php echo $gender_err;?></p>
			  			<input type="text" placeholder="<?php echo $email_err;?>" class="inputs" name="email" value="<?php echo $email;?>"><p id="gender_err"><?php echo $invalid_email_err;?></p><br>
						<input type="text" placeholder="<?php echo $username_err;?>" class="inputs" pattern=".{5,}" title="Five or more characters" name="username" value="<?php echo $username;?>"><br><br>
						<input type="password" placeholder="<?php echo $password_err;?>" class="inputs" pattern=".{5,}" title="Five or more characters" name="password" value="<?php echo $password;?>"><br><br>
						<button class="login_button" type="submit">Add As Admin</button>
			  		</form>
			  		<!-- <button class="back" onclick="document.location = 'main.php'" target="_blank">Back</button> -->
			  	</div>
			</th>
		</tr>
	</table>
	<?php 
		if ($done == 5) {	
			$db_servername = "localhost";
			$db_username = "root";
			$db_password = "";
			$db1_name = "login_details";
			if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
				$sql = "SELECT email FROM login_details_table WHERE email = '".$email."'";
				if ($result = mysqli_query($conn, $sql)) {
					$row = mysqli_num_rows($result);
					if ($row >= 1) {
						echo '<script language="javascript">';
						echo 'alert("Email Already Exists")';
						echo '</script>';
					} else {
						$sql = "SELECT username FROM login_details_table WHERE username = '".$username."'";
						if ($result = mysqli_query($conn, $sql)) {
							$row = mysqli_num_rows($result);	
							if ($row >= 1) {
								echo '<script language="javascript">';
								echo 'alert("Username Already Exists")';
								echo '</script>';
							} else {
								$sql = "INSERT INTO login_details_table (admin, fullname, gender, email, username, password) 
								VALUES ('$admin', '$fullname', '$gender', '$email', '$username', '$password')";
								if ($conn->query($sql)) {
									$conn->close();
									?>
									<script type="text/javascript">
									window.location.href = 'main.php';
									</script>
									<?php
								}else {
									echo "query failed";
								}
							}
						} else {
							echo "query failed".$conn->error; 
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