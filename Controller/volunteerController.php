<?php
include_once "../model/pdoMysql.class.php";
function getEmployee($type="no",$place="no"){
    global $MyPDO;
    if($type==="no"){
        if($place==="no"){
            return $MyPDO::getAll("select * from Employee");
        }else{
            return $MyPDO::find("Employee","location= '".$place."'");
        }      
    }else if($type==="driver"){
        if($place==="no"){
            return $MyPDO::getAll("select * from Driver");
        }else{
            return $MyPDO::find("Driver","organizationName = '".$place."'");
        }
        
    }else{
       
        if($place==="no"){
            return $MyPDO::find("Employee","capacity = '".$type."'");
        }
         return $MyPDO::find("Employee","location = '".$place."' and capacity = '".$type."'");
        
    }
}