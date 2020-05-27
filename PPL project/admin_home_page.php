<!DOCTYPE html>
<html>
<head>
	<style>
		body {
		  	margin: 0;
		}

		ul {
		  	list-style-type: none;
		  	margin: 0;
		  	padding: 0;
		  	width: 20%;
		  	background-color: #C8C8C8;
		  	position: fixed;
		  	height: 100%;
		  	overflow: auto;
		  	box-shadow: 0px 0px 5px 1px;
		}

		li a {
		  	display: block;
		  	color: #000;
		  	padding: 10px 25px;
		  	text-decoration: none;
		  	height: 25px;
		  	line-height: 25px;
		}
		button.nav_button {
			width: 100%;
			height: 50px; 
			text-align: left;
			padding: 10px 25px;
			border : none;
			font-family: Luminari;
			font-size: 20px;
			background-color: #C8C8C8;
		}
		button.nav_button.active {
		  	background-color: #FF0000 !important;
		  	color: white;
		  	font-size: 21px;
		  	letter-spacing: 1px;
		}

		button.nav_button:hover {
		  	background-color: #555;
		  	color: white;
		  	font-size: 21px;
		  	letter-spacing: 1px;
		  	transition: all 0.1s ease 0s;
		}
		#header {
			width: 100%;
			position: fixed;
			height: 60px;
			background-color: #555 ;
			line-height: 60px;
			padding-left: 30px;
			color: white; 
		  	font-size: 40px;
		  	font-family: Trebuchet MS;
		  	padding-right: 80px;
		}
		#nav_bar {
			margin-top: 60px;
		}
		#main_box {
			margin-left:20%;
			padding:1px 16px;
			padding-top: 60px;
			height: auto;
		}
		#log_out {
			margin-right: 60px;
			float: right;
			height: 60px;
		}
		#username {
			padding-right: 20px;
			float: right;
		}
		#log_out {
			width: 120px;
			color: #fff;
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
		#log_out:hover {
			background: #434343;
			letter-spacing: 1px;
			box-shadow: 0px 0px 30px 5px #FF0000 ;
			transition: all 0.1s ease 0s;
		}
		#log_out:active {
			background-color: #434343 ;
			color: #FF0000;
  			box-shadow: 0px 0px 30px 5px white ;
		}
		#invoice_img {
			margin-left: 300px;
			margin-top: 120px;
			width: 400px;
			height: 200px;
		}
		table, td, tr, th {
			border-collapse: collapse;
			border : solid black 2px;
			line-height: 30px;
		}
		table.counter {
			min-width: 800px;
		}
		table.stock {
			min-width: 900px;
		}
		th {
			color: white;
			background-color: #505050 ;
			font-size: 20px;
		}
		td {
			font-size: 20px;
			padding-left: 5px;
		}
		.add_button {
			width: 230px;
			color: #fff;
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
			margin-top: 20px;
		}
		.add_button:hover {
			background: #434343;
			letter-spacing: 1px;
			transition: all 0.1s ease 0s;
		}
		.add_button:active {
			background-color: #434343 ;
			color: #FF0000;
		}
		.sub_header {
			font-size: 30px;
			font-family: Arial;
		}
		#about {
			font-size: 20px;
			font-family: Arial;
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
	<script type="text/javascript">
		function home_f() {	
			document.getElementById('home_but').classList.add('active');
			document.getElementById('create_bill_but').classList.remove('active');
			document.getElementById('view_counter_but').classList.remove('active');
			document.getElementById('stock_but').classList.remove('active');
			document.getElementById('contact_dev_but').classList.remove('active');
			document.getElementById('about_but').classList.remove('active');
			document.getElementById('home').style.display = "inline-block";
			document.getElementById('create_bill').style.display = "none";
			document.getElementById('view_counter').style.display = "none";
			document.getElementById('stock').style.display = "none";
			document.getElementById('contact_dev').style.display = "none";
			document.getElementById('about').style.display = "none";
		}
		function create_bill_f() {	
			document.getElementById('home_but').classList.remove('active');
			document.getElementById('create_bill_but').classList.add('active');
			document.getElementById('view_counter_but').classList.remove('active');
			document.getElementById('stock_but').classList.remove('active');
			document.getElementById('contact_dev_but').classList.remove('active');
			document.getElementById('about_but').classList.remove('active');
			document.getElementById('home').style.display = "none";
			document.getElementById('create_bill').style.display = "inline-block";
			document.getElementById('view_counter').style.display = "none";
			document.getElementById('stock').style.display = "none";
			document.getElementById('contact_dev').style.display = "none";
			document.getElementById('about').style.display = "none";
		}
		function view_counter_f() {	
			document.getElementById('home_but').classList.remove('active');
			document.getElementById('create_bill_but').classList.remove('active');
			document.getElementById('view_counter_but').classList.add('active');
			document.getElementById('stock_but').classList.remove('active');
			document.getElementById('contact_dev_but').classList.remove('active');
			document.getElementById('about_but').classList.remove('active');
			document.getElementById('home').style.display = "none";
			document.getElementById('create_bill').style.display = "none";
			document.getElementById('view_counter').style.display = "inline-block";
			document.getElementById('stock').style.display = "none";
			document.getElementById('contact_dev').style.display = "none";
			document.getElementById('about').style.display = "none";
		}
		function stock_f() {	
			document.getElementById('home_but').classList.remove('active');
			document.getElementById('create_bill_but').classList.remove('active');
			document.getElementById('view_counter_but').classList.remove('active');
			document.getElementById('stock_but').classList.add('active');
			document.getElementById('contact_dev_but').classList.remove('active');
			document.getElementById('about_but').classList.remove('active');
			document.getElementById('home').style.display = "none";
			document.getElementById('create_bill').style.display = "none";
			document.getElementById('view_counter').style.display = "none";
			document.getElementById('stock').style.display = "inline-block";
			document.getElementById('contact_dev').style.display = "none";
			document.getElementById('about').style.display = "none";
		}
		function contact_dev_f() {	
			document.getElementById('home_but').classList.remove('active');
			document.getElementById('create_bill_but').classList.remove('active');
			document.getElementById('view_counter_but').classList.remove('active');
			document.getElementById('stock_but').classList.remove('active');
			document.getElementById('contact_dev_but').classList.add('active');
			document.getElementById('about_but').classList.remove('active');
			document.getElementById('home').style.display = "none";
			document.getElementById('create_bill').style.display = "none";
			document.getElementById('view_counter').style.display = "none";
			document.getElementById('stock').style.display = "none";
			document.getElementById('contact_dev').style.display = "inline-block";
			document.getElementById('about').style.display = "none";
		}
		function about_f() {	
			document.getElementById('home_but').classList.remove('active');
			document.getElementById('create_bill_but').classList.remove('active');
			document.getElementById('view_counter_but').classList.remove('active');
			document.getElementById('stock_but').classList.remove('active');
			document.getElementById('contact_dev_but').classList.remove('active');
			document.getElementById('about_but').classList.add('active');
			document.getElementById('home').style.display = "none";
			document.getElementById('create_bill').style.display = "none";
			document.getElementById('view_counter').style.display = "none";
			document.getElementById('stock').style.display = "none";
			document.getElementById('contact_dev').style.display = "none";
			document.getElementById('about').style.display = "inline-block";
		}
	</script>
	<div id="header">SUPRIME MALL<button id="log_out" onclick="document.location = 'logout.php'">Log Out</button><span id="username"><?php echo $adminname;?></span></div>
	<ul id="nav_bar">
		<li><button class="nav_button active" onclick="home_f()" id ="home_but" >Home</button></li>
		<li><button class="nav_button" onclick="document.location='create_bill_admin.php'" id="create_bill_but">Create Bill</button></li>
		<li><button class="nav_button" onclick="view_counter_f()" id="view_counter_but">Manage Counters</button></li>
		<li><button class="nav_button" onclick="stock_f()" id="stock_but">Manage Stock</button></li>
		<li><button class="nav_button" onclick="about_f()" id="about_but">About</button></li>
		<li><button class="nav_button" onclick="contact_dev_f()" id="contact_dev_but">Contact Developers</button></li>
	</ul>

	<div id="main_box">
	  	<div id="home">
	  		<img src="invoice.png" alt="invoice" id="invoice_img">
	  	</div>

	  	<div id="create_bill" style="display: none;">
	  		<p>bill</p>
	  		<table>
	  			<tr></tr>
	  		</table>
	  	</div>
	  	<div id="view_counter" style="display: none;">
	  		<button class="add_button" onclick="document.location = 'new_counter_login.php'">Add New Counter</button>
	  		<button class="add_button" onclick="document.location = 'remove_counter.php'">Remove Counter</button>
			<h2 class="sub_header">All Counter Accounts : </h2>
			<?php
			$db_servername = "localhost";
			$db_username = "root";
			$db_password = "";
			$db2_name = "login_details";

			// Create connection
			$conn = new mysqli($db_servername, $db_username, $db_password, $db2_name);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT admin, fullname, gender, email, username FROM login_details_table";
			if ($result = $conn->query($sql)) {
				if ($result->num_rows > 1) {
				    echo "<table class='counter'><tr><th>Fullname</th><th>Gender</th><th>Email</th><th>Username</th></tr>";
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        if ($row["admin"] == 0) {	
				        	echo "<tr><td>" . $row["fullname"]. "</td><td>" . $row["gender"]. "</td><td>" . $row["email"]. "</td><td>" . $row["username"]. "</td></tr>";
				        }
				    }
				    echo "</table>";
				} else {
				    echo "No Counters Found";
				}
			} else {
				echo "Query Failed";
			}
			$conn->close();
			?>	  		
	  	</div>
	  	<div id="stock" style="display: none;">
	  		<button class="add_button" onclick="document.location = 'new_product.php'">Add New Product</button>
	  		<button class="add_button" onclick="document.location = 'add_stock.php'">Add Stock</button>
	  		<button class="add_button" onclick="document.location = 'remove_stock.php'">Remove Stock</button>
	  		<button class="add_button" onclick="document.location = 'remove_product.php'">Remove A Product</button>
			<h2 class="sub_header">All Products Stock : </h2>
			<?php
			$db_servername = "localhost";
			$db_username = "root";
			$db_password = "";
			$db2_name = "products_stock";

			// Create connection
			$conn = new mysqli($db_servername, $db_username, $db_password, $db2_name);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT product_name, product_id, product_discription, product_brand, quantity FROM products_stock_table";
			if($result = $conn->query($sql)) {
				if ($result->num_rows > 0) {
				    echo "<table class='stock'><tr><th>Product Name</th><th>Product ID</th><th>Description</th><th>Brand</th><th>Quantity</th></tr>";
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<tr><td>" . $row["product_name"]. "</td><td>" . $row["product_id"]. "</td><td>" . $row["product_discription"]. "</td><td>" . $row["product_brand"]. "</td><td>" . $row["quantity"]. "</td></tr>";
				    }
				    echo "</table>";
				} else {
				    echo "0 results";
				}
			} else {
				echo "No Products Found";
			}
			$conn->close();
			?>
	  	</div>
	  	<div id="about" style="display: none;">
	  		<h1 class="sub_header">About This App</h1>
	  		<P id = "about">This app is developed for managing stock and counter workers accounts easily and safely. This app provides online database management system with database storage of Counter accounts and available stock of products. The app is very useful for big manafacturing companies or large scale distributers with enough varity of products. Also every bill can be taged with the counters name.The admin can get any information he wants on a button click. The admin is the only one account created at the start with which he/she can manage all counter accounts and products stock. The bill creation page is linked to both admin and counter account page. The  highly advance bill is with automatic calculation and automatic stock deduction system on a button click. The bill can be printed and also can be send as email to customer. The login and logout system is secured using sessions</P>
	  	</div>
	  	<div id="contact_dev" style="display: none;">
	  		<h1 class="sub_header">Contact Developers</h1>
	  		<ol>
	  			<li><h3>Jatish Kharade</h3></li>
	  			<li><h3>Shreyas Hupare</h3></li>
	  			<li><h3>Abhishek Honmute</h3></li>
	  		</ol>
	  	</div>
	</div>

</body>
</html>