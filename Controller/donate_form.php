<?php
include "../model/pdoMysql.class.php";



$transaction=array(
    "payee"=>$_POST["branch_select"],
    "payer"=>$_POST["firstname"]." ".$_POST["lastname"],
    "amount"=>$_POST["other_val"],
    "dateOfTransaction"=>$_POST["date"] ,
    "typeOfTransaction"=>"Donation"
);


$MyPDO::add($transaction,"MoneyTransaction");


echo '<script>window.location.href = "../View/Donor.php";</script>';



