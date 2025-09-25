<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รัฐศาสตร์ บรรจงกุล (ตั้น)</title>
</head>

<body>
<h1>รัฐศาสตร์ บรรจงกุล (ตั้น)</h1>

<form method="post" action="">
กรอกข้อมูล <input type="text" name = "a" autofocus>
<input type="submit" name="Submit" value="OK">
<hr>

<?php
if (isset ($_POST['Submit'])){
	$gender = $_POST['a'] ;      //gender คือตัวแปร ของ a
	if ($gender == 1 ){				//$gender1 คือ ค้นหา 1
		echo "เพศชาย" ;
} 
		else if ($gender == 2 ) {
			echo "เพศหญิง" ;		
} else {
 			echo "ข้อมูลไม่ถูกต้อง" ;
		}
	}
?>



</body>
</html>