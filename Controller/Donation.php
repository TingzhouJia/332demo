<?php

include "../model/pdoMysql.class.php"; 

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
    return  $MyPDO::find("MoneyTransaction","payer= '".$name."' and ".$GLOBALS['typeDonation']);
       
}
//get donor for diff years
function findAllDonor($year="all"){
    global $MyPDO;
    if($year==="all"){
        return $MyPDO::find("MoneyTransaction",$GLOBALS['typeDonation']);
    }else{
        return $MyPDO::find("MoneyTransaction","YEAR(dateOfTransaction) = ".$year." and ".$GLOBALS['typeDonation']);
    }
}
//get namelist of payer
$donorList=$MyPDO::find("MoneyTransaction",null,array(" DISTINCT payer"));


