<!doctype html>
<html>
	
	<body style="background-color:powderblue;">
	<h1 style="color:red;"><b><u>Team 32</u></b></h1>
	<h3 style="color:blue;"><i>Max Grbic, Hunter Probus, Eric Santiago, Mitchell Gilbert</i></h3>
	
	<br>
	
	<h3><b><u>Query 9c</b></u></h3>
	<h4>Produce a list of students with hours earned and overall GPA who have met the graduation requirements for any major. Sort by major and then by student.</h4>
	<form action="query9c.php" method="post">
		<input type="submit" value="View 9c">
	</form>
	
	<br>
	
	<h3><b><u>Query 5c</b></u></h3>
	<h4>Produce a chronological list of all courses taken by a *specified student*. Show grades earned. Include overall hours earned and GPA at the end.</h4>
	<form action="query5c.php" method="post">
		Specified Student: <select name="student" required>
<?php
$con=mysqli_connect("db.sice.indiana.edu","i308s19_team32","my+sql=i308s19_team32", "i308s19_team32");
// Check connection
if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connection_error()); }
else 
	{ echo "Established Database Connection<br>" ;}
	$sql = "SELECT studentid, fname FROM Students ORDER BY fname";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
                  unset($id, $name);
                  $id = $row['studentid'];
                  $name = $row['fname']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
}
?>
		</select>
		<input type="submit" value="View 5c">
	</form>
	
	<br>
	
	<h3><b><u>Query 3b</b></u></h3>
	<h4>Produce a list of faculty who have never taught a *specified course*.</h4>
	<form action="query3b.php" method="post">
		Specified Course: <select name="course" required>
	
<?php
$con=mysqli_connect("db.sice.indiana.edu","i308s19_team32","my+sql=i308s19_team32", "i308s19_team32");
// Check connection
if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connection_error()); }
else 
	{ echo "Established Database Connection<br>" ;}
	$sql = "SELECT course_num, title FROM Courses ORDER BY title";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
                  unset($id, $name);
                  $id = $row['course_num'];
                  $name = $row['title']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
}
?>
		</select>
		<input type="submit" value="View 3b">
	</form>
	<br>
	
	<h3><b><u>Query 1b</b></u></h3>
	<h4>Produce a class roster for a *specified section* sorted by student’s last name, first name. At the end, include the average grade (GPA for the class.)</h4>
	<form action="query1b.php" method="post">
		Specified Section: <select name="section" required>
<?php
$con=mysqli_connect("db.sice.indiana.edu","i308s19_team32","my+sql=i308s19_team32", "i308s19_team32");
// Check connection
if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connection_error()); }
else 
	{ echo "Established Database Connection<br>" ;}
	$sql = "SELECT sectionid, course_num FROM Sections";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
                  unset($id, $name);
                  $id = $row['sectionid'];
                  $name = $row['sectionid']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
}
?>
		</select>
		<input type="submit" value="View 1b">
	</form>
	<br>
	<br>
	<h2><b><u>Additional Queries</b></u></h2>
	<br>
	<h3><b><u>Additional Query 1</b></u></h3>
	<h4>Select what advisor you want then return the Students who share that advisor</h4>
	<form action="addquery1.php" method="post">
		Advisor: <select name="advisor" required>
<?php
$con=mysqli_connect("db.sice.indiana.edu","i308s19_team32","my+sql=i308s19_team32", "i308s19_team32");
// Check connection
if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connection_error()); }
else 
	{ echo "Established Database Connection<br>" ;}
	$sql = "SELECT advisorid, fname FROM Advisors";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
                  unset($id, $name);
                  $id = $row['advisorid'];
                  $name = $row['fname']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
}
?>
		</select>
		<input type="submit" value="View query1">
	</form>
	<br>
	<h3><b><u>Additional Query 2</b></u></h3>
	<h4>Acquires all forms of contact for each student, returns the type</h4>
	<form action="addquery2.php" method="post">
	Advisor: <select name="type" required>
<?php
$con=mysqli_connect("db.sice.indiana.edu","i308s19_team32","my+sql=i308s19_team32", "i308s19_team32");
// Check connection
if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connection_error()); }
else 
	{ echo "Established Database Connection<br>" ;}
	$sql = "SELECT DISTINCT sp.type
FROM Students_Phone";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
                  unset($type);
                  $type = $row['type']; 
                  echo '<option value="'.$type.'">'.$type.'</option>';
}
?>

		<input type="submit" value="View query2">
	</form>
	<br>
	<br>
	<br>
	<h3><b><u>Back-up query 1a</b></u></h3>
	<h4>Produce a roster for a *specified section* sorted by student’s last name, first name</h4>
	<form action="BUquery1.php" method="post">
		Section: <select name="BUsection" required>
<?php
$con=mysqli_connect("db.sice.indiana.edu","i308s19_team32","my+sql=i308s19_team32", "i308s19_team32");
// Check connection
if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connection_error()); }
else 
	{ echo "Established Database Connection<br>" ;}
	$sql = "SELECT sectionid, studentid FROM Students_Grades";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
                  unset($id, $name);
                  $id = $row['sectionid'];
                  $name = $row['sectionid']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
}
?>
		</select>
		<input type="submit" value="View backup query">
	</form>





</html>