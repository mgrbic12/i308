
<!doctype html>
<html>
	<body>
		<h3>Album Table</h3>
		<h2>Insert a new album</h2>
		<form action="insertalbum.php" method="post">
			Title: <input type="text" name="form-title" maxlength=300 size=50 required><br>
			Band: <select name="bid" required>
<?php
$con=mysqli_connect("db.sice.indiana.edu","i308s19_team32","my+sql=i308s19_team32", "i308s19_team32");
// Check connection
if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connection_error()); }
else 
	{ echo "Established Database Connection<br>" ;}
	$sql = "SELECT bid,name FROM band ORDER BY name";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
                  unset($id, $name);
                  $id = $row['bid'];
                  $name = $row['name']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
}
?>
			</select>
			</br>
			Published Year: <input type="text" name="form-pubyear" min="1900" max="2025" required><br>
			Publisher: <input type="text" name="form-publisher" maxlength=300 size=50 required><br>
			Format <select name="form-format" required>
				<option value="CD">CD</option>
				<option value="Stream">Stream</option>
				<option value="Vinyl">Vinyl</option>
				<option value="Cassett">Cassett</option>
				</select>
			<br>
			Price: $<input type="text" name="form-price" min="0" max="99999.99" required>Between $0 and $99,999.99<br>
			<input type="submit" value="Insert Album">
		<h2>Album Select</h2>
		</form>
		<form action="selectalbum.php" method="post">
		<input type="submit" value="Select Album">
		</form>
	</body>
</html>