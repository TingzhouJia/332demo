<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
</head>
<body>
<table>
<?php
$dbh = new PDO('mysql:host=localhost;dbname=332project', "root", "");
$list = $dbh->prepare("select * from animal where origin_date >= '2018-00-00'");
$list->execute();
$rows = $list->fetchAll(\PDO::FETCH_ASSOC);
if(count($rows)>0)
{
	echo "<tr><th>animal id</th><th>type</th><th>location</th><th>profile</th><th>origin date</th><th>price</th></tr>";
	foreach($rows as $row){
		echo "<tr><td>".$row["animal_id"]."</td><td>".$row["typeOfAnimal"]."</td><td>".$row["location"]."</td><td>".$row["profile"]."</td><td>".$row["origin_date"]."</td><td>".$row["price"]."</td></tr>";
	}
}
$dbh = null;
?>
</table>
</body>
</html>