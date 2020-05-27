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
	$product_id = "";
	$quantity = "";
	$product_id_err = "Product ID";
	$quantity_err = "Quantity";
	function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST['product_id'])) {
			$product_id_err = "Product ID is required";
		} else {
			$product_id = test_input($_POST['product_id']);
			$done = $done + 1;
		}
		if (empty($_POST['quantity'])) {
			$quantity_err = "Quantity is required";
		} else {
			$quantity = test_input($_POST['quantity']);
			$done = $done + 1;
		}
	}		
	?>
	<table>
		<tr>
			<th id="box">
			  	<div>
			  		<h4 id="header">ADD PRODUCT STOCK</h4>
			  		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"  name="add_stock" autocomplete="off">
						<input type="number" placeholder="<?php echo $product_id_err;?>" class="inputs" min = 99999 name="product_id" value="<?php echo $product_id;?>"><br><br>
						<input type="number" placeholder="<?php echo $quantity_err;?>" class="inputs" name="quantity" value="<?php echo $quantity;?>"><br><br>
						<button class="login_button" type="submit">Add Stock</button>
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
			$db1_name = "products_stock";
			if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
				$sql = "SELECT product_id, quantity FROM products_stock_table WHERE product_id = '".$product_id."'";
				if ($result = mysqli_query($conn, $sql)) {
					$row = mysqli_num_rows($result);
					if ($row == 0) {
						echo '<script language="javascript">';
						echo 'alert("Product Not Found. Please Add the Product!!")';
						echo '</script>';
					} else {
						$row = mysqli_fetch_assoc($result);	
						$new_quantity = $row['quantity'];
						$new_quantity = $new_quantity + $quantity;
						$sql = "UPDATE products_stock_table
								SET quantity = '".$new_quantity."'
								WHERE product_id = '".$product_id."'";
						if (mysqli_query($conn, $sql)) {
							?>
							<script type="text/javascript">
								alert("Stock Added Successfully!!");
								window.location.replace('add_stock.php');
							</script>
							<?php
						} else {
							echo "query failed";
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