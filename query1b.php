<?php
//Step 2.1 
$con=mysqli_connect("db.sice.indiana.edu","i308s19_team32","my+sql=i308s19_team32", "i308s19_team32");
// Check connection
if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connection_error()); }
else 
	{ echo "Established Database Connection<br>" ;}
	
$var_sectionid = mysqli_real_escape_string($con, $_POST['section']);


$sql="SELECT DISTINCT CONCAT(s.lname, ', ', s.fname) AS full_name, TRUNCATE(SUM(sg.GPA  * c.credit_hours)/SUM(c.credit_hours),2) AS Class_GPA
FROM Students AS s, Students_Grades AS sg, Courses AS c, Sections AS sc
WHERE sg.studentid = s.studentid
AND sc.sectionid = sg.sectionid
AND c.course_num = sc.course_num
AND sg.sectionid = $var_sectionid
GROUP BY s.studentid;";

$result = mysqli_query($con, $sql);
$num_rows = mysqli_num_rows($result);

// Display Results
if ($num_rows > 0) {
    echo "<table border=1>";
	echo "<tr><th>Full Name</th><th>Class GPA</th>";
    // Output data of each row, ->fetch_assoc gives array of arrays with keys matching column names
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["full_name"]."</td><td>".$row["Class_GPA"]."</td>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
echo "$num_rows Rows\n";

// Close Connection
mysqli_close($con);
?>