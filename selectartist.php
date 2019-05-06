//max grbic
//i308 M2 Team:32
<?php
//Step 2.1 
$con=mysqli_connect("db.sice.indiana.edu","i308s19_team32","my+sql=i308s19_team32", "i308s19_team32");
// Check connection
if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connection_error()); }
else 
	{ echo "Established Database Connection<br>" ;}
	

$sql="SELECT fname, lname, dob, gender FROM artist";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo $row["fname"]." ". $row["lname"]. " " . $row["dob"]. " " . $row["gender"]."<br>";
    }
} else {
    echo "0 results";
}
mysqli_close($con);
?>