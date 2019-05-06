<?php
//Step 2.1 
$con=mysqli_connect("db.sice.indiana.edu","i308s19_team32","my+sql=i308s19_team32", "i308s19_team32");
// Check connection
if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connection_error()); }
else 
	{ echo "Established Database Connection<br>" ;}
	
$var_sectionid = mysqli_real_escape_string($con, $_POST['BUsection']);


$sql="SELECT DISTINCT CONCAT(s.lname, ', ', s.fname) AS full_name
FROM Students AS s, Students_Grades AS sg
WHERE sg.studentid = s.studentid
AND sg.sectionid = $var_sectionid;";

$result = mysqli_query($con, $sql);
$num_rows = mysqli_num_rows($result);

// Display Results
if ($num_rows > 0) {
    echo "<table border=1>";
	echo "<tr><th>Full Name</th>";
    // Output data of each row, ->fetch_assoc gives array of arrays with keys matching column names
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["full_name"]."</td>";
    }
    echo "</table>";
} else {
    echo "0 results";
	echo "<br>";
}
echo "$num_rows Rows\n";

// Close Connection
mysqli_close($con);
?>