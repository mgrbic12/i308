//max grbic
///i308 M2 Team:32
<?php
//Step 2.1 
$con=mysqli_connect("db.sice.indiana.edu","i308s19_team32","my+sql=i308s19_team32", "i308s19_team32");
// Check connection
if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connection_error()); }
else 
	{ echo "Established Database Connection<br>" ;}
	


$var_fname = mysqli_real_escape_string($con, $_POST['form-afname']);
$var_lname = mysqli_real_escape_string($con, $_POST['form-alname']);
$var_bday = mysqli_real_escape_string($con, $_POST['form-abday']);
$var_gender = mysqli_real_escape_string($con, $_POST['form-agender']);

$sql="INSERT INTO artist (fname, lname, dob, gender) VALUES
('$var_fname', '$var_lname', '$var_bday', '$var_gender')";
if (mysqli_query($con, $sql))
	{echo "1 record added";}
Else
	{ die('SQL Error: ' . mysqli_error($con) ); }
mysqli_close($con);

?>