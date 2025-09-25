<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รัฐศาสตร์ บรรจงกุล (ตั้น)</title>
</head> 

<body>	
<!--<center /center> ปรับมาอยู่กลาง--> 
<center><h1>รัฐศาสตร์ บรรจงกุล (ตั้น)</h1>

</body>
<form method="post" action="">
กรอกข้อมูล <input type="text" name = "a" autofocus>
<input type="submit" name="Submit" value="OK">
<br>

<?php
if (isset ($_POST['Submit'])){
	$a = $_POST['a'] ;
	if ($a == "dog" || $a =="หมา" or $a == "สุนัข") {  // เครื่องหมาย || = or ใช้แทน หรือ
		echo "<img src='1.jpg' width='540'>'" ;			// echo คำสั่งเรียกใช้งาน
		}
		else if ($a == "cat" ||  $a == "แมว") {
			echo "<img src='2.jpg' width='540'>'" ;
		}
		else if ($a == "tiger" ||  $a == "เสีย" or $a == "เสือ") {
			echo "<img src='3.jpg' width='540'>'" ;
		}
}

?>
</center>
</html>