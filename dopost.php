<meta charset="utf-8" />
<?php

// connect database
$host = "localhost";
$user = "it58160038";
$passwd = "23072539";
$dbname = "it58160038";
$conn = new mysqli($host,$user,$passwd,$dbname);
$conn->query('SET NAMES UTF8');

echo "<h3>View posted data:</h3>";
echo "<pre>";
print_r($_POST);
echo "</pre>";
echo "<hr>";
echo "<h3>View indiviidual data:</h3>";
echo $_POST['name'] . "<br />";
echo $_POST['email'] . "<br />";
echo $_POST['address'] . "<br />";




$name = $_POST['name'];
$email = $_POST['email'];
$sex = $_POST['sex'];
$intr1 = $_POST['intr1'];
$intr2 = $_POST['intr2'];
$address = $_POST['address'];
$province = $_POST['province'];

if(isset($_POST['submit'])) {
   $sql = "INSERT INTO register (name, email, sex,intr1,intr2,address,PROVINCE_ID) values ('$name', '$email', '$sex', '$intr1', '$intr2', '$address', '$province')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

?>
<html>
<head>
<title></title>
</head>
<body>

    <button type="button"><a href="http://angsila.cs.buu.ac.th/~58160038/887371/lab07/show_register.php">
		Info
	</a></button>
    </body>
    </html>
