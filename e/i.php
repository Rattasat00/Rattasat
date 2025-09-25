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
แม่สูตรคูณ <input type="number" name = "a" autofocus>
<input type="submit" name="Submit" value="OK">
<br>

<?php
if (isset ($_POST['Submit'])){
	$m = $_POST['a'] ;
	
	for ($i=1; $i <=12; $i++){
		$x = $m * $i ;
		echo number_format($m,0)." x ".$i."=".number_format($x,0)."<br>";
		//echo "$m x". $i" = $x <br>"
		}
}

?>
</center>
</html>