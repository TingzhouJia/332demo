<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
</head>
<body>
<table>
<?php
$dbh = new PDO('mysql:host=localhost;dbname=332project', "root", "");
$sth=$dbh->prepare("select * from movement");
$sth->execute();
$move_list = $sth->fetchAll(\PDO::FETCH_ASSOC);
$list_Animal = False;
$list = array();
foreach($move_list as $row)
{
	if($row["departure"] == "PetsHome" or $row["departure"] == "AnotherPetsHome")
	{
		if($row["destination"] == "Shelter" or $row["destination"] == "AnotherShelter")
		{
			$list_Animal = TRUE;
			array_push($list, $row["animal_id"]);
		}
	}
}
if($list_Animal == TRUE)
{
	echo "<tr><th>animal id</th><th>type</th><th>location</th><th>profile</th><th>origin date</th><th>price</th></tr>";
	foreach($list as $id){
		$info = $dbh->prepare("select * from animal where animal_id = '$id'");
		$info->execute();
		$result=$info->fetchAll(\PDO::FETCH_ASSOC);
		echo "<tr><td>".$result[0]["animal_id"]."</td><td>".$result[0]["typeOfAnimal"]."</td><td>".$result[0]["location"]."</td><td>".$result[0]["profile"]."</td><td>".$result[0]["origin_date"]."</td><td>".$result[0]["price"]."</td></tr>";
	}
}else
{
	echo "name can not be found or there is no animal satisfies the condition.";
}
?>
</table>
</body>
</html>