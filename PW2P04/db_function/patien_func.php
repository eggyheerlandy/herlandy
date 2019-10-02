<?php


function getAllPatient()
{
    $link = createMySQLConnection();
    $query='SELECT p.med_record_number,p.citizen_id_number,p.name,p.address,p.birth_place,p.birth_date,i.name_class FROM patient p INNER JOIN insurance i ON p.insurance_id=i.id' ;
    $result=$link->query($query);
    return $result;

}


function addPatient($Medical_Record,$Citizen_ID,$Name,$Address,$Birth_Place,$Birth_Date,$Name_Class){
    $link = createMySQLConnection();
    $link->beginTransaction();

    $query='INSERT INTO patient(med_record_number,citizen_id_number,name,address,birth_place,birth_date,insurance_id) VALUES (?,?,?,?,?,?,?)';
    $statement = $link->prepare($query);
    $statement->bindParam(1,$Medical_Record,PDO::PARAM_STR);
    $statement->bindParam(2,$Citizen_ID,PDO::PARAM_STR);
    $statement->bindParam(3,$Name,PDO::PARAM_STR);
    $statement->bindParam(4,$Address,PDO::PARAM_STR);
    $statement->bindParam(5,$Birth_Place,PDO::PARAM_STR);
    $statement->bindParam(6,$Birth_Date,PDO::PARAM_STR);
    $statement->bindParam(7,$Name_Class,PDO::PARAM_STR);
    if ($statement->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }
    $link=null;
}

function deletePatient($id)
{
    $link = createMySQLConnection();
    $link->beginTransaction();

    $query = 'DELETE FROM patient WHERE med_record_number = ?';
    $statement = $link->prepare($query);
    $statement->bindParam(1, $id, PDO::PARAM_STR);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
}

function updatePatient($id,$Medical_Record,$Citizen_ID,$Name,$Address,$Birth_Place,$Birth_Date,$Name_Class)
{
    $link = createMySQLConnection();
    $link->beginTransaction();

    $query = 'UPDATE patient SET med_record_number=?,citizen_id_number=?,name=?,address=?,birth_place=?,birth_date=?
,insurance_id=? WHERE med_record_number=?';
    $statement = $link->prepare($query);

    $statement->bindParam(1,$Medical_Record,PDO::PARAM_STR);
    $statement->bindParam(2,$Citizen_ID,PDO::PARAM_STR);
    $statement->bindParam(3,$Name,PDO::PARAM_STR);
    $statement->bindParam(4,$Address,PDO::PARAM_STR);
    $statement->bindParam(5,$Birth_Place,PDO::PARAM_STR);
    $statement->bindParam(6,$Birth_Date,PDO::PARAM_STR);
    $statement->bindParam(7,$Name_Class,PDO::PARAM_STR);
    $statement->bindParam(8, $id, PDO::PARAM_INT);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
}
function getPatient($id){
    $link = createMySQLConnection();

    $query= "SELECT p.*,i.* FROM patient p JOIN insurance i on p.insurance_id = i.id  WHERE med_record_number=? LIMIT 1";
    $statement = $link->prepare($query);
    $statement->bindParam(1, $id, PDO::PARAM_STR);
    $statement->execute();
    $result=$statement->fetch();
    $link = null;
    return $result;

}
?>