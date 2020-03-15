<?php

include_once "../model/pdoMysql.class.php";

function fetchAllAnimals(){
    global $MyPDO;
    return $MyPDO::getAll("select * from Animal");
}

function fetchWithCondition($conditions){
    global $MyPDO;
    if(is_array($conditions)){
        $condition1=$conditions[0]!=="no"?" typeOfAnimal='".$conditions[0]."' ":" 1 ";
        $condition2=$conditions[1]!=="no"?" YEAR(origin_date)='".$conditions[1]."' ":"  1 ";
        $condition3=$conditions[2]!=="no"?" location='".$conditions[2]."' ":" 1 ";
        $sql="(SELECT animal_id FROM `Movement` as a join 
        (SELECT name, typeOfOrganization from `Organization`) as b on a.departure=b.name and b.typeOfOrganization='SPCA' join 
        (SELECT name, typeOfOrganization from `Organization`) as c on a.destination=c.name and c.typeOfOrganization='shelter') as e";

        $condition4=$conditions[3]==="join"?$sql:"";
        
      
        if($condition4===""){
            return $MyPDO::find("Animal",implode(" and ",array($condition1,$condition2,$condition3)));
        }else{
            $prepare1="(select * from Animal where".implode(" and ",array($condition1,$condition2,$condition3)).") as temp join ";
            return $MyPDO::getAll("select * from ".$prepare1.$sql." on temp.animal_id=e.animal_id");
        }
        
    }
}