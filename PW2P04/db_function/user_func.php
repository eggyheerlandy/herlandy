<?php

function  login($username,$password){

    $link = createMySQLConnection();
    $query = "SELECT id,username,name,role_id FROM user WHERE username = ? AND password = ? LIMIT 1";
    $statment = $link ->prepare($query);
    $statment->bindParam(1,$username);
    $statment->bindParam(2,$password);
    $statment->execute();
    $result = $statment->fetch();
    $link= null;
    return $result;

}
function getAllUser()
{
    $link = createMySQLConnection();

    $query='SELECT u.id, u.username, r.name as role FROM user u INNER JOIN role r ON u.role_id = r.id';
    $result=$link->query($query);
    return $result;

}


function deleteUser($id)
{
    $link = createMySQLConnection();
    $link->beginTransaction();

    $query = 'DELETE FROM user WHERE id=?';
    $statement = $link->prepare($query);
    $statement->bindParam(1, $id, PDO::PARAM_INT);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
}

function updateUser($id,$name)
{
    $link = createMySQLConnection();
    $link->beginTransaction();

    $query = 'UPDATE user SET password=? WHERE id=?';
    $statement = $link->prepare($query);
    $statement->bindParam(1,$password,PDO::PARAM_INT);
    $statement->bindParam(2, $id, PDO::PARAM_INT);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
}

function getUser($id){
    $link = createMySQLConnection();
    $query= "SELECT * FROM user WHERE id=? LIMIT 1";
    $statement = $link->prepare($query);
    $statement->bindParam(1, $id, PDO::PARAM_INT);
    $statement->execute();
    $result=$statement->fetch();
    $link = null;
    return $result;

}

?>
