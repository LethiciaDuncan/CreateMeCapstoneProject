<?php

DEFINE('DB_SERVER', 'localhost:3306');
DEFINE('DB_NAME', 'createme');
DEFINE('DB_USER', 'root');
DEFINE('DB_PSWD', 'test');
session_start();
function ConnGet()
{
    // $dbConn will contain a resource link to the database
    // @ Don't display error

    $dbConn = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME, 3306)
        or die('Failed to connect to MySQL ' . DB_SERVER . '::' . DB_NAME . ' : ' . mysqli_connect_error());

    return $dbConn;
}


function addNewUser($dbConn, $Username, $Password)
{
    $query = "insert into Users(Username, Password)
values ('" . $Username . "', '" . $Password . "')";
    return @mysqli_query($dbConn, $query);
}

function checkifUserExists($dbConn, $Username)
{
    $query = "select * from users where Username = '" . $Username . "' ;";
    return @mysqli_query($dbConn, $query);
}

function getUser($dbConn, $UserId)
{
    $query = "select * from users where UserId = '" . $UserId . "' ;";
    return @mysqli_query($dbConn, $query);
}

function checkifImageExists($dbConn, $CreationPath)
{
    $query = "select * from image where CreationPath = '" . $CreationPath . "' ;";
    return @mysqli_query($dbConn, $query);
}

function getUserCreation($dbConn, $UserId){
    $query = "select CreationPath from image where UserId = '" . $UserId . "' ;";
    return @mysqli_query($dbConn, $query);
}

function getAllCreation($dbConn)
{
    $query = "select CreationPath from image";
    return @mysqli_query($dbConn, $query);
}


function getUserLikes($dbConn, $UserId){
    $query = "select LikesAndFavs.Likes, Images.CreationPath, Images.UserId, records.Difficulty
from LikesAndFavs as LikesAndFavs
inner join Images as Images
		on Images.ImageId = LikesAndFavs.ImageId
inner join Users as Users
		on Users.UserId = LikesAndFavs.UserId
where LikesAndFavs.UserId=" . $UserId . ";";
    return @mysqli_query($dbConn, $query);
}

function getUserFaves($dbConn, $UserId){
     $query = "select LikesAndFavs.Favs, Images.CreationPath, Images.UserId, records.Difficulty
from LikesAndFavs as LikesAndFavs
inner join Images as Images
		on Images.ImageId = LikesAndFavs.ImageId
inner join Users as Users
		on Users.UserId = LikesAndFavs.UserId
where LikesAndFavs.UserId=" . $UserId . ";";
    return @mysqli_query($dbConn, $query);
}

function getCategories($dbConn){
     $query = "select Category from image";
    return @mysqli_query($dbConn, $query);
}

function getCertainCreations($dbConn, $Category)
{
    $query = "select CreationPath from image where Category = '" . $Category . "' ;";
    return @mysqli_query($dbConn, $query);
}

function saveCreation($dbConn,$UserId ,$CreationPath, $Category){
    $query = "insert into Image(UserId, CreationPath, Category)
values ('" . $UserId .  "', '"  . $CreationPath . "', '" . $Category . "')";
    return @mysqli_query($dbConn, $query);
}

?>