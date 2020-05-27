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
		table.frame, tr.frame, th.frame {
			border-collapse: collapse;
		}
		table.frame {
			width: 600px;
			height: 900px;
			margin: auto;
			position: absolute;
			background-color: white;
			top:0;
			bottom: 0;
			left: 0;
			right: 0;
			box-shadow: 0px 0px 30px 5px;
			margin-top: 50px;
			margin-bottom: 50px;
		}
		th.frame {
			padding-top: 4px;
		}
		#box {
			width: 500px;
			background-color: white;
		}
		table.bill_table {
			border-collapse: collapse;
			width: 600px;
		}
		tr.header {
			background-color: #FF0000;
			height: 100px;
		}
		.address {
			text-align: left;
			padding-left: 20px;
		}
		th {
			padding-left: 10px;
			padding-right: 10px;
		}
		#main_header {
			font-size: 28px;
			font-family:Arial;
			text-align: left;
			line-height: 20px;
		}
		td.customer_info {
			height: 180px;
		}
		.left {
			border-left: 2px solid black;
		}
		.sign {
			height: 60px;
		}
		button {
			margin-top: 1000px;
			margin-left: 200px;
		}/*
		.white {
			color : white;
		}*/
		.main_address {
			line-height: 20px;
		}
		#date {
			width: 150px;
			border: none;
			background-color: #FF0000;
			font-weight: bold;
			font-size: 17px;
			font-family: Times New Roman;
			letter-spacing: 1px;
		}
		#invoice_no {
			width: 95px;
			border: none;
			background-color: #FF0000;
			font-family:Arial;
			font-size: 18px;
			letter-spacing: 1px;
			text-align: center;
		}
		textarea, label {
			font-size: 15px;
			font-family:Trebuchet MS;
			font-weight: bold;
		}
		.red {
			background-color: red;
		}
		.phone, .email {
			height: 20px;
			font-size: 15px;
			font-family: Trebuchet MS;
			margin: 2px;
		}
		.email {
			width: 220px;
		}
		/*input, textarea {
			border: none;
		}*/
		.input {
			line-height: 30px;
		}
		.id, .disc, .qty, .rate {
			line-height: 1px;
			font-size: 16px;
		}
		.id {
			width: 90px;
		}
		.disc {
			width: 230px;
			font-size: 12px;
		}
		.qty {
			width: 50px;
			text-align: right;
		}
		.rate {
			width: 60px;
		}
		.ammount {
			width: 68px;
			line-height: 5px;
			text-align: right;
		}
		.discount {
			width: 40px; 
			background-color: #5B5959; 
			border: none;

		}
		.gst {
			width: 40px; 
			background-color: #CACACA; 
			border: none;
		}
		.grand_total {
			font-size: 23px;
			font-family: Trebuchet MS;
			background-color: #8D8D8D;
		}
		.grand_total_num {
			font-size: 22px;
			font-family: Trebuchet MS;
			background-color: red;
		}
		.total_amm {
			text-align: right;
		}
		.login_user {
			font-size: 15px;
			font-family: Trebuchet MS;
			text-align: left;
		}
		.thanku {
			font-family: Verdana;
			font-size: 20px;
			padding-left: 20px;
			font-weight: bold;
			color: #DE0000;
		}
		input, textarea {
			border: none;
			border-bottom: 1px solid #ADADAD;
		}
		@media print {
		    .printbtn {
		        display :  none;
		    }
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
        $login_user=$_SESSION['login_user'];
        $product_id_1 = "";
        $product_description_1 = "";
        $quantity_1 = "";
        $ammount_1 = "";
        $rate_1 = "";
        $product_id_2 = "";
        $product_description_2 = "";
        $quantity_2 = "";
        $ammount_2 = "";
        $rate_2 = "";
        $product_id_3 = "";
        $product_description_3 = "";
        $quantity_3 = "";
        $ammount_3 = "";
        $rate_3 = "";
        $product_id_4 = "";
        $product_description_4 = "";
        $quantity_4 = "";
        $ammount_4 = "";
        $rate_4 = "";
        $product_id_5 = "";
        $product_description_5 = "";
        $quantity_5 = "";
        $ammount_5 = "";
        $rate_5 = "";
        $product_id_6 = "";
        $product_description_6 = "";
        $quantity_6 = "";
        $ammount_6 = "";
        $rate_6 = "";
        $product_id_7 = "";
        $product_description_7 = "";
        $quantity_7 = "";
        $ammount_7 = "";
        $rate_7 = "";
        $product_id_8 = "";
        $product_description_8 = "";
        $quantity_8 = "";
        $ammount_8 = "";
        $rate_8 = "";
        $quantity_total = "";
        $ammount_total_1 = "";
        $ammount_total_2 = "";
        $ammount_total_3 = "";
        $ammount_total_4 = "";
        $ammount_total_5 = "";
        $discount = 0.00;
        $gst = 5.00;
        $calculate_done = 0;
        $alter_stock_done = 0;
        $email = "";
        $phone_no = "";
        $customer_name_add = "To, ";
        $shipment = "Shipment To, ";
        $invoice_no = 0;

        if(isset($_POST['Alter_Stock'])) {
			if (empty($_POST['phone_no'])) {
				
			} else {
				$phone_no = $_POST['phone_no'];
			}
        	if (empty($_POST['email'])) {
				
			} else {
				$email = $_POST['email'];
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					echo '<script language="javascript">';
					echo 'alert("Invalid email format!!")';
					echo '</script>';
				}
			}
			if (empty($_POST['customer_name_add'])) {
				
			} else {
				$customer_name_add = $_POST['customer_name_add'];
			}
			if (empty($_POST['shipment'])) {
				
			} else {
				$shipment = $_POST['shipment'];
			}
			if (empty($_POST['invoice_no'])) {
				
			} else {
				$invoice_no = $_POST['invoice_no'];
			}
			$_SESSION['calculate_after_alter'] = 1;
			if (!isset($_SESSION['calculate_done']) or ((isset($_SESSION['calculate_done']) and ($_SESSION['calculate_done'] != 8)))) {
				echo '<script language="javascript">';
				echo 'alert("Please perform calculation first!!")';
				echo '</script>';
			} elseif (isset($_SESSION['alter_stock_done']) and ($_SESSION['alter_stock_done'] == 8)) {
				echo '<script language="javascript">';
				echo 'alert("Database already altered!!")';
				echo '</script>';
			} else {
				// for row 1
				$product_id_1 = $_POST['product_id_1'];
				$quantity_1 = $_POST['quantity_1'];
				if ( $product_id_1 > "99999") {
					$db_servername = "localhost";
					$db_username = "root";
					$db_password = "";
					$db1_name = "products_stock";
					if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
						$sql = "SELECT product_id, quantity FROM products_stock_table WHERE product_id = '".$product_id_1."'";
						if ($result = mysqli_query($conn, $sql)) {
							$row = mysqli_num_rows($result);
							if ($row == 0) {
								echo '<script language="javascript">';
								echo 'alert("Product id no. 1 Not Found!!")';
								echo '</script>';
							} else {
								$row = mysqli_fetch_assoc($result);
								$quantity_stock_1 = $row['quantity'];
								$new_quantity = $quantity_stock_1 - $quantity_1;
								$sql = "UPDATE products_stock_table SET quantity = '".$new_quantity."' WHERE product_id = '".$product_id_1."'";
								if ($result = mysqli_query($conn, $sql)) {
									$alter_stock_done = $alter_stock_done + 1;
								}else {
									echo "query failed 2 ".$conn->error;
								}
							}
						}else {
							echo "query failed 1 ".$conn->error;
						}
						$conn->close();
					} else {
						echo "connection to database failed";
					}
				} else {
					if($_POST['product_id_1'] != "") {
						echo '<script language="javascript">';
						echo 'alert("Product id no. 1 should be greater than 99999!!")';
						echo '</script>';
					} else {
						$alter_stock_done = $alter_stock_done + 1;
					}
				}
				// for row 2
				$product_id_2 = $_POST['product_id_2'];
				$quantity_2 = $_POST['quantity_2'];
				if ( $product_id_2 > "99999") {
					$db_servername = "localhost";
					$db_username = "root";
					$db_password = "";
					$db1_name = "products_stock";
					if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
						$sql = "SELECT product_id, quantity FROM products_stock_table WHERE product_id = '".$product_id_2."'";
						if ($result = mysqli_query($conn, $sql)) {
							$row = mysqli_num_rows($result);
							if ($row == 0) {
								echo '<script language="javascript">';
								echo 'alert("Product id no. 2 Not Found!!")';
								echo '</script>';
							} else {
								$row = mysqli_fetch_assoc($result);
								$quantity_stock_2 = $row['quantity'];
								$new_quantity = $quantity_stock_2 - $quantity_2;
								$sql = "UPDATE products_stock_table SET quantity = '".$new_quantity."' WHERE product_id = '".$product_id_2."'";
								if ($result = mysqli_query($conn, $sql)) {
									$alter_stock_done = $alter_stock_done + 1;
								}else {
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
				} else {
					if($_POST['product_id_2'] != "") {
						echo '<script language="javascript">';
						echo 'alert("Product id no. 2 should be greater than 99999!!")';
						echo '</script>';
					} else {
						$alter_stock_done = $alter_stock_done + 1;
					}
				}
				// for row 3
				$product_id_3 = $_POST['product_id_3'];
				$quantity_3 = $_POST['quantity_3'];
				if ( $product_id_3 > "99999") {
					$db_servername = "localhost";
					$db_username = "root";
					$db_password = "";
					$db1_name = "products_stock";
					if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
						$sql = "SELECT product_id, quantity FROM products_stock_table WHERE product_id = '".$product_id_3."'";
						if ($result = mysqli_query($conn, $sql)) {
							$row = mysqli_num_rows($result);
							if ($row == 0) {
								echo '<script language="javascript">';
								echo 'alert("Product id no. 3 Not Found!!")';
								echo '</script>';
							} else {
								$row = mysqli_fetch_assoc($result);
								$quantity_stock_3 = $row['quantity'];
								$new_quantity = $quantity_stock_3 - $quantity_3;
								$sql = "UPDATE products_stock_table SET quantity = '".$new_quantity."' WHERE product_id = '".$product_id_3."'";
								if ($result = mysqli_query($conn, $sql)) {
									$alter_stock_done = $alter_stock_done + 1;
								}else {
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
				} else {
					if($_POST['product_id_3'] != "") {
						echo '<script language="javascript">';
						echo 'alert("Product id no. 3 should be greater than 99999!!")';
						echo '</script>';
					} else {
						$alter_stock_done = $alter_stock_done + 1;
					}
				}
				// for row 4
				$product_id_4 = $_POST['product_id_4'];
				$quantity_4 = $_POST['quantity_4'];
				if ( $product_id_4 > "99999") {
					$db_servername = "localhost";
					$db_username = "root";
					$db_password = "";
					$db1_name = "products_stock";
					if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
						$sql = "SELECT product_id, quantity FROM products_stock_table WHERE product_id = '".$product_id_4."'";
						if ($result = mysqli_query($conn, $sql)) {
							$row = mysqli_num_rows($result);
							if ($row == 0) {
								echo '<script language="javascript">';
								echo 'alert("Product id no. 4 Not Found!!")';
								echo '</script>';
							} else {
								$row = mysqli_fetch_assoc($result);
								$quantity_stock_4 = $row['quantity'];
								$new_quantity = $quantity_stock_4 - $quantity_4;
								$sql = "UPDATE products_stock_table SET quantity = '".$new_quantity."' WHERE product_id = '".$product_id_4."'";
								if ($result = mysqli_query($conn, $sql)) {
									$alter_stock_done = $alter_stock_done + 1;
								}else {
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
				} else {
					if($_POST['product_id_4'] != "") {
						echo '<script language="javascript">';
						echo 'alert("Product id no. 4 should be greater than 99999!!")';
						echo '</script>';
					} else {
						$alter_stock_done = $alter_stock_done + 1;
					}
				}
				// for row 5
				$product_id_5 = $_POST['product_id_5'];
				$quantity_5 = $_POST['quantity_5'];
				if ( $product_id_5 > "99999") {
					$db_servername = "localhost";
					$db_username = "root";
					$db_password = "";
					$db1_name = "products_stock";
					if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
						$sql = "SELECT product_id, quantity FROM products_stock_table WHERE product_id = '".$product_id_5."'";
						if ($result = mysqli_query($conn, $sql)) {
							$row = mysqli_num_rows($result);
							if ($row == 0) {
								echo '<script language="javascript">';
								echo 'alert("Product id no. 5 Not Found!!")';
								echo '</script>';
							} else {
								$row = mysqli_fetch_assoc($result);
								$quantity_stock_5 = $row['quantity'];
								$new_quantity = $quantity_stock_5 - $quantity_5;
								$sql = "UPDATE products_stock_table SET quantity = '".$new_quantity."' WHERE product_id = '".$product_id_5."'";
								if ($result = mysqli_query($conn, $sql)) {
									$alter_stock_done = $alter_stock_done + 1;
								}else {
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
				} else {
					if($_POST['product_id_5'] != "") {
						echo '<script language="javascript">';
						echo 'alert("Product id no. 5 should be greater than 99999!!")';
						echo '</script>';
					} else {
						$alter_stock_done = $alter_stock_done + 1;
					}
				}
				// for row 6
				$product_id_6 = $_POST['product_id_6'];
				$quantity_6 = $_POST['quantity_6'];
				if ( $product_id_6 > "99999") {
					$db_servername = "localhost";
					$db_username = "root";
					$db_password = "";
					$db1_name = "products_stock";
					if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
						$sql = "SELECT product_id, quantity FROM products_stock_table WHERE product_id = '".$product_id_6."'";
						if ($result = mysqli_query($conn, $sql)) {
							$row = mysqli_num_rows($result);
							if ($row == 0) {
								echo '<script language="javascript">';
								echo 'alert("Product id no. 6 Not Found!!")';
								echo '</script>';
							} else {
								$row = mysqli_fetch_assoc($result);
								$quantity_stock_6 = $row['quantity'];
								$new_quantity = $quantity_stock_6 - $quantity_6;
								$sql = "UPDATE products_stock_table SET quantity = '".$new_quantity."' WHERE product_id = '".$product_id_6."'";
								if ($result = mysqli_query($conn, $sql)) {
									$alter_stock_done = $alter_stock_done + 1;
								}else {
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
				} else {
					if($_POST['product_id_6'] != "") {
						echo '<script language="javascript">';
						echo 'alert("Product id no. 6 should be greater than 99999!!")';
						echo '</script>';
					} else {
						$alter_stock_done = $alter_stock_done + 1;
					}
				}
				// for row 7
				$product_id_7 = $_POST['product_id_7'];
				$quantity_7 = $_POST['quantity_7'];
				if ( $product_id_7 > "99999") {
					$db_servername = "localhost";
					$db_username = "root";
					$db_password = "";
					$db1_name = "products_stock";
					if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
						$sql = "SELECT product_id, quantity FROM products_stock_table WHERE product_id = '".$product_id_7."'";
						if ($result = mysqli_query($conn, $sql)) {
							$row = mysqli_num_rows($result);
							if ($row == 0) {
								echo '<script language="javascript">';
								echo 'alert("Product id no. 7 Not Found!!")';
								echo '</script>';
							} else {
								$row = mysqli_fetch_assoc($result);
								$quantity_stock_7 = $row['quantity'];
								$new_quantity = $quantity_stock_7 - $quantity_7;
								$sql = "UPDATE products_stock_table SET quantity = '".$new_quantity."' WHERE product_id = '".$product_id_7."'";
								if ($result = mysqli_query($conn, $sql)) {
									$alter_stock_done = $alter_stock_done + 1;
								}else {
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
				} else {
					if($_POST['product_id_7'] != "") {
						echo '<script language="javascript">';
						echo 'alert("Product id no. 7 should be greater than 99999!!")';
						echo '</script>';
					} else {
						$alter_stock_done = $alter_stock_done + 1;
					}
				}
				// for row 8
				$product_id_8 = $_POST['product_id_8'];
				$quantity_8 = $_POST['quantity_8'];
				if ( $product_id_8 > "99999") {
					$db_servername = "localhost";
					$db_username = "root";
					$db_password = "";
					$db1_name = "products_stock";
					if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
						$sql = "SELECT product_id, quantity FROM products_stock_table WHERE product_id = '".$product_id_8."'";
						if ($result = mysqli_query($conn, $sql)) {
							$row = mysqli_num_rows($result);
							if ($row == 0) {
								echo '<script language="javascript">';
								echo 'alert("Product id no. 8 Not Found!!")';
								echo '</script>';
							} else {
								$row = mysqli_fetch_assoc($result);
								$quantity_stock_8 = $row['quantity'];
								$new_quantity = $quantity_stock_8 - $quantity_8;
								$sql = "UPDATE products_stock_table SET quantity = '".$new_quantity."' WHERE product_id = '".$product_id_8."'";
								if ($result = mysqli_query($conn, $sql)) {
									$alter_stock_done = $alter_stock_done + 1;
								}else {
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
				} else {
					if($_POST['product_id_8'] != "") {
						echo '<script language="javascript">';
						echo 'alert("Product id no. 8 should be greater than 99999!!")';
						echo '</script>';
					} else {
						$alter_stock_done = $alter_stock_done + 1;
					}
				}
			}
			if ($alter_stock_done == 8) {
				$_SESSION['alter_stock_done'] = 8;
			}
			if ($alter_stock_done == 8) {
				echo '<script language="javascript">';
				echo 'alert("Database altered Successfully!!")';
				echo '</script>';
			}
		}
        if(isset($_POST['Calculate']) or (isset($_SESSION['calculate_after_alter']))) {

        	if (empty($_POST['phone_no'])) {
				
			} else {
				$phone_no = $_POST['phone_no'];
			}
        	if (empty($_POST['email'])) {
				
			} else {
				$email = $_POST['email'];
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					echo '<script language="javascript">';
					echo 'alert("Invalid email format!!")';
					echo '</script>';
				}
			}
			if (empty($_POST['customer_name_add'])) {
				
			} else {
				$customer_name_add = $_POST['customer_name_add'];
			}
			if (empty($_POST['shipment'])) {
				
			} else {
				$shipment = $_POST['shipment'];
			}
			if (empty($_POST['invoice_no'])) {
				
			} else {
				$invoice_no = $_POST['invoice_no'];
			}

			// for row 1
			$product_id_1 = $_POST['product_id_1'];
			$quantity_1 = $_POST['quantity_1'];
			if ( $product_id_1 > "99999") {
				$db_servername = "localhost";
				$db_username = "root";
				$db_password = "";
				$db1_name = "products_stock";
				if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
					$sql = "SELECT product_id, product_name, product_discription, product_brand, product_rate, quantity FROM products_stock_table WHERE product_id = '".$product_id_1."'";
					if ($result = mysqli_query($conn, $sql)) {
						$row = mysqli_num_rows($result);
						if ($row == 0) {
							echo '<script language="javascript">';
							echo 'alert("Product id no. 1 Not Found!!")';
							echo '</script>';
						} else {
							$row = mysqli_fetch_assoc($result);
							$product_description_1 = $row['product_brand']." ".$row['product_name']." ".$row['product_discription'];
							$product_rate_1 = $row['product_rate'];
							$rate_1 = $row['product_rate'];
							$quantity_stock_1 = $row['quantity'];
							if ($quantity_1 < 1) {
								echo '<script language="javascript">';
								echo 'alert("Quantity for product no. 1 should be greater than 1!!")';
								echo '</script>';
							}elseif ($quantity_1 > $quantity_stock_1) {
								echo '<script language="javascript">';
								echo 'alert("Quantity for product no. 1 is greater than in stock!!")';
								echo '</script>';
							} else {
								$ammount_1 = number_format((float)($quantity_1 * $rate_1), 2, '.', '');
								$calculate_done = $calculate_done + 1;
							}
						}
					}else {
						echo "query failed".$conn->error;
					}
					$conn->close();
				} else {
					echo "connection to database failed";
				}
			} else {
				if($_POST['product_id_1'] != "") {
					echo '<script language="javascript">';
					echo 'alert("Product id no. 1 should be greater than 99999!!")';
					echo '</script>';
				} else {
					$calculate_done = $calculate_done + 1;
				}
			}
			//for row 2
			$product_id_2 = $_POST['product_id_2'];
			$quantity_2 = $_POST['quantity_2'];
			if ( $product_id_2 > "99999") {
				$db_servername = "localhost";
				$db_username = "root";
				$db_password = "";
				$db1_name = "products_stock";
				if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
					$sql = "SELECT product_id, product_name, product_discription, product_brand, product_rate, quantity FROM products_stock_table WHERE product_id = '".$product_id_2."'";
					if ($result = mysqli_query($conn, $sql)) {
						$row = mysqli_num_rows($result);
						if ($row == 0) {
							echo '<script language="javascript">';
							echo 'alert("Product id no. 2 Not Found!!")';
							echo '</script>';
						} else {
							$row = mysqli_fetch_assoc($result);
							$product_description_2 = $row['product_brand']." ".$row['product_name']." ".$row['product_discription'];
							$product_rate_2 = $row['product_rate'];
							$rate_2 = $row['product_rate'];
							$quantity_stock_2 = $row['quantity'];
							if ($quantity_2 < 1) {
								echo '<script language="javascript">';
								echo 'alert("Quantity for product no. 2 should be greater than 1!!")';
								echo '</script>';
							}elseif ($quantity_2 > $quantity_stock_2) {
								echo '<script language="javascript">';
								echo 'alert("Quantity for product no. 2 is greater than in stock!!")';
								echo '</script>';
							} else {
								$ammount_2 = number_format((float)($quantity_2 * $rate_2), 2, '.', '');
								$calculate_done = $calculate_done + 1;
							}
						}
					}else {
						echo "query failed".$conn->error;
					}
					$conn->close();
				} else {
					echo "connection to database failed";
				}
			} else {
				if($_POST['product_id_2'] != "") {
					echo '<script language="javascript">';
					echo 'alert("Product id no. 2 should be greater than 99999!!")';
					echo '</script>';
				} else {
					$calculate_done = $calculate_done + 1;
				}
			}
			//for row 3
			$product_id_3 = $_POST['product_id_3'];
			$quantity_3 = $_POST['quantity_3'];
			if ( $product_id_3 > "99999") {
				$db_servername = "localhost";
				$db_username = "root";
				$db_password = "";
				$db1_name = "products_stock";
				if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
					$sql = "SELECT product_id, product_name, product_discription, product_brand, product_rate, quantity FROM products_stock_table WHERE product_id = '".$product_id_3."'";
					if ($result = mysqli_query($conn, $sql)) {
						$row = mysqli_num_rows($result);
						if ($row == 0) {
							echo '<script language="javascript">';
							echo 'alert("Product id no. 3 Not Found!!")';
							echo '</script>';
						} else {
							$row = mysqli_fetch_assoc($result);
							$product_description_3 = $row['product_brand']." ".$row['product_name']." ".$row['product_discription'];
							$product_rate_3 = $row['product_rate'];
							$rate_3 = $row['product_rate'];
							$quantity_stock_3 = $row['quantity'];
							if ($quantity_3 < 1) {
								echo '<script language="javascript">';
								echo 'alert("Quantity for product no. 3 should be greater than 1!!")';
								echo '</script>';
							}elseif ($quantity_3 > $quantity_stock_3) {
								echo '<script language="javascript">';
								echo 'alert("Quantity for product no. 3 is greater than in stock!!")';
								echo '</script>';
							} else {
								$ammount_3 = number_format((float)($quantity_3 * $rate_3), 2, '.', '');
								$calculate_done = $calculate_done + 1;
							}
						}
					}else {
						echo "query failed".$conn->error;
					}
					$conn->close();
				} else {
					echo "connection to database failed";
				}
			} else {
				if($_POST['product_id_3'] != "") {
					echo '<script language="javascript">';
					echo 'alert("Product id no. 3 should be greater than 99999!!")';
					echo '</script>';
				} else {
					$calculate_done = $calculate_done + 1;
				}
			}
			// for row  4
			$product_id_4 = $_POST['product_id_4'];
			$quantity_4 = $_POST['quantity_4'];
			if ( $product_id_4 > "99999") {
				$db_servername = "localhost";
				$db_username = "root";
				$db_password = "";
				$db1_name = "products_stock";
				if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
					$sql = "SELECT product_id, product_name, product_discription, product_brand, product_rate, quantity FROM products_stock_table WHERE product_id = '".$product_id_4."'";
					if ($result = mysqli_query($conn, $sql)) {
						$row = mysqli_num_rows($result);
						if ($row == 0) {
							echo '<script language="javascript">';
							echo 'alert("Product id no. 4 Not Found!!")';
							echo '</script>';
						} else {
							$row = mysqli_fetch_assoc($result);
							$product_description_4 = $row['product_brand']." ".$row['product_name']." ".$row['product_discription'];
							$product_rate_4 = $row['product_rate'];
							$rate_4 = $row['product_rate'];
							$quantity_stock_4 = $row['quantity'];
							if ($quantity_4 < 1) {
								echo '<script language="javascript">';
								echo 'alert("Quantity for product no. 4 should be greater than 1!!")';
								echo '</script>';
							}elseif ($quantity_1 > $quantity_stock_1) {
								echo '<script language="javascript">';
								echo 'alert("Quantity for product no. 4 is greater than in stock!!")';
								echo '</script>';
							} else {
								$ammount_4 = number_format((float)($quantity_4 * $rate_4), 2, '.', '');
								$calculate_done = $calculate_done + 1;
							}
						}
					}else {
						echo "query failed".$conn->error;
					}
					$conn->close();
				} else {
					echo "connection to database failed";
				}
			} else {
				if($_POST['product_id_4'] != "") {
					echo '<script language="javascript">';
					echo 'alert("Product id no. 4 should be greater than 99999!!")';
					echo '</script>';
				} else {
					$calculate_done = $calculate_done + 1;
				}
			}
			// for row 5
			$product_id_5 = $_POST['product_id_5'];
			$quantity_5 = $_POST['quantity_5'];
			if ( $product_id_5 > "99999") {
				$db_servername = "localhost";
				$db_username = "root";
				$db_password = "";
				$db1_name = "products_stock";
				if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
					$sql = "SELECT product_id, product_name, product_discription, product_brand, product_rate, quantity FROM products_stock_table WHERE product_id = '".$product_id_5."'";
					if ($result = mysqli_query($conn, $sql)) {
						$row = mysqli_num_rows($result);
						if ($row == 0) {
							echo '<script language="javascript">';
							echo 'alert("Product id no. 5 Not Found!!")';
							echo '</script>';
						} else {
							$row = mysqli_fetch_assoc($result);
							$product_description_5 = $row['product_brand']." ".$row['product_name']." ".$row['product_discription'];
							$product_rate_5 = $row['product_rate'];
							$rate_5 = $row['product_rate'];
							$quantity_stock_5 = $row['quantity'];
							if ($quantity_5 < 1) {
								echo '<script language="javascript">';
								echo 'alert("Quantity for product no. 5 should be greater than 1!!")';
								echo '</script>';
							}elseif ($quantity_5 > $quantity_stock_5) {
								echo '<script language="javascript">';
								echo 'alert("Quantity for product no. 5 is greater than in stock!!")';
								echo '</script>';
							} else {
								$ammount_5 = number_format((float)($quantity_5 * $rate_5), 2, '.', '');
								$calculate_done = $calculate_done + 1;
							}
						}
					}else {
						echo "query failed".$conn->error;
					}
					$conn->close();
				} else {
					echo "connection to database failed";
				}
			} else {
				if($_POST['product_id_5'] != "") {
					echo '<script language="javascript">';
					echo 'alert("Product id no. 5 should be greater than 99999!!")';
					echo '</script>';
				} else {
					$calculate_done = $calculate_done + 1;
				}
			}
			// for row 6
			$product_id_6 = $_POST['product_id_6'];
			$quantity_6 = $_POST['quantity_6'];
			if ( $product_id_6 > "99999") {
				$db_servername = "localhost";
				$db_username = "root";
				$db_password = "";
				$db1_name = "products_stock";
				if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
					$sql = "SELECT product_id, product_name, product_discription, product_brand, product_rate, quantity FROM products_stock_table WHERE product_id = '".$product_id_6."'";
					if ($result = mysqli_query($conn, $sql)) {
						$row = mysqli_num_rows($result);
						if ($row == 0) {
							echo '<script language="javascript">';
							echo 'alert("Product id no. 6 Not Found!!")';
							echo '</script>';
						} else {
							$row = mysqli_fetch_assoc($result);
							$product_description_6 = $row['product_brand']." ".$row['product_name']." ".$row['product_discription'];
							$product_rate_6 = $row['product_rate'];
							$rate_6 = $row['product_rate'];
							$quantity_stock_6 = $row['quantity'];
							if ($quantity_6 < 1) {
								echo '<script language="javascript">';
								echo 'alert("Quantity for product no. 6 should be greater than 1!!")';
								echo '</script>';
							}elseif ($quantity_6 > $quantity_stock_6) {
								echo '<script language="javascript">';
								echo 'alert("Quantity for product no. 6 is greater than in stock!!")';
								echo '</script>';
							} else {
								$ammount_6 = number_format((float)($quantity_6 * $rate_6), 2, '.', '');
								$calculate_done = $calculate_done + 1;
							}
						}
					}else {
						echo "query failed".$conn->error;
					}
					$conn->close();
				} else {
					echo "connection to database failed";
				}
			} else {
				if($_POST['product_id_6'] != "") {
					echo '<script language="javascript">';
					echo 'alert("Product id no. 6 should be greater than 99999!!")';
					echo '</script>';
				} else {
					$calculate_done = $calculate_done + 1;
				}
			}
			// for row 7
			$product_id_7 = $_POST['product_id_7'];
			$quantity_7 = $_POST['quantity_7'];
			if ( $product_id_7 > "99999") {
				$db_servername = "localhost";
				$db_username = "root";
				$db_password = "";
				$db1_name = "products_stock";
				if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
					$sql = "SELECT product_id, product_name, product_discription, product_brand, product_rate, quantity FROM products_stock_table WHERE product_id = '".$product_id_7."'";
					if ($result = mysqli_query($conn, $sql)) {
						$row = mysqli_num_rows($result);
						if ($row == 0) {
							echo '<script language="javascript">';
							echo 'alert("Product id no. 7 Not Found!!")';
							echo '</script>';
						} else {
							$row = mysqli_fetch_assoc($result);
							$product_description_7 = $row['product_brand']." ".$row['product_name']." ".$row['product_discription'];
							$product_rate_7 = $row['product_rate'];
							$rate_7 = $row['product_rate'];
							$quantity_stock_7 = $row['quantity'];
							if ($quantity_7 < 1) {
								echo '<script language="javascript">';
								echo 'alert("Quantity for product no. 7 should be greater than 1!!")';
								echo '</script>';
							}elseif ($quantity_7 > $quantity_stock_7) {
								echo '<script language="javascript">';
								echo 'alert("Quantity for product no. 7 is greater than in stock!!")';
								echo '</script>';
							} else {
								$ammount_7 = number_format((float)($quantity_7 * $rate_7), 2, '.', '');
								$calculate_done = $calculate_done + 1;
							}
						}
					}else {
						echo "query failed".$conn->error;
					}
					$conn->close();
				} else {
					echo "connection to database failed";
				}
			} else {
				if($_POST['product_id_7'] != "") {
					echo '<script language="javascript">';
					echo 'alert("Product id no. 7 should be greater than 99999!!")';
					echo '</script>';
				} else {
					$calculate_done = $calculate_done + 1;
				}
			}
			// for row 8
			$product_id_8 = $_POST['product_id_8'];
			$quantity_8 = $_POST['quantity_8'];
			if ( $product_id_8 > "99999") {
				$db_servername = "localhost";
				$db_username = "root";
				$db_password = "";
				$db1_name = "products_stock";
				if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
					$sql = "SELECT product_id, product_name, product_discription, product_brand, product_rate, quantity FROM products_stock_table WHERE product_id = '".$product_id_8."'";
					if ($result = mysqli_query($conn, $sql)) {
						$row = mysqli_num_rows($result);
						if ($row == 0) {
							echo '<script language="javascript">';
							echo 'alert("Product id no. 8 Not Found!!")';
							echo '</script>';
						} else {
							$row = mysqli_fetch_assoc($result);
							$product_description_8 = $row['product_brand']." ".$row['product_name']." ".$row['product_discription'];
							$product_rate_8 = $row['product_rate'];
							$rate_8 = $row['product_rate'];
							$quantity_stock_8 = $row['quantity'];
							if ($quantity_8 < 1) {
								echo '<script language="javascript">';
								echo 'alert("Quantity for product no. 8 should be greater than 1!!")';
								echo '</script>';
							}elseif ($quantity_8 > $quantity_stock_8) {
								echo '<script language="javascript">';
								echo 'alert("Quantity for product no. 8 is greater than in stock!!")';
								echo '</script>';
							} else {
								$ammount_8 = number_format((float)($quantity_8 * $rate_8), 2, '.', '');
								$calculate_done = $calculate_done + 1;
							}
						}
					}else {
						echo "query failed".$conn->error;
					}
					$conn->close();
				} else {
					echo "connection to database failed";
				}
			} else {
				if($_POST['product_id_8'] != "") {
					echo '<script language="javascript">';
					echo 'alert("Product id no. 8 should be greater than 99999!!")';
					echo '</script>';
				} else {
					$calculate_done = $calculate_done + 1;
				}
			}
			$_SESSION['calculate_done'] = $calculate_done;
			$ammount_total_1 = 0.00;
			if ($ammount_1 != "") {
				$ammount_total_1 = $ammount_total_1 + $ammount_1;
			}
			if ($ammount_2 != "") {
				$ammount_total_1 = $ammount_total_1 + $ammount_2;
			}
			if ($ammount_3 != "") {
				$ammount_total_1 = $ammount_total_1 + $ammount_3;
			}
			if ($ammount_4 != "") {
				$ammount_total_1 = $ammount_total_1 + $ammount_4;
			}
			if ($ammount_5 != "") {
				$ammount_total_1 = $ammount_total_1 + $ammount_5;
			}
			if ($ammount_6 != "") {
				$ammount_total_1 = $ammount_total_1 + $ammount_6;
			}
			if ($ammount_7 != "") {
				$ammount_total_1 = $ammount_total_1 + $ammount_7;
			}
			if ($ammount_8 != "") {
				$ammount_total_1 = $ammount_total_1 + $ammount_8;
			}
			$ammount_total_1 = number_format((float)($ammount_total_1), 2, '.', '');
			$quantity_total = 0;
			if ($quantity_1 != "") {
				$quantity_total = $quantity_total + $quantity_1;
			}
			if ($quantity_2 != "") {
				$quantity_total = $quantity_total + $quantity_2;
			}
			if ($quantity_3 != "") {
				$quantity_total = $quantity_total + $quantity_3;
			}
			if ($quantity_4 != "") {
				$quantity_total = $quantity_total + $quantity_4;
			}
			if ($quantity_5 != "") {
				$quantity_total = $quantity_total + $quantity_5;
			}
			if ($quantity_6 != "") {
				$quantity_total = $quantity_total + $quantity_6;
			}
			if ($quantity_7 != "") {
				$quantity_total = $quantity_total + $quantity_7;
			}
			if ($quantity_8 != "") {
				$quantity_total = $quantity_total + $quantity_8;
			}
			$discount = number_format((float)($_POST['discount']), 2, '.', '');
			if ($discount != 0) {
				$ammount_total_2 = number_format((float)(($ammount_total_1 * $discount) / 100), 2, '.', '');
			} else {
				$ammount_total_2 = "0.00";
			}
			$ammount_total_3 = number_format((float)($ammount_total_1 - $ammount_total_2), 2, '.', '');
			$gst = $_POST['gst'];
			$gst = number_format((float)($_POST['gst']), 2, '.', '');
			$ammount_total_4 = number_format((float)(($ammount_total_3 * $gst) / 100), 2, '.', '');
			$ammount_total_5 = number_format((float)($ammount_total_3 + $ammount_total_4), 0, '.', '');
			if(isset($_SESSION['calculate_after_alter'])) {
				unset($_SESSION['calculate_after_alter']);
			} 
		}
		
		if(isset($_POST['back'])) {
			unset($_SESSION['alter_stock_done']);
			unset($_SESSION['calculate_done']);
			header("location: admin_home_page.php");
		}
		if (isset($_POST['reset'])) {
			unset($_SESSION['alter_stock_done']);
			unset($_SESSION['calculate_done']);
			header("location: create_bill_admin.php");
		}
		if (isset($_POST['send_email'])) {
			if (empty($_POST['phone_no'])) {
				
			} else {
				$phone_no = $_POST['phone_no'];
			}
        	if (empty($_POST['email'])) {
				echo '<script language="javascript">';
				echo 'alert("Email required!!")';
				echo '</script>';
			} else {
				$email = $_POST['email'];
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					echo '<script language="javascript">';
					echo 'alert("Invalid email format!!")';
					echo '</script>';
				} else {
					if (empty($_POST['customer_name_add'])) {
						
					} else {
						$customer_name_add = $_POST['customer_name_add'];
					}
					if (empty($_POST['shipment'])) {
						
					} else {
						$shipment = $_POST['shipment'];
					}
					if (empty($_POST['invoice_no'])) {
						
					} else {
						$invoice_no = $_POST['invoice_no'];
					}

					// for row 1
					$product_id_1 = $_POST['product_id_1'];
					$quantity_1 = $_POST['quantity_1'];
					if ( $product_id_1 > "99999") {
						$db_servername = "localhost";
						$db_username = "root";
						$db_password = "";
						$db1_name = "products_stock";
						if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
							$sql = "SELECT product_id, product_name, product_discription, product_brand, product_rate, quantity FROM products_stock_table WHERE product_id = '".$product_id_1."'";
							if ($result = mysqli_query($conn, $sql)) {
								$row = mysqli_num_rows($result);
								if ($row == 0) {
									echo '<script language="javascript">';
									echo 'alert("Product id no. 1 Not Found!!")';
									echo '</script>';
								} else {
									$row = mysqli_fetch_assoc($result);
									$product_description_1 = $row['product_brand']." ".$row['product_name']." ".$row['product_discription'];
									$product_rate_1 = $row['product_rate'];
									$rate_1 = $row['product_rate'];
									$quantity_stock_1 = $row['quantity'];
									if ($quantity_1 < 1) {
										echo '<script language="javascript">';
										echo 'alert("Quantity for product no. 1 should be greater than 1!!")';
										echo '</script>';
									}elseif ($quantity_1 > $quantity_stock_1) {
										echo '<script language="javascript">';
										echo 'alert("Quantity for product no. 1 is greater than in stock!!")';
										echo '</script>';
									} else {
										$ammount_1 = number_format((float)($quantity_1 * $rate_1), 2, '.', '');
										$calculate_done = $calculate_done + 1;
									}
								}
							}else {
								echo "query failed".$conn->error;
							}
							$conn->close();
						} else {
							echo "connection to database failed";
						}
					} else {
						if($_POST['product_id_1'] != "") {
							echo '<script language="javascript">';
							echo 'alert("Product id no. 1 should be greater than 99999!!")';
							echo '</script>';
						} else {
							$calculate_done = $calculate_done + 1;
						}
					}
					//for row 2
					$product_id_2 = $_POST['product_id_2'];
					$quantity_2 = $_POST['quantity_2'];
					if ( $product_id_2 > "99999") {
						$db_servername = "localhost";
						$db_username = "root";
						$db_password = "";
						$db1_name = "products_stock";
						if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
							$sql = "SELECT product_id, product_name, product_discription, product_brand, product_rate, quantity FROM products_stock_table WHERE product_id = '".$product_id_2."'";
							if ($result = mysqli_query($conn, $sql)) {
								$row = mysqli_num_rows($result);
								if ($row == 0) {
									echo '<script language="javascript">';
									echo 'alert("Product id no. 2 Not Found!!")';
									echo '</script>';
								} else {
									$row = mysqli_fetch_assoc($result);
									$product_description_2 = $row['product_brand']." ".$row['product_name']." ".$row['product_discription'];
									$product_rate_2 = $row['product_rate'];
									$rate_2 = $row['product_rate'];
									$quantity_stock_2 = $row['quantity'];
									if ($quantity_2 < 1) {
										echo '<script language="javascript">';
										echo 'alert("Quantity for product no. 2 should be greater than 1!!")';
										echo '</script>';
									}elseif ($quantity_2 > $quantity_stock_2) {
										echo '<script language="javascript">';
										echo 'alert("Quantity for product no. 2 is greater than in stock!!")';
										echo '</script>';
									} else {
										$ammount_2 = number_format((float)($quantity_2 * $rate_2), 2, '.', '');
										$calculate_done = $calculate_done + 1;
									}
								}
							}else {
								echo "query failed".$conn->error;
							}
							$conn->close();
						} else {
							echo "connection to database failed";
						}
					} else {
						if($_POST['product_id_2'] != "") {
							echo '<script language="javascript">';
							echo 'alert("Product id no. 2 should be greater than 99999!!")';
							echo '</script>';
						} else {
							$calculate_done = $calculate_done + 1;
						}
					}
					//for row 3
					$product_id_3 = $_POST['product_id_3'];
					$quantity_3 = $_POST['quantity_3'];
					if ( $product_id_3 > "99999") {
						$db_servername = "localhost";
						$db_username = "root";
						$db_password = "";
						$db1_name = "products_stock";
						if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
							$sql = "SELECT product_id, product_name, product_discription, product_brand, product_rate, quantity FROM products_stock_table WHERE product_id = '".$product_id_3."'";
							if ($result = mysqli_query($conn, $sql)) {
								$row = mysqli_num_rows($result);
								if ($row == 0) {
									echo '<script language="javascript">';
									echo 'alert("Product id no. 3 Not Found!!")';
									echo '</script>';
								} else {
									$row = mysqli_fetch_assoc($result);
									$product_description_3 = $row['product_brand']." ".$row['product_name']." ".$row['product_discription'];
									$product_rate_3 = $row['product_rate'];
									$rate_3 = $row['product_rate'];
									$quantity_stock_3 = $row['quantity'];
									if ($quantity_3 < 1) {
										echo '<script language="javascript">';
										echo 'alert("Quantity for product no. 3 should be greater than 1!!")';
										echo '</script>';
									}elseif ($quantity_3 > $quantity_stock_3) {
										echo '<script language="javascript">';
										echo 'alert("Quantity for product no. 3 is greater than in stock!!")';
										echo '</script>';
									} else {
										$ammount_3 = number_format((float)($quantity_3 * $rate_3), 2, '.', '');
										$calculate_done = $calculate_done + 1;
									}
								}
							}else {
								echo "query failed".$conn->error;
							}
							$conn->close();
						} else {
							echo "connection to database failed";
						}
					} else {
						if($_POST['product_id_3'] != "") {
							echo '<script language="javascript">';
							echo 'alert("Product id no. 3 should be greater than 99999!!")';
							echo '</script>';
						} else {
							$calculate_done = $calculate_done + 1;
						}
					}
					// for row  4
					$product_id_4 = $_POST['product_id_4'];
					$quantity_4 = $_POST['quantity_4'];
					if ( $product_id_4 > "99999") {
						$db_servername = "localhost";
						$db_username = "root";
						$db_password = "";
						$db1_name = "products_stock";
						if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
							$sql = "SELECT product_id, product_name, product_discription, product_brand, product_rate, quantity FROM products_stock_table WHERE product_id = '".$product_id_4."'";
							if ($result = mysqli_query($conn, $sql)) {
								$row = mysqli_num_rows($result);
								if ($row == 0) {
									echo '<script language="javascript">';
									echo 'alert("Product id no. 4 Not Found!!")';
									echo '</script>';
								} else {
									$row = mysqli_fetch_assoc($result);
									$product_description_4 = $row['product_brand']." ".$row['product_name']." ".$row['product_discription'];
									$product_rate_4 = $row['product_rate'];
									$rate_4 = $row['product_rate'];
									$quantity_stock_4 = $row['quantity'];
									if ($quantity_4 < 1) {
										echo '<script language="javascript">';
										echo 'alert("Quantity for product no. 4 should be greater than 1!!")';
										echo '</script>';
									}elseif ($quantity_1 > $quantity_stock_1) {
										echo '<script language="javascript">';
										echo 'alert("Quantity for product no. 4 is greater than in stock!!")';
										echo '</script>';
									} else {
										$ammount_4 = number_format((float)($quantity_4 * $rate_4), 2, '.', '');
										$calculate_done = $calculate_done + 1;
									}
								}
							}else {
								echo "query failed".$conn->error;
							}
							$conn->close();
						} else {
							echo "connection to database failed";
						}
					} else {
						if($_POST['product_id_4'] != "") {
							echo '<script language="javascript">';
							echo 'alert("Product id no. 4 should be greater than 99999!!")';
							echo '</script>';
						} else {
							$calculate_done = $calculate_done + 1;
						}
					}
					// for row 5
					$product_id_5 = $_POST['product_id_5'];
					$quantity_5 = $_POST['quantity_5'];
					if ( $product_id_5 > "99999") {
						$db_servername = "localhost";
						$db_username = "root";
						$db_password = "";
						$db1_name = "products_stock";
						if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
							$sql = "SELECT product_id, product_name, product_discription, product_brand, product_rate, quantity FROM products_stock_table WHERE product_id = '".$product_id_5."'";
							if ($result = mysqli_query($conn, $sql)) {
								$row = mysqli_num_rows($result);
								if ($row == 0) {
									echo '<script language="javascript">';
									echo 'alert("Product id no. 5 Not Found!!")';
									echo '</script>';
								} else {
									$row = mysqli_fetch_assoc($result);
									$product_description_5 = $row['product_brand']." ".$row['product_name']." ".$row['product_discription'];
									$product_rate_5 = $row['product_rate'];
									$rate_5 = $row['product_rate'];
									$quantity_stock_5 = $row['quantity'];
									if ($quantity_5 < 1) {
										echo '<script language="javascript">';
										echo 'alert("Quantity for product no. 5 should be greater than 1!!")';
										echo '</script>';
									}elseif ($quantity_5 > $quantity_stock_5) {
										echo '<script language="javascript">';
										echo 'alert("Quantity for product no. 5 is greater than in stock!!")';
										echo '</script>';
									} else {
										$ammount_5 = number_format((float)($quantity_5 * $rate_5), 2, '.', '');
										$calculate_done = $calculate_done + 1;
									}
								}
							}else {
								echo "query failed".$conn->error;
							}
							$conn->close();
						} else {
							echo "connection to database failed";
						}
					} else {
						if($_POST['product_id_5'] != "") {
							echo '<script language="javascript">';
							echo 'alert("Product id no. 5 should be greater than 99999!!")';
							echo '</script>';
						} else {
							$calculate_done = $calculate_done + 1;
						}
					}
					// for row 6
					$product_id_6 = $_POST['product_id_6'];
					$quantity_6 = $_POST['quantity_6'];
					if ( $product_id_6 > "99999") {
						$db_servername = "localhost";
						$db_username = "root";
						$db_password = "";
						$db1_name = "products_stock";
						if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
							$sql = "SELECT product_id, product_name, product_discription, product_brand, product_rate, quantity FROM products_stock_table WHERE product_id = '".$product_id_6."'";
							if ($result = mysqli_query($conn, $sql)) {
								$row = mysqli_num_rows($result);
								if ($row == 0) {
									echo '<script language="javascript">';
									echo 'alert("Product id no. 6 Not Found!!")';
									echo '</script>';
								} else {
									$row = mysqli_fetch_assoc($result);
									$product_description_6 = $row['product_brand']." ".$row['product_name']." ".$row['product_discription'];
									$product_rate_6 = $row['product_rate'];
									$rate_6 = $row['product_rate'];
									$quantity_stock_6 = $row['quantity'];
									if ($quantity_6 < 1) {
										echo '<script language="javascript">';
										echo 'alert("Quantity for product no. 6 should be greater than 1!!")';
										echo '</script>';
									}elseif ($quantity_6 > $quantity_stock_6) {
										echo '<script language="javascript">';
										echo 'alert("Quantity for product no. 6 is greater than in stock!!")';
										echo '</script>';
									} else {
										$ammount_6 = number_format((float)($quantity_6 * $rate_6), 2, '.', '');
										$calculate_done = $calculate_done + 1;
									}
								}
							}else {
								echo "query failed".$conn->error;
							}
							$conn->close();
						} else {
							echo "connection to database failed";
						}
					} else {
						if($_POST['product_id_6'] != "") {
							echo '<script language="javascript">';
							echo 'alert("Product id no. 6 should be greater than 99999!!")';
							echo '</script>';
						} else {
							$calculate_done = $calculate_done + 1;
						}
					}
					// for row 7
					$product_id_7 = $_POST['product_id_7'];
					$quantity_7 = $_POST['quantity_7'];
					if ( $product_id_7 > "99999") {
						$db_servername = "localhost";
						$db_username = "root";
						$db_password = "";
						$db1_name = "products_stock";
						if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
							$sql = "SELECT product_id, product_name, product_discription, product_brand, product_rate, quantity FROM products_stock_table WHERE product_id = '".$product_id_7."'";
							if ($result = mysqli_query($conn, $sql)) {
								$row = mysqli_num_rows($result);
								if ($row == 0) {
									echo '<script language="javascript">';
									echo 'alert("Product id no. 7 Not Found!!")';
									echo '</script>';
								} else {
									$row = mysqli_fetch_assoc($result);
									$product_description_7 = $row['product_brand']." ".$row['product_name']." ".$row['product_discription'];
									$product_rate_7 = $row['product_rate'];
									$rate_7 = $row['product_rate'];
									$quantity_stock_7 = $row['quantity'];
									if ($quantity_7 < 1) {
										echo '<script language="javascript">';
										echo 'alert("Quantity for product no. 7 should be greater than 1!!")';
										echo '</script>';
									}elseif ($quantity_7 > $quantity_stock_7) {
										echo '<script language="javascript">';
										echo 'alert("Quantity for product no. 7 is greater than in stock!!")';
										echo '</script>';
									} else {
										$ammount_7 = number_format((float)($quantity_7 * $rate_7), 2, '.', '');
										$calculate_done = $calculate_done + 1;
									}
								}
							}else {
								echo "query failed".$conn->error;
							}
							$conn->close();
						} else {
							echo "connection to database failed";
						}
					} else {
						if($_POST['product_id_7'] != "") {
							echo '<script language="javascript">';
							echo 'alert("Product id no. 7 should be greater than 99999!!")';
							echo '</script>';
						} else {
							$calculate_done = $calculate_done + 1;
						}
					}
					// for row 8
					$product_id_8 = $_POST['product_id_8'];
					$quantity_8 = $_POST['quantity_8'];
					if ( $product_id_8 > "99999") {
						$db_servername = "localhost";
						$db_username = "root";
						$db_password = "";
						$db1_name = "products_stock";
						if ($conn = mysqli_connect($db_servername, $db_username, $db_password, $db1_name)) {
							$sql = "SELECT product_id, product_name, product_discription, product_brand, product_rate, quantity FROM products_stock_table WHERE product_id = '".$product_id_8."'";
							if ($result = mysqli_query($conn, $sql)) {
								$row = mysqli_num_rows($result);
								if ($row == 0) {
									echo '<script language="javascript">';
									echo 'alert("Product id no. 8 Not Found!!")';
									echo '</script>';
								} else {
									$row = mysqli_fetch_assoc($result);
									$product_description_8 = $row['product_brand']." ".$row['product_name']." ".$row['product_discription'];
									$product_rate_8 = $row['product_rate'];
									$rate_8 = $row['product_rate'];
									$quantity_stock_8 = $row['quantity'];
									if ($quantity_8 < 1) {
										echo '<script language="javascript">';
										echo 'alert("Quantity for product no. 8 should be greater than 1!!")';
										echo '</script>';
									}elseif ($quantity_8 > $quantity_stock_8) {
										echo '<script language="javascript">';
										echo 'alert("Quantity for product no. 8 is greater than in stock!!")';
										echo '</script>';
									} else {
										$ammount_8 = number_format((float)($quantity_8 * $rate_8), 2, '.', '');
										$calculate_done = $calculate_done + 1;
									}
								}
							}else {
								echo "query failed".$conn->error;
							}
							$conn->close();
						} else {
							echo "connection to database failed";
						}
					} else {
						if($_POST['product_id_8'] != "") {
							echo '<script language="javascript">';
							echo 'alert("Product id no. 8 should be greater than 99999!!")';
							echo '</script>';
						} else {
							$calculate_done = $calculate_done + 1;
						}
					}
					$_SESSION['calculate_done'] = $calculate_done;
					$ammount_total_1 = 0.00;
					if ($ammount_1 != "") {
						$ammount_total_1 = $ammount_total_1 + $ammount_1;
					}
					if ($ammount_2 != "") {
						$ammount_total_1 = $ammount_total_1 + $ammount_2;
					}
					if ($ammount_3 != "") {
						$ammount_total_1 = $ammount_total_1 + $ammount_3;
					}
					if ($ammount_4 != "") {
						$ammount_total_1 = $ammount_total_1 + $ammount_4;
					}
					if ($ammount_5 != "") {
						$ammount_total_1 = $ammount_total_1 + $ammount_5;
					}
					if ($ammount_6 != "") {
						$ammount_total_1 = $ammount_total_1 + $ammount_6;
					}
					if ($ammount_7 != "") {
						$ammount_total_1 = $ammount_total_1 + $ammount_7;
					}
					if ($ammount_8 != "") {
						$ammount_total_1 = $ammount_total_1 + $ammount_8;
					}
					$ammount_total_1 = number_format((float)($ammount_total_1), 2, '.', '');
					$quantity_total = 0;
					if ($quantity_1 != "") {
						$quantity_total = $quantity_total + $quantity_1;
					}
					if ($quantity_2 != "") {
						$quantity_total = $quantity_total + $quantity_2;
					}
					if ($quantity_3 != "") {
						$quantity_total = $quantity_total + $quantity_3;
					}
					if ($quantity_4 != "") {
						$quantity_total = $quantity_total + $quantity_4;
					}
					if ($quantity_5 != "") {
						$quantity_total = $quantity_total + $quantity_5;
					}
					if ($quantity_6 != "") {
						$quantity_total = $quantity_total + $quantity_6;
					}
					if ($quantity_7 != "") {
						$quantity_total = $quantity_total + $quantity_7;
					}
					if ($quantity_8 != "") {
						$quantity_total = $quantity_total + $quantity_8;
					}
					$discount = number_format((float)($_POST['discount']), 2, '.', '');
					if ($discount != 0) {
						$ammount_total_2 = number_format((float)(($ammount_total_1 * $discount) / 100), 2, '.', '');
					} else {
						$ammount_total_2 = "0.00";
					}
					$ammount_total_3 = number_format((float)($ammount_total_1 - $ammount_total_2), 2, '.', '');
					$gst = $_POST['gst'];
					$gst = number_format((float)($_POST['gst']), 2, '.', '');
					$ammount_total_4 = number_format((float)(($ammount_total_3 * $gst) / 100), 2, '.', '');
					$ammount_total_5 = number_format((float)($ammount_total_3 + $ammount_total_4), 0, '.', '');
					if(isset($_SESSION['calculate_done'])) {
						if ($ammount_total_1 == 0) {
							echo '<script language="javascript">';
							echo 'alert("Please fill the bill proporly!!")';
							echo '</script>';
						} else {
							$mail_date = date("d-m-Y", strtotime($_POST['date']));
							$_SESSION['date'] = $mail_date;
							$_SESSION['invoice_no'] = $_POST['invoice_no'];
							$_SESSION['customer_name_add'] = $_POST['customer_name_add'];
							$_SESSION['shipment'] = $_POST['shipment'];
							$_SESSION['phone_no'] = $_POST['phone_no'];
							$_SESSION['email'] = $_POST['email'];
							$_SESSION['product_id_1'] = $product_id_1;
							$_SESSION['product_description_1'] = $product_description_1;
							$_SESSION['quantity_1'] = $quantity_1;
							$_SESSION['ammount_1'] = $ammount_1;
							$_SESSION['rate_1'] = $rate_1;
							$_SESSION['product_id_2'] = $product_id_2;
							$_SESSION['product_description_2'] = $product_description_2;
							$_SESSION['quantity_2'] = $quantity_2;
							$_SESSION['ammount_2'] = $ammount_2;
							$_SESSION['rate_2'] = $rate_2;
							$_SESSION['product_id_3'] = $product_id_3;
							$_SESSION['product_description_3'] = $product_description_3;
							$_SESSION['quantity_3'] = $quantity_3;
							$_SESSION['ammount_3'] = $ammount_3;
							$_SESSION['rate_3'] = $rate_3;
							$_SESSION['product_id_4'] = $product_id_4;
							$_SESSION['product_description_4'] = $product_description_4;
							$_SESSION['quantity_4'] = $quantity_4;
							$_SESSION['ammount_4'] = $ammount_4;
							$_SESSION['rate_4'] = $rate_4;
							$_SESSION['product_id_5'] = $product_id_5;
							$_SESSION['product_description_5'] = $product_description_5;
							$_SESSION['quantity_5'] = $quantity_5;
							$_SESSION['ammount_5'] = $ammount_5;
							$_SESSION['rate_5'] = $rate_5;
							$_SESSION['product_id_6'] = $product_id_6;
							$_SESSION['product_description_6'] = $product_description_6;
							$_SESSION['quantity_6'] = $quantity_6;
							$_SESSION['ammount_6'] = $ammount_6;
							$_SESSION['rate_6'] = $rate_6;
							$_SESSION['product_id_7'] = $product_id_7;
							$_SESSION['product_description_7'] = $product_description_7;
							$_SESSION['quantity_7'] = $quantity_7;
							$_SESSION['ammount_7'] = $ammount_7;
							$_SESSION['rate_7'] = $rate_7;
							$_SESSION['product_id_8'] = $product_id_8;
							$_SESSION['product_description_8'] = $product_description_8;
							$_SESSION['quantity_8'] = $quantity_8;
							$_SESSION['ammount_8'] = $ammount_8;
							$_SESSION['rate_8'] = $rate_8;
							        
							$_SESSION['quantity_total'] = $quantity_total;
							$_SESSION['ammount_total_1'] = $ammount_total_1;
							$_SESSION['ammount_total_2'] = $ammount_total_2;
							$_SESSION['ammount_total_3'] = $ammount_total_3;
							$_SESSION['ammount_total_4'] = $ammount_total_4;
							$_SESSION['ammount_total_5'] = $ammount_total_5;
							$_SESSION['discount'] = $discount;
							$_SESSION['gst'] = $gst;
							unset($_SESSION['alter_stock_done']);
							unset($_SESSION['calculate_done']);
							header("location: send_email_admin.php");
						}
					} else {
						echo '<script language="javascript">';
						echo 'alert("Please perform calculation first!!")';
						echo '</script>';
					}
				}
			}
		}
	?>
	<form method="post">	
	<table class="frame">
		<tr class="header">
			<th colspan="2" class="address"><h2 id="main_header">SUPRIME MALL</h2>
				<div class="white main_address"><p>Revenue Colony,<br>Shivajinagar, Pune,<br>Maharashtra 411005</p></div>
			</th>
			<th class="address white" colspan="3" style="text-align: right;font-size: 18px;">Date : <input type='date' id='date' name="date" value='<?php echo date('Y-m-d');?>'><br>Invoice No. <input type="number" name="invoice_no" id="invoice_no" value="<?php echo $invoice_no; ?>"></th>
		</tr>
		<tr>
			<td colspan="2" class="address customer_info"><textarea cols="35" rows="5" name="customer_name_add" ><?php echo $customer_name_add; ?></textarea>
				<label>Phone No. :</label><input type="number" class="phone" id="phone" name="phone_no" value="<?php echo $phone_no; ?>"><br>
				<label>Email ID : </label><input type="text" class="email" id="email" name="email" value="<?php echo $email; ?>">
			</td>
				<td colspan="3" class="address left"><textarea class="customer" name="shipment" cols="25" rows="7"><?php echo $shipment; ?></textarea></td>
		</tr>
		<tr class="red" style="line-height: 30px;">
			<th>Product ID</th>
			<th>Product Description</th>
			<th>Quantity</th>
			<th>Rate</th>
			<th>Total</th>
		</tr>
		<tr class="input">
			<th><input type="number" name="product_id_1" class="id" value="<?php echo $product_id_1 ?>"></th>
			<th><input type="text" name="product_description_1" class="disc" value="<?php echo $product_description_1 ?>"></th>
			<th><input type="number" name="quantity_1" class="qty" value="<?php echo $quantity_1 ?>"></th>
			<th><p id="rate_1" class="rate"><?php echo $rate_1; ?></p></th>
			<th><p id="ammount_1" class="ammount"><?php echo $ammount_1; ?></p></th>
		</tr>
		<tr class="input">
			<th><input type="number" name="product_id_2" class="id" value="<?php echo $product_id_2 ?>"></th>
			<th><input type="text" name="product_description_2" class="disc" value="<?php echo $product_description_2 ?>"></th>
			<th><input type="number" name="quantity_2" class="qty" value="<?php echo $quantity_2 ?>"></th>
			<th><p id="rate_2" class="rate"><?php echo $rate_2; ?></p></th>
			<th><p id="ammount_2" class="ammount"><?php echo $ammount_2; ?></p></th>
		</tr>
		<tr class="input">
			<th><input type="number" name="product_id_3" class="id" value="<?php echo $product_id_3 ?>"></th>
			<th><input type="text" name="product_description_3" class="disc" value="<?php echo $product_description_3 ?>"></th>
			<th><input type="number" name="quantity_3" class="qty" value="<?php echo $quantity_3 ?>"></th>
			<th><p id="rate_3" class="rate"><?php echo $rate_3; ?></p></th>
			<th><p id="ammount_3" class="ammount"><?php echo $ammount_3; ?></p></th>
		</tr>
		<tr class="input">
			<th><input type="number" name="product_id_4" class="id" value="<?php echo $product_id_4 ?>"></th>
			<th><input type="text" name="product_description_4" class="disc" value="<?php echo $product_description_4 ?>"></th>
			<th><input type="number" name="quantity_4" class="qty" value="<?php echo $quantity_4 ?>"></th>
			<th><p id="rate_4" class="rate"><?php echo $rate_4; ?></p></th>
			<th><p id="ammount_4" class="ammount"><?php echo $ammount_4; ?></p></th>
		</tr>
		<tr class="input">
			<th><input type="number" name="product_id_5" class="id" value="<?php echo $product_id_5 ?>"></th>
			<th><input type="text" name="product_description_5" class="disc" value="<?php echo $product_description_5 ?>"></th>
			<th><input type="number" name="quantity_5" class="qty" value="<?php echo $quantity_5 ?>"></th>
			<th><p id="rate_5" class="rate"><?php echo $rate_5; ?></p></th>
			<th><p id="ammount_5" class="ammount"><?php echo $ammount_5; ?></p></th>
		</tr>
		<tr class="input">
			<th><input type="number" name="product_id_6" class="id" value="<?php echo $product_id_6 ?>"></th>
			<th><input type="text" name="product_description_6" class="disc" value="<?php echo $product_description_6 ?>"></th>
			<th><input type="number" name="quantity_6" class="qty" value="<?php echo $quantity_6 ?>"></th>
			<th><p id="rate_6" class="rate"><?php echo $rate_6; ?></p></th>
			<th><p id="ammount_6" class="ammount"><?php echo $ammount_6; ?></p></th>
		</tr>
		<tr class="input">
			<th><input type="number" name="product_id_7" class="id" value="<?php echo $product_id_7 ?>"></th>
			<th><input type="text" name="product_description_7" class="disc" value="<?php echo $product_description_7 ?>"></th>
			<th><input type="number" name="quantity_7" class="qty" value="<?php echo $quantity_7 ?>"></th>
			<th><p id="rate_7" class="rate"><?php echo $rate_7; ?></p></th>
			<th><p id="ammount_7" class="ammount"><?php echo $ammount_7; ?></p></th>
		</tr>
		<tr class="input">
			<th><input type="number" name="product_id_8" class="id" value="<?php echo $product_id_8 ?>"></th>
			<th><input type="text" name="product_description_8" class="disc" value="<?php echo $product_description_8 ?>"></th>
			<th><input type="number" name="quantity_8" class="qty" value="<?php echo $quantity_8 ?>"></th>
			<th><p id="rate_8" class="rate"><?php echo $rate_8; ?></p></th>
			<th><p id="ammount_8" class="ammount"><?php echo $ammount_8; ?></p></th>
		</tr>
		<tr class="red input">
			<td></td>
			<th>Total</th>
			<th><p id="item_total" class="ammount"><?php echo $quantity_total; ?></p></th>
			<td></td>
			<th><p id="ammount_total_1" class="ammount"><?php echo $ammount_total_1; ?></p></th>
		</tr>
		<tr>
			<td colspan="2" rowspan="4" style="background-color: #CACACA; padding-left: 10px;"><h4 style="line-height: 0px;">Terms And Conditions :</h4>
			<ol>
				<li>Goods once sold will not be accepted back.</li>
				<li>You will be solely responsible for the loss or damage in transit.</li>
			</ol></td>
			<th style="background-color: #5B5959;">Discount</th>
			<th style="background-color: #5B5959;"><input type="number" step="0.01" name="discount" class="discount" style="" value="<?php echo $discount; ?>">%</th>
			<th class="total_amm" style="background-color: #5B5959;"><span id="ammount_total_2"><?php echo $ammount_total_2; ?></span></th>
		</tr>
		<tr>
			<th colspan="2" style="background-color: #828282;">Taxable Total</th>
			<th class="total_amm" style="background-color: #828282;"><span id="ammount_total_3"><?php echo $ammount_total_3; ?></span></th>
		</tr>
		<tr>
			<th style="background-color: #CACACA;">GST: +</th>
			<th style="background-color: #CACACA;"><input type="number" name="gst" step="0.01" class="gst" style="" value="<?php echo $gst; ?>">%</th>
			<th class="total_amm" style="background-color: #CACACA;"><span id="ammount_total_4"><?php echo $ammount_total_4; ?></span></th>
		</tr>
		<tr>
			<th colspan="2" class="grand_total">Grand Total</th>
			<th class="grand_total_num"><p id="ammount_total_5" class="ammount"><?php echo $ammount_total_5; ?></p></th>
		</tr>
		<tr class="sign" style="background-color: #CDB5B5;">
			<td colspan="2"><span class="thanku">Thank You. Visit Again !!!</span></td>
			<td colspan="3	" class="login_user">Counter : <span><?php echo $login_user;?></span></td>
		</tr>
	</table>
	<input type="submit" class="printbtn" name="Calculate" value="Calculate" title="Calculates total ammount">
	<input type="submit" class="printbtn" name="Alter_Stock" value="Alter Stock" title="Removes products in the bill from stock database">
	<input type="submit" class="printbtn" name="back" value="Back" title="All data on this page will be destroid">
	<input type="submit" class="printbtn" name="reset" value="Reset" title="All data on this page will be destroid and new bill is formed">
	<input type="submit" class="printbtn" name="send_email" value="Send as Mail" title="All data on this page will be destroid">
	</form>
	<button  class="printbtn" onclick="window.print()">Print Page</button>
</body>
</html>