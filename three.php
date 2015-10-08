<!doctype html>
<html>
<head>
<link rel="stylesheet" href="main2.css"/>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>


<div id="home"><a href="index.php">Home</a></div>
<div id="three">
<?php
$file = "config.ini"; 

$lines = count(file($file)); 
$lines2 = file($file);
for($i=0;$i<=$lines-3;$i=$i+3)
{
	$j=$i+1;
	$k=$i+2;
	
echo "<p word-spacing:20px;>$lines2[$i] &nbsp; &nbsp; $lines2[$j] &nbsp; &nbsp; $lines2[$k]</br></p>";

}
?>
</div>








</body>
</html>