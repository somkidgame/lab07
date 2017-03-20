
<?php
// connect database
$host = "localhost";
$user = "it58160038";
$passwd = "23072539";
$dbname = "it58160038";
$conn = new mysqli($host,$user,$passwd,$dbname);
$conn->query('SET NAMES UTF8');

//select data
$query ="SELECT * FROM register NATURAL JOIN provinces WHERE register.PROVINCE_ID=provinces.PROVINCE_ID ";

$result = $conn->query($query);

?>

<html>
<head>
<title>Register</title>
<meta charset="UTF-8">

</head>
<body>
<table align=center border=1>
<tr>
<td align=center>#</td>
<td align=center>ชื่อ</td>
<td align=center>อีเมล</td>
<td align=center>เพศ</td>
<td align=center>ความสนใจ</td>
<td align=center>ที่อยู่</td>
<td align=center>จังหวัด</td>
</tr>
<?php while ($row = $result->fetch_array()) { ?>
<tr>
<td align=center><?php echo $row['id']; ?></td>
<td align=center><?php echo $row['name']; ?></td>
<td align=center><?php echo $row['email']; ?></td>
<td align=center><?php echo $row['sex']; ?></td>
<td align=center><?php echo $row['intr1']; ?><?php if ($row['intr1'] != '') echo "<br>"; ?><?php echo $row['intr2']; ?></td>
<td align=center><?php echo $row['address']; ?></td>
<td align=center><?php echo $row['PROVINCE_NAME']; ?></td>
</tr>
<?php }
$result->close();
?>
</table><br>

    <center><button type="button"><a href="http://angsila.cs.buu.ac.th/~58160038/887371/lab07/register_form.php">
		Register
	</a></button>
    
</body>
<html>