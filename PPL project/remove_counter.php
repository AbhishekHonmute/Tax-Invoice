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
			height: 700px;
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
			padding-bottom: 50px;
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
		#sub_header {
			font-size: 25px;
			font-family: Trebuchet MS;
		}
	</style>
</head>
<body>
	<?php
		session_start();
        if(!isset($_SESSION['login_user']))
        {
            header("location: main.php");
        }
        $adminname=$_SESSION['login_user'];
	?>
	<?php 
	$done = 0;
	$username = "";
	$password = "";
	$username_err = "Counter Username";
	$password_err = "Admin Password";
	$username_exists_err = "";
	function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST['username'])) {
			$username_err = "Counter Username is required";
		} else {
			$username = test_input($_POST['username']);
			$done = $done + 1;
		}
		if (empty($_POST['password'])) {
			$password_err = "Admin Password is required";
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
			  		<h3 id="header">REMOVE COUNTER</h3>
			  		<p id="sub_header">Admin : <?php echo $adminname; ?></p>
			  		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  name="new_admin_login" autocomplete="off">
						<input type="text" placeholder="<?php echo $username_err;?>" class="inputs" pattern=".{5,}" title="Five or more characters" name="username" value="<?php echo $username;?>"><br><br>
						<input type="text" placeholder="<?php echo $password_err;?>" class="inputs" pattern=".{5,}" title="Five or more characters" name="password" value="<?php echo $password;?>"><br><br>
						<button class="login_button" type="submit">Remove Counter</button>
			  		</form>
			  		<button class="back" onclick="document.location = 'admin_home_page.php'" target="_blank">Back</button>
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
				$sql = "SELECT username, admin FROM login_details_table WHERE username = '".$username."'";
				if ($result = mysqli_query($conn, $sql)) {
					$row = mysqli_num_rows($result);
					if ($row == 0) {
						echo '<script language="javascript">';
						echo 'alert("Counter Username Not Found")';
						echo '</script>';
					} else {
						$row = mysqli_fetch_assoc($result);	
						if ($row['admin'] != 1) {
							$sql = "SELECT admin, password FROM login_details_table WHERE admin = '1'";
							if ($result = mysqli_query($conn, $sql)) {
								$row_admin = mysqli_fetch_assoc($result);
								if (strcasecmp($row_admin["password"], $password) == 0) {
									$sql = "DELETE FROM login_details_table WHERE username = '".$username."'";
									if ($conn->query($sql)) {
										$conn->close();
										?>
										<script type="text/javascript">
											alert("Counter Removed Successfully!!");
											window.location.replace('remove_counter.php');
										</script>
										<?php
									}else {
										echo "query failed";
									}
								}else {
									echo '<script language="javascript">';
									echo 'alert("Incorrect Admin Password")';
									echo '</script>';
								}
							} else {
								echo "query failed".$conn->error;
							}
						} else {
							echo '<script language="javascript">';
							echo 'alert("Admin Account Can Not Be Removed")';
							echo '</script>';
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