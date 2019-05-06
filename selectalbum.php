<?php
//Step 2.1 
$con=mysqli_connect("db.sice.indiana.edu","i308s19_team32","my+sql=i308s19_team32", "i308s19_team32");
// Check connection
if (!$con)
	{die("Failed to connect to MySQL: " . mysqli_connection_error()); }
else 
	{ echo "Established Database Connection<br>" ;}
	

$sql="SELECT a.title, b.name, a.published_year, a.publisher, a.format, a.price FROM album as a, band as b WHERE a.bid=b.bid;";
$result = mysqli_query($con, $sql);
echo "<br>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<br>" . $row["title"]. " " . $row["name"]. " " . $row["published_year"] . " " . $row["publisher"]. " " . $row["format"]. " " . $row["price"] ."<br>";
    }
} else {
    echo "0 results";
}
mysqli_close($con);
?>