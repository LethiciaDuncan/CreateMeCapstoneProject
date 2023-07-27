<?php


DEFINE('DB_SERVER', 'localhost:3306');
DEFINE('DB_NAME', 'CreateMe');

session_start();

function ConnGet()
{
    
}


function addNewUser($dbConn, $username, $password)
{
    $query = "insert into users (UserName, Password)
values ('" . $username . "', '"  . $password . "',)";
    return @mysqli_query($dbConn, $query);
}

function checkifUserExists($dbConn, $Username)
{
    $query = "select * from users where UserName = '" . $Username . "' ;";
    return @mysqli_query($dbConn, $query);
}

function getUser($dbConn, $UserId)
{
    $query = "select * from users where UserId = '" . $UserId . "' ;";
    return @mysqli_query($dbConn, $query);
}

function deleteUser($dbConn, $Username)
{
    $query = "delete from users user where user.UserName =" . $Username;
    return @mysqli_query($dbConn, $query);
}



?>