<?php
require_once "../model/pdoMysql.class.php";



class Organization{
    private $organizationList;
    private $organizationSelectList;

    public function __set($name, $value)
    {
        $this->$name=$value;
    }
    public function __get($name)
    {
        return $this->$name;
    }
}
$organization=new Organization();
$organization->organizationList=$MyPDO::getAll("select * from Organization");
$organization->organizationSelectList=$MyPDO::getAll("select name from Organization");
//fetch spca by type
function fetchByType($type){
    global $MyPDO;
    return $MyPDO::find("Organization","typeOfOrganization = '".$type."'","name");
}
//select only spca and shelter
$sheterAndSpca=$MyPDO::getAll("select name from Organization where typeOfOrganization='shelter' or typeOfOrganization='SPCA'");
//select only shelter and rescue organization
$shelterAndRescuer=$MyPDO::getAll("select name from Organization where typeOfOrganization='shelter' or typeOfOrganization='rescue organization' ");
//var_dump($organization->organizationSelectList) ;



