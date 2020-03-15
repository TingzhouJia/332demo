<?php

include_once "../model/pdoMysql.class.php";

function fetchAllAnimals(){
    global $MyPDO;
    return $MyPDO::getAll("select * from Animal");
}

function specificOne($id){
    global $MyPDO;
    return $MyPDO::getAll("select * from (select * from Animal where animal_id= '".$id."') as a join (select * from Organization) as o on a.location=o.name ");
    
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

function MoveAnAnimal($driver,$location,$animal_id){
    global $MyPDO;
    $animalinfo=$MyPDO::getAll("select location, animal_id from Animal where animal_id= '".$animal_id."'");
    try{
        $MyPDO::beginTransaction();
        $gerid=uniqid();
        $MyPDO::add(array("payment_id"=>$gerid,"payee"=>$animalinfo[0]["location"],
        "payer"=>$location,"amount"=>0,"dateOfTransaction"=>date("now"),"typeOfTransaction"=>"Movement"
    ),"MoneyTransaction");
        $MyPDO::add(array("payment_id"=>$gerid,"driver"=>$driver,"departure"=>$animalinfo[0]["location"],
        "destination"=>$location,"animal_id"=>$animal_id
    ),"Movement");
        $MyPDO::update(array("location"=>$location),"Animal","animal_id = '".$animal_id."' ");
       
        $MyPDO::commit();
        return "<script> window.location.href='../View/adoption.php'</script>";
    }catch(Exception $e){
        $MyPDO::rollBack();
        $MyPDO::throw_exception($e);
        
    }
}

function AdoptAnAnimal($name,$address,$phone,$id,$value){
    global $MyPDO;
    $animalinfo=$MyPDO::getAll("select location, animal_id from Animal where animal_id= '".$id."'");
    try{
        $MyPDO::beginTransaction();
        $gerid=uniqid();
        $MyPDO::add(array("payment_id"=>$gerid,"payee"=>$animalinfo[0]["location"],
        "payer"=>$name,"amount"=>$value,"dateOfTransaction"=>date("now"),"typeOfTransaction"=>"Purchase"
    ),"MoneyTransaction");
       
        //$MyPDO::update(array("location"=>$location),"Animal","animal_id = '".$animal_id."' ");
        $MyPDO::add(array("name_adopter"=>$name,"address"=>$address,"phone_number"=>$phone,"animal_id"=>$id,"payment_id"=>$gerid),"AdoptedList");
        $MyPDO::delete("Animal","animal_id = '".$id."' ");
       
        $MyPDO::commit();
        return "<script> window.location.href='../View/adoption.php'</script>";
    }catch(Exception $e){
        $MyPDO::rollBack();
        $MyPDO::throw_exception($e);
        
    }
}