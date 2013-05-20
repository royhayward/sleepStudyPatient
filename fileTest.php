<html>
<head>
<title>Download File From MySQL</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
include 'library/config.php';
include 'library/opendb.php';

$query = "SELECT id, name FROM upload";
$result = mysql_query($query) or die('Error, query failed');
if(mysql_num_rows($result) == 0)
{
echo "Database is empty <br>";
} 
else
{
while(list($id, $name) = mysql_fetch_array($result))
{
?>
<a href="download.php?id=<?php=$id;?>"><?php=$name;?></a> <br>
<?php 
}
}
include 'library/closedb.php';
?>
</body>
</html>