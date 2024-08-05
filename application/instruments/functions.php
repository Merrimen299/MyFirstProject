<?php

function addUser(PDO $connection, $name, $pass, $firstname, $lastname){
    $sql = "INSERT INTO `users`(`login`, `password`, `first_name`, `last_name`) VALUES ('$name','$pass','$firstname','$lastname')";
    $connection->query($sql);
}

function countUser(PDO $connection, $login){
    $sql = "SELECT COUNT(*) FROM `users` WHERE `login`= '$login'";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    return $count;
}


function getUserByID(PDO $connection, $id){
    $sql = "SELECT * FROM `users` WHERE `id_user` = '$id'";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $login = $stmt->fetch();
    return $login;
}

function setUserMain(PDO $connection, $id , $login, $firstname, $lastname, $birth){
    $sql = "UPDATE `users` SET ,`login`='$login',`first_name`='$firstname',`last_name`='$lastname',`birthday`='$birth' WHERE `id_user` = '$id'";
    $connection->query($sql);
}
function setUserAdress(PDO $connection, $id, $country, $city, $street, $house, $index){
    $sql = "UPDATE `users` SET `country`='$country',`city`='$city',`street`='$street',`house`='$house',`post_index`='$index' WHERE `id_user` = '$id'";
    $connection->query($sql);
}
function setUserPass(PDO $connection, $id, $pass){
    $sql = "UPDATE `users` SET `password`='$pass' WHERE `id_user` = '$id'";
    $connection->query($sql);
}

function getProduct(PDO $connection, $code){
    $sql = "SELECT * FROM tov WHERE id_tov='$code'";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $product = $stmt->fetch();
    return $product;
}


