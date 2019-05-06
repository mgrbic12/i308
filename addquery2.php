<?php
//Step 2.1 
$con=mysqli_connect("db.sice.indiana.edu","i308s19_team32","my+sql=i308s19_team32", "i308s19_team32");
// Check connection
if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connection_error()); }
else 
	{ echo "Established Database Connection<br>" ;}
	
$var_type = mysqli_real_escape_string($con, $_POST['type']);

$sql="SELECT DISTINCT sp.studentid, sp.phone, sp.type
FROM Students_Phone AS sp;";

$sql2 =  "SELECT DISTINCT sp.studentid, sp.phone, sp.type
FROM Students_Phone AS spwhere sp.type = $var_type";

$result = mysqli_query($con, $sql2);
$num_rows = mysqli_num_rows($result);

// Display Results
if ($num_rows > 0) {
    echo "<table border=1>";
	echo "<tr><th>Student ID</th><th>Phone num</th><th>Type</th>";
    // Output data of each row, ->fetch_assoc gives array of arrays with keys matching column names
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["studentid"]."</td><td>".$row["phone"]."</td><td>".$row["type"]."</td>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
echo "$num_rows Rows\n";

// Close Connection
mysqli_close($con);
?>