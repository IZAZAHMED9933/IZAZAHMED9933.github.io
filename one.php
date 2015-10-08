 <!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="main2.css"/>
<title>Untitled Document</title>
</head>

<body>
<div id="home"><a href="index.php">Home</a></div>


<?php
												// define configuration filename and path
$configFile = 'config.ini';
												// if form not yet submitted
												// display form
if (!isset($_POST['submit'])) {
												// set up array with default parameters
$data = array();
$data['EmailAddress'] = null;
$data['DefAuthor'] = null;
$data['NumMobile'] = null;
												// read current configuration values
												// use them to pre-fill the form
if (file_exists($configFile)) {
$lines = file($configFile);
foreach ($lines as $line) {
$arr = explode('=', $line);
$i = count($arr) - 1;
$data[$arr[0]] = $arr[$i];
}
}
?>
<div id="one"><form method="post" action="one.php">
<p>Email address: <br />
<input type="text" size="50" name="data[EmailAddress]" value="<?php
echo $data['EmailAddress']; ?>"/>
<p>
Name: <br />
<input type="text" name="data[DefAuthor]" value="<?php echo
$data['DefAuthor']; ?>"/>
<p>
Mobile Number: <br />
<input type="text" size="10" name="data[NumPosts]" value="<?php echo
$data['NumMobile']; ?>"/>
<p>
<input type="submit" name="submit" value="Submit" />
</form></div>
<?php
														// if form submitted
														// process form input
} else {
														// read submitted data
$config = $_POST['data'];
														// validate submitted data as necessary
														// open and lock configuration file for writing
$fp = fopen($configFile, 'a+') 
or die('ERROR: Cannot open configuration
file for writing');
flock($fp, LOCK_EX) or die('ERROR: Cannot lock configuration file for
writing');
														// write each configuration value to the file
foreach ($config as $key => $value) {
//if (trim($value) != '') 
{
fwrite($fp, "$value\n") or die('ERROR: Cannot write [$key] to
configuration file');
}
}
															// close and save file
flock($fp, LOCK_UN) or die ('ERROR: Cannot unlock file');
fclose($fp);
echo 'Configuration data successfully written to file.';
}
?>








</body>
</html>