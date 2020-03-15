<?php

require_once "../model/pdoMysql.class.php"; 

$typeDonation="typeOfTransaction = 'Donation'";

function findDonorYear($year){
    global $MyPDO;

   
    return $MyPDO::find("MoneyTransaction",
    "YEAR(dateOfTransaction) = ".$year." and ".$GLOBALS['typeDonation'],
    array("COUNT(amount) as count","SUM(amount) as amount"));
}

//get donation for donor
function findDonor($name){
    global $MyPDO;
    return  $MyPDO::find("MoneyTransaction","payer like '".$name."%' and ".$GLOBALS['typeDonation']);
       
}
//get donor for diff years
function findAllDonor($org="all"){
    global $MyPDO;
    if($org==="all"){
        return $MyPDO::find("MoneyTransaction",$GLOBALS['typeDonation']);
    }else{
        return $MyPDO::find("MoneyTransaction","payee = '".$org."' and ".$GLOBALS['typeDonation']);
    }
}
//get namelist of payer
$donorList=$MyPDO::find("MoneyTransaction",null,array(" DISTINCT payer"));

function totalYearOne($org,$year=2020){
    global $MyPDO;
    return $MyPDO::find("MoneyTransaction","YEAR(dateOfTransaction) = ".$year." and payee = '".$org."'",
    array("COUNT(amount) as count","SUM(amount) as amount"));
}



