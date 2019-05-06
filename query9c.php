<?php
//Step 2.1 
$con=mysqli_connect("db.sice.indiana.edu","i308s19_team32","my+sql=i308s19_team32", "i308s19_team32");
// Check connection
if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connection_error()); }
else 
	{ echo "Established Database Connection<br>" ;}
	



$sql="SELECT m.majorid AS MajorID, CONCAT(s.fname, ' ', s.lname) AS fullname, SUM(c.credit_hours) AS credits_earned, m.gradreq AS Req, TRUNCATE(SUM(sg.GPA * c.credit_hours)/SUM(c.credit_hours),2) AS overallGPA
FROM Majors AS m, Students AS s, Courses AS c, Students_Grades AS sg, Sections AS sc, Students_Majors AS sm
WHERE s.studentid = sg.studentid
AND sm.studentid = s.studentid
AND sg.studentid = sm.studentid
AND sg.sectionid = sc.sectionid
AND sc.course_num = c.course_num
AND sm.majorid = m.majorid
GROUP BY fullname
HAVING credits_earned >= Req
ORDER BY MajorID ASC, fullname ASC;";

$result = mysqli_query($con, $sql);
$num_rows = mysqli_num_rows($result);

// Display Results
if ($num_rows > 0) {
    echo "<table border=1>";
	echo "<tr><th>MajorID</th><th>Full Name</th><th>Credits Earned</th><th>Req</th><th>Overall GPA</th>";
    // Output data of each row, ->fetch_assoc gives array of arrays with keys matching column names
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["MajorID"]."</td><td>".$row["fullname"]."</td><td>".$row["credits_earned"]."</td>
		      <td>".$row["Req"]."</td><td>".$row["overallGPA"]."</td>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
echo "$num_rows Rows\n";

// Close Connection
mysqli_close($con);
?>