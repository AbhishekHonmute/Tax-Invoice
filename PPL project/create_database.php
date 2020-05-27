<?php 
	$servername = "localhost";
	$usrname = "root";
	$password = "";
	$db1_name = "login_details";
	$db2_name = "products_stock";
	$db3_name = "customer_info";
	$db4_name = "bills_data";
	$conn = mysqli_connect($servername, $usrname, $password);
	$sql = "CREATE DATABASE IF NOT EXISTS login_details";
	$conn->query($sql);
	$sql = "CREATE TABLE IF NOT EXISTS login_details (
		admin INT(6) UNSIGNED,
		full_name VARCHAR(255) NOT NULL,
		gender VARCHAR(30) NOT NULL,
		email VARCHAR(255),
		usr_name VARCHAR(255) NOT NULL,
		password VARCHAR(255) NOT NULL,
		)";	
	$conn->query($sql);
	$sql = "CREATE DATABASE IF NOT EXISTS products_stock";
	$conn->query($sql);
	$sql = "CREATE TABLE IF NOT EXISTS products_stock (
		admin INT(6) UNSIGNED,
		full_name VARCHAR(255) NOT NULL,
		gender VARCHAR(30) NOT NULL,
		email VARCHAR(255),
		usr_name VARCHAR(255) NOT NULL,
		password VARCHAR(255) NOT NULL,
		)";	
	$conn->query($sql);
	$sql = "CREATE DATABASE IF NOT EXISTS customer_info";
	$conn->query($sql);
	$sql = "CREATE TABLE IF NOT EXISTS customer_info (
		admin INT(6) UNSIGNED,
		full_name VARCHAR(255) NOT NULL,
		gender VARCHAR(30) NOT NULL,
		email VARCHAR(255),
		usr_name VARCHAR(255) NOT NULL,
		password VARCHAR(255) NOT NULL,
		)";	
	$conn->query($sql);
	$sql = "CREATE DATABASE IF NOT EXISTS bills_data";
	$conn->query($sql);
	$sql = "CREATE TABLE IF NOT EXISTS bills_data (
		admin INT(6) UNSIGNED,
		full_name VARCHAR(255) NOT NULL,
		gender VARCHAR(30) NOT NULL,
		email VARCHAR(255),
		usr_name VARCHAR(255) NOT NULL,
		password VARCHAR(255) NOT NULL,
		)";	
	$conn->query($sql);
?>