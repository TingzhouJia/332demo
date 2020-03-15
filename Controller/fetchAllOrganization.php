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

function fetchByType($type){
    global $MyPDO;
    return $MyPDO::find("Organization","typeOfOrganization = '".$type."'","name");
}
//var_dump($organization->organizationSelectList) ;



