<?php


function get_item($item){
    global $con;

    if(empty($item)){
        $sql = 'SELECT * FROM `clothes`';
        $stmt = $con-> prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }else{
        $sql = 'SELECT * FROM `clothes` WHERE ' . $item[0] . ' = ' . $item[1];
        $stmt = $con-> prepare($sql);
        $stmt->execute(array());
        $rows = $stmt->fetchAll();
        return $rows; 
    }
}


function put_item(){
    global $con;
    $sql = 'INSERT INTO clothes (`title`, `category`, `material`, `availability`, `image1`, `image2`, `image3`, `price`, `size` VALUES ?,?,?,?,?,?,?,?,?,?';
    $stmt = $con -> prepare($sql);
    $stmt -> execute(array());
}

function remove_item(){
    global $con;
    $sql = 'DELETE FROM `clothes` WHERE id = (?)';
    $stmt = $con -> prepare($sql);
    $stmt -> execute(array());
}

?>


