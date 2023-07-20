<?php


DEFINE('DB_SERVER', 'localhost:3306');
DEFINE('DB_NAME', 'CreateMe');

session_start();

function ConnGet()
{
    // $dbConn will contain a resource link to the database
    // @ Don't display error

    $dbConn = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME, 3306)
        or die('Failed to connect to MySQL ' . DB_SERVER . '::' . DB_NAME . ' : ' . mysqli_connect_error()); // Display messge and end PHP script

    return $dbConn;
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