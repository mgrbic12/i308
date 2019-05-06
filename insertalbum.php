<?php
//Step 2.1 
$con=mysqli_connect("db.sice.indiana.edu","i308s19_team32","my+sql=i308s19_team32", "i308s19_team32");
// Check connection
if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connection_error()); }
else 
	{ echo "Established Database Connection<br>" ;}
	


$var_title = mysqli_real_escape_string($con, $_POST['form-title']);
$var_band = mysqli_real_escape_string($con, $_POST['bid']);
$var_pubyear = mysqli_real_escape_string($con, $_POST['form-pubyear']);
$var_publisher = mysqli_real_escape_string($con, $_POST['form-publisher']);
$var_format = mysqli_real_escape_string($con, $_POST['form-format']);
$var_price = mysqli_real_escape_string($con, $_POST['form-price']);

$sql="INSERT INTO album (published_year, title, price, publisher, format, bid) VALUES
('$var_pubyear', '$var_title', '$var_price', '$var_publisher', '$var_format', '$var_band')";
if (mysqli_query($con, $sql))
	{echo "1 record added";}
Else
	{ die('SQL Error: ' . mysqli_error($con) ); }
mysqli_close($con);

?>