<meta charset="utf-8" />
<?php
// connect database
$host = "localhost";
$user = "it58160038";
$passwd = "23072539";
$dbname = "it58160038";
$conn = new mysqli($host,$user,$passwd,$dbname);
$conn->query('SET NAMES UTF8');


//select data
$query ="SELECT * FROM provinces";
$result = $conn->query($query);


?>


<html>
<head>
<meta charset="utf-8">
<title>Form validation</title>
</head>
<body>
<h3>แบบฟอร์มลงทะเบียน</h3>
<form action="dopost.php" method="post" class="a">
ชื่อ-นามสกุล: <br/>
<input type="text" class="text" name="name" id="name" /> <br/>
อีเมลล์: <br/>
<input type="email" class="text" name="email" id="email" /> <br/>
เพศ: <br/>
<input type="radio" class="radio" name="sex" id="sex" value="ชาย" /> ชาย
<input type="radio" class="radio" name="sex" id="sex" value="หญิง" /> หญิง
<br />
ความสนใจ: <br/>
<input type="checkbox" class="checkbox" name="intr1" id="intr1" value="เรียน"  /> เรียน
<input type="checkbox" class="checkbox" name="intr2" id="intr2" value="เกมส์"  /> เกมส์
<br />
ที่อยู่: <br/>
<textarea class="text" name="address" id="address" rows="4" cols="50" ></textarea>
<br />
จังหวัด: <br/>
<select name="province" id="province">
<option value="">---เลือกจังหวัด---</option>
<?php while($row = $result->fetch_array()) { ?>
 <option value="<?php echo $row['PROVINCE_ID']; ?>"> <?php echo $row['PROVINCE_NAME']; ?></option>
<?php } ?>
</select><br />

<br/><br/>
<input type="submit" id="submit" value="Submit" name="submit" />
</form>

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>

$('#submit').on('click',function(event) {
    var valid = true;
    errorMessage = "";

    if($('#name').val() == '') {
        errorMessage = "โปรดป้อนชื่อ-นามสกุล \n";
        valid = false;
    }
    if($('#email').val() == '') {
        errorMessage += "โปรดป้อน email\n";
        valid = false;
    }else if (!(($('#email').val().indexOf(".") > 0) && ($('#email').val().indexOf("@") > 0)) || /[^a-zA-Z0-9.@_-]/.test($('#email').val())) {
	                errorMessage+="โปรดป้อน email ให้ถูกต้อง\n";
	                valid=false;
	}
    if($('#sex').prop("checked")==false && $('#sex').prop("checked")==false){
	        	errorMessage += "โปรดเลือก เพศ \n";
	        	valid = false;
	 }

	if($('#intr1').prop("checked")==false && $('#intr2').prop("checked")==false){
	        	errorMessage += "โปรดเลือกความสนใจอย่างน้อย 1 อย่าง \n";
	        	valid = false;
	}

    if($('#address').val() == '') {
        errorMessage += "โปรดป้อนที่อยู่\n";
        valid = false;
    }


   
    if($('#province').val()==''){
				errorMessage += "โปรดเลือกจังหวัด \n";
				valid = false;
	}


    if( !valid && errorMessage.length > 0) {
        alert(errorMessage);
        event.preventDefault();
    }
});
</script>
<br><br><button type="button"><a href="er.png">
		ER Diagram
	</a></button><br><br>
    <button type="button"><a href="http://angsila.cs.buu.ac.th/~58160038/887371/lab07/show_register.php">
		Source code : dopost.php
	</a></button>
    <button type="button"><a href="http://angsila.cs.buu.ac.th/~58160038/887371/lab07/show_register.php">
		Source code : register_form.php
	</a></button>
    <button type="button"><a href="http://angsila.cs.buu.ac.th/~58160038/887371/lab07/show_register.php">
		Source code : show_register.php
	</a></button>
</body>
</html>