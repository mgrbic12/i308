<?php
//Step 2.1 
$con=mysqli_connect("db.sice.indiana.edu","i308s19_team32","my+sql=i308s19_team32", "i308s19_team32");
// Check connection
if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connection_error()); }
else 
	{ echo "Established Database Connection<br>" ;}
	
$var_studentid = mysqli_real_escape_string($con, $_POST['student']);


$sql="SELECT CONCAT(s.lname, ', ', s.fname) AS full_name, c.title AS c_title, sg.letter_grade AS let_grade, c.credit_hours AS c_hours, sg.GPA AS gpa
FROM Courses AS c, Students AS s, Students_Grades AS sg, Sections AS sc
WHERE sc.course_num = c.course_num
AND s.studentid = sg.studentid
AND sc.sectionid = sg.sectionid
AND sc.course_num = c.course_num
AND s.studentid = $var_studentid
UNION SELECT '' AS empty, '' AS empty2, 'TOTAL' AS total, SUM(c.credit_hours) AS total_credits, TRUNCATE(SUM(sg.GPA * c.credit_hours)/SUM(c.credit_hours),2) AS GPA
FROM Courses AS c, Students_Grades AS sg, Sections AS sc, Students AS s
WHERE sc.course_num = c.course_num
AND sc.sectionid = sg.sectionid
AND s.studentid = $var_studentid
AND sg.studentid = $var_studentid
AND sg.letter_grade <> 'F'
GROUP BY s.studentid;";

$result = mysqli_query($con, $sql);
$num_rows = mysqli_num_rows($result);

// Display Results
if ($num_rows > 0) {
    echo "<table border=1>";
	echo "<tr><th>Full Name</th><th>Course Title</th><th>Letter Grade</th><th>Course Hourse</th><th>GPA</th>";
    // Output data of each row, ->fetch_assoc gives array of arrays with keys matching column names
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["full_name"]."</td><td>".$row["c_title"]."</td><td>".$row["let_grade"]."</td>
		      <td>".$row["c_hours"]."</td><td>".$row["gpa"]."</td>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
echo "$num_rows Rows\n";

// Close Connection
mysqli_close($con);
?>