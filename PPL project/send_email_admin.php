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
		.tags {
			font-family:  Trebuchet MS;
			font-size: 20px;
			line-height: 20px;
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
	$email = "";
	$email_err = "Email";
	function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST['email'])) {
			$email_err = "Email is required";	
		} else {
			$email = test_input($_POST['email']);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo '<script language="javascript">';
				echo 'alert("Invalid email format!!")';
				echo '</script>';
			} else {
				$done = $done + 1;
				$_SESSION['email'] = $email;
			}
		}
	}		
	if (isset($_POST['send_email']) and ($done == 1)) {
		require 'phpmailer/PHPMailerAutoload.php';
		$to_email = $email;
        $mail= new PHPMailer(); // defaults to using php "mail()"
		$mail->IsSMTP();
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;
		$mail->Username = 'SuprimeMall@gmail.com';
		$mail->Password = 'SuprimeMall';
		$mail->From = 'SuprimeMall@gmail.com';
		$mail->FromName = 'SuprimeMall.com';
		$address = $email;
		$mail->AddAddress($address);
		$mail->Subject    = "Suprime Mall Bill";
		$mail->Body    = '<!DOCTYPE html>
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
			height: auto;
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
		.date {
			width: 150px;
			border: none;
			background-color: #FF0000;
			font-weight: bold;
			font-size: 17px;
			font-family: Times New Roman;
			letter-spacing: 1px;
		}
		.invoice_no {
			width: 95px;
			border: none;
			background-color: #FF0000;
			font-family:Arial;
			font-size: 18px;
			letter-spacing: 1px;
			text-align: center;
		}
		.textarea, label {
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
			line-height: 0px;
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
			font-size: 11px;
		}
		.qty {
			width: 50px;
			text-align: right;
		}
		.rate {
			width: 120px;
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
		.disp {
			display:inline;
			line-height:30px;
		}
	</style>
</head>
<body>
	<form method="post">	
	<table class="frame">
		<tr class="header">
			<th colspan="2" class="address"><h2 id="main_header">SUPRIME MALL</h2>
				<div class="white main_address"><p>Revenue Colony,<br>Shivajinagar, Pune,<br>Maharashtra 411005</p></div>
			</th>
			<th class="address white" colspan="3" style="text-align: right;font-size: 18px;">Date : <p class="disp date">'.$_SESSION["date"].'</p><br>Invoice No. : <p class="disp invoice_no">'.$_SESSION["invoice_no"].'</p></th>
		</tr>
		<tr>
			<td colspan="2" class="address customer_info"><p class="disp textarea">'.$_SESSION["customer_name_add"].'</p><br><br>
				<label>Phone No. : <p class="disp phone">'.$_SESSION["phone_no"].'</p><br>
				<label>Email ID : </label><p class="disp email">'.$_SESSION["email"].'</p>
			</td>
				<td colspan="3" class="address left"><p class="disp textarea">'.$_SESSION["shipment"].'</p></td>
		</tr>
		<tr class="red" style="line-height: 30px;">
			<th>Product ID</th>
			<th>Product Description</th>
			<th>Quantity</th>
			<th>Rate</th>
			<th>Total</th>
		</tr>
		<tr class="input">
			<th><p class="disp id">'.$_SESSION["product_id_1"].'</p></th>
			<th><p class="disp disc">'.$_SESSION["product_description_1"].'</p></th>
			<th><p class="disp qty">'.$_SESSION["quantity_1"].'</p></th>
			<th><p class="disp rate">'.$_SESSION["rate_1"].'</p></th>
			<th><p class="disp ammount">'.$_SESSION["ammount_1"].'</p></th>
		</tr>
		<tr class="input">
			<th><p class="disp id">'.$_SESSION["product_id_2"].'</p></th>
			<th><p class="disp disc">'.$_SESSION["product_description_2"].'</p></th>
			<th><p class="disp qty">'.$_SESSION["quantity_2"].'</p></th>
			<th><p class="disp rate">'.$_SESSION["rate_2"].'</p></th>
			<th><p class="disp ammount">'.$_SESSION["ammount_2"].'</p></th>
		</tr>
		<tr class="input">
			<th><p class="disp id">'.$_SESSION["product_id_3"].'</p></th>
			<th><p class="disp disc">'.$_SESSION["product_description_3"].'</p></th>
			<th><p class="disp qty">'.$_SESSION["quantity_3"].'</p></th>
			<th><p class="disp rate">'.$_SESSION["rate_3"].'</p></th>
			<th><p class="disp ammount">'.$_SESSION["ammount_3"].'</p></th>
		</tr>
		<tr class="input">
			<th><p class="disp id">'.$_SESSION["product_id_4"].'</p></th>
			<th><p class="disp disc">'.$_SESSION["product_description_4"].'</p></th>
			<th><p class="disp qty">'.$_SESSION["quantity_4"].'</p></th>
			<th><p class="disp rate">'.$_SESSION["rate_4"].'</p></th>
			<th><p class="disp ammount">'.$_SESSION["ammount_4"].'</p></th>
		</tr>
		<tr class="input">
			<th><p class="disp id">'.$_SESSION["product_id_5"].'</p></th>
			<th><p class="disp disc">'.$_SESSION["product_description_5"].'</p></th>
			<th><p class="disp qty">'.$_SESSION["quantity_5"].'</p></th>
			<th><p class="disp rate">'.$_SESSION["rate_5"].'</p></th>
			<th><p class="disp ammount">'.$_SESSION["ammount_5"].'</p></th>
		</tr>
		<tr class="input">
			<th><p class="disp id">'.$_SESSION["product_id_6"].'</p></th>
			<th><p class="disp disc">'.$_SESSION["product_description_6"].'</p></th>
			<th><p class="disp qty">'.$_SESSION["quantity_6"].'</p></th>
			<th><p class="disp rate">'.$_SESSION["rate_6"].'</p></th>
			<th><p class="disp ammount">'.$_SESSION["ammount_6"].'</p></th>
		</tr>
		<tr class="input">
			<th><p class="disp id">'.$_SESSION["product_id_7"].'</p></th>
			<th><p class="disp disc">'.$_SESSION["product_description_7"].'</p></th>
			<th><p class="disp qty">'.$_SESSION["quantity_7"].'</p></th>
			<th><p class="disp rate">'.$_SESSION["rate_7"].'</p></th>
			<th><p class="disp ammount">'.$_SESSION["ammount_7"].'</p></th>
		</tr>
		<tr class="input">
			<th><p class="disp id">'.$_SESSION["product_id_8"].'</p></th>
			<th><p class="disp disc">'.$_SESSION["product_description_8"].'</p></th>
			<th><p class="disp qty">'.$_SESSION["quantity_8"].'</p></th>
			<th><p class="disp rate">'.$_SESSION["rate_8"].'</p></th>
			<th><p class="disp ammount">'.$_SESSION["ammount_8"].'</p></th>
		</tr>
		<tr class="red input">
			<td></td>
			<th>Total</th>
			<th><p class="disp ammount">'.$_SESSION["quantity_total"].'</p></th>
			<td></td>
			<th><p class="disp ammount">'.$_SESSION["ammount_total_1"].'</p></th>
		</tr>
		<tr>
			<td colspan="2" rowspan="4" style="background-color: #CACACA; padding-left: 10px;"><h4 style="line-height: 0px;">Terms And Conditions :</h4>
			<ol>
				<li>Goods once sold will not be accepted back.</li>
				<li>You will be solely responsible for the loss or damage in transit.</li>
			</ol></td>
			<th style="background-color: #5B5959;">Discount</th>
			<th style="background-color: #5B5959;"><p class="disp ammount">'.$_SESSION["discount"].'</p> %</th>
			<th class="total_amm" style="background-color: #5B5959;"><p class="disp ammount">'.$_SESSION["ammount_total_2"].'</p></th>
		</tr>
		<tr>
			<th colspan="2" style="background-color: #828282;">Taxable Total</th>
			<th class="total_amm" style="background-color: #828282;"><p class="disp ammount">'.$_SESSION["ammount_total_3"].'</p></th>
		</tr>
		<tr>
			<th style="background-color: #CACACA;">GST:+</th>
			<th style="background-color: #CACACA;"><p class="disp ammount">'.$_SESSION["gst"].'</p> %</th>
			<th class="total_amm" style="background-color: #CACACA;"><p class="disp ammount">'.$_SESSION["ammount_total_4"].'</p></th>
		</tr>
		<tr>
			<th colspan="2" class="grand_total">Grand Total</th>
			<th class="grand_total_num"><p class="disp ammount">'.$_SESSION["ammount_total_5"].'</p></th>
		</tr>
		<tr class="sign" style="background-color: #CDB5B5;">
			<td colspan="2"><span class="thanku">Thank You. Visit Again !!!</span></td>
			<td colspan="3" class="login_user">Counter : <p class="disp">'.$adminname.'</p></td>
		</tr>
	</table>
</body>
</html>';
		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 
		$mail->isHTML(true);      // attachment
		if(!$mail->Send()) 
		   {
		    echo "Mailer Error: " . $mail->ErrorInfo;
		   } 
		else{
		  	echo '<script language="javascript">';
			echo 'alert("Mail send to Customer Successfully!!")';
			echo '</script>';
		}
	}
	if (isset($_POST['back'])) {
		unset($_SESSION['date']);
		unset($_SESSION['invoice_no']);
		unset($_SESSION['customer_name_add']);
		unset($_SESSION['shipment']);
		unset($_SESSION['phone_no']);
		unset($_SESSION['email']);
		unset($_SESSION['product_id_1']);
		unset($_SESSION['product_description_1']);
		unset($_SESSION['quantity_1']);
		unset($_SESSION['ammount_1']);
		unset($_SESSION['rate_1']);
		unset($_SESSION['product_id_2']);
		unset($_SESSION['product_description_2']);
		unset($_SESSION['quantity_2']);
		unset($_SESSION['ammount_2']);
		unset($_SESSION['rate_2']);
		unset($_SESSION['product_id_3']);
		unset($_SESSION['product_description_3']);
		unset($_SESSION['quantity_3']);
		unset($_SESSION['ammount_3']);
		unset($_SESSION['rate_3']);
		unset($_SESSION['product_id_4']);
		unset($_SESSION['product_description_4']);
		unset($_SESSION['quantity_4']);
		unset($_SESSION['ammount_4']);
		unset($_SESSION['rate_4']);
		unset($_SESSION['product_id_5']);
		unset($_SESSION['product_description_5']);
		unset($_SESSION['quantity_5']);
		unset($_SESSION['ammount_5']);
		unset($_SESSION['rate_5']);
		unset($_SESSION['product_id_6']);
		unset($_SESSION['product_description_6']);
		unset($_SESSION['quantity_6']);
		unset($_SESSION['ammount_6']);
		unset($_SESSION['rate_6']);
		unset($_SESSION['product_id_7']);
		unset($_SESSION['product_description_7']);
		unset($_SESSION['quantity_7']);
		unset($_SESSION['ammount_7']);
		unset($_SESSION['rate_7']);
		unset($_SESSION['product_id_8']);
		unset($_SESSION['product_description_8']);
		unset($_SESSION['quantity_8']);
		unset($_SESSION['ammount_8']);
		unset($_SESSION['rate_8']);
						        
		unset($_SESSION['quantity_total']);
		unset($_SESSION['ammount_total_1']);
		unset($_SESSION['ammount_total_2']);
		unset($_SESSION['ammount_total_3']);
		unset($_SESSION['ammount_total_4']);
		unset($_SESSION['ammount_total_5']);
		unset($_SESSION['discount']);
		unset($_SESSION['gst']);
		header("location: create_bill_admin.php");
	}
	?>
	<table>
		<tr>
			<th id="box">
			  	<div>
			  		<h4 id="header">Send Email</h4>
			  		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>"  name="add_stock" autocomplete="off">
			  			<h5 class="tags">From : </h5>
			  			<input type="text" placeholder="<?php echo $email_err;?>" name="sender_email" class="inputs" value="abhishekhonmute@gmail.com" disabled>
			  			<h5 class="tags">To : </h5> 
			  			<input type="text" placeholder="<?php echo $email_err;?>" name="email" class="inputs" value="<?php echo $_SESSION["email"] ?>"><br><br><br><br>
						<button class="login_button" type="submit" name="send_email">Send Mail</button><br><br><br>
			  			<button type="submit" class="back" name="back" target="_blank">Back</button>
			  		</form>
			  	</div>
			</th>
		</tr>
	</table>
</body>
</html>