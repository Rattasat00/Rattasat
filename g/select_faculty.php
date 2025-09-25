<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รัฐศาสตร์ บรรจงกุล (ตั้น)</title>
</head>

<body>
<h1>แสดงข้อมูลคณะ -- รัฐศาสตร์ บรรจงกุล (ตั้น) </h1>

<?php
     include("connectdb.php");
	 $sql = "SELECT * FROM faculty ";
	 $rs = mysqli_query($conn,$sql);
	 while($data = mysqli_fetch_array($rs)) {
		  echo $data["f_id"]."<br>" ;
		  echo $data["f_name"]."<br>" ;	 
	 }
	 
	 mysqli_close($conn);
?>

</body>
</html>