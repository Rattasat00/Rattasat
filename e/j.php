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
รหัสนิสิต <input type="number" name = "a" autofocus>
<input type="submit" name="Submit" value="OK">
<br>

<?php
if (isset ($_POST['Submit'])){
	$id = $_POST['a'] ;
	echo "รหัสนิสิต : ". $id. "<br>" ;
	$y = substr($id, 0, 2) ;		//substr ตัดบางส่วนของข้อมูล  0ตัวแรก 2คือ 2ตัวแรก
	echo "<img src='http://202.28.32.211/picture/student/{$y}/{$id}.jpg' width='500'><hr>" ;	
}

?>
</center>
</html>