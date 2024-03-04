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

function searchUsers($dbConn, $Username){
    $query = "select * from users where Username = '" . $Username . "' ;";
    return @mysqli_query($dbConn, $query);
}
function deleteUser($dbConn, $UserId)
{
    $query = "delete from users where UserId = '" . $UserId . "' ;";
    return @mysqli_query($dbConn, $query);
}

function deleteCreation($dbConn, $ImageId)
{
    $query = "delete from image where ImageId = '" . $ImageId . "' ;";
    return @mysqli_query($dbConn, $query);
}
function deleteCreationFromOtherTable($dbConn, $ImageId)
{
    $query = "delete from likesandfavs where ImageId = '" . $ImageId . "' ;";
    return @mysqli_query($dbConn, $query);
}
function updateBio($dbConn, $UserId, $Bio)
{
    $query = "update Users SET Bio = '" . $Bio . "'
    where UserId = '" . $UserId . "' ;";
    return @mysqli_query($dbConn, $query);
}

function checkIfAlreadyLiked($dbConn, $UserId, $ImageId){
    $query = "select Likes from likesandfavs
where ImageId= '" . $ImageId . "' and UserId = '" . $UserId . "' ;";
    return @mysqli_query($dbConn, $query);
}

function checkIfAlreadyFaved($dbConn, $UserId, $ImageId)
{
    $query = "select Favs from likesandfavs
where ImageId= '" . $ImageId . "' and UserId = '" . $UserId . "' ;";
    return @mysqli_query($dbConn, $query);
}
function updateLikes($dbConn, $UserId, $ImageId, $LikesNum){
    $query = "update likesandfavs SET LikesNum = '" . $LikesNum . "'
where ImageId= '" . $ImageId . "' and UserId = '" . $UserId . "' ;";
    return @mysqli_query($dbConn, $query);
}

function updateFavs($dbConn, $UserId, $ImageId, $FavsNum)
{
    $query = "update likesandfavs SET FavsNum = '" . $FavsNum . "'
where ImageId= '" . $ImageId . "' and UserId = '" . $UserId . "' ;";
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

function addToLikes($dbConn, $ImageId, $UserId, $Likes, $LikesNum)
{
    $query = "insert into LikesAndFavs(ImageId, UserId ,Likes, LikesNum)
    values ('" . $ImageId . "', '" . $UserId . "', '" . "$Likes" . "', '" . "$LikesNum" . "')";
    return @mysqli_query($dbConn, $query);
}

function addToFavs($dbConn, $ImageId, $UserId, $Favs, $FavsNum)
{
    $query = "insert into LikesAndFavs(ImageId, UserId ,Favs, FavsNum)
    values ('" . $ImageId . "', '" . $UserId . "', '" . "$Favs" . "', '" . "$FavsNum" . "')";
    return @mysqli_query($dbConn, $query);
}
function getUserLikes($dbConn, $UserId){
    $query = "select LikesAndFavs.Likes, Image.CreationPath, Image.UserId
from LikesAndFavs as LikesAndFavs
inner join Image as Image
		on Image.ImageId = LikesAndFavs.ImageId
inner join Users as Users
		on Users.UserId = LikesAndFavs.UserId
where LikesAndFavs.UserId=" . $UserId . " and Likes = 1 ;";
    return @mysqli_query($dbConn, $query);
}
function getUserLikesName($dbConn, $UserId)
{
    $query = "select LikesAndFavs.Likes, Image.CreationPath, Image.UserId, Image.Name
from LikesAndFavs as LikesAndFavs
inner join Image as Image
		on Image.ImageId = LikesAndFavs.ImageId
inner join Users as Users
		on Users.UserId = LikesAndFavs.UserId
where LikesAndFavs.UserId=" . $UserId . ";";
    return @mysqli_query($dbConn, $query);
}
function getUserFavsName($dbConn, $UserId)
{
    $query = "select LikesAndFavs.Favs, Image.CreationPath, Image.UserId, Image.Name
from LikesAndFavs as LikesAndFavs
inner join Image as Image
		on Image.ImageId = LikesAndFavs.ImageId
inner join Users as Users
		on Users.UserId = LikesAndFavs.UserId
where LikesAndFavs.UserId=" . $UserId . " ;";
    return @mysqli_query($dbConn, $query);
}
function getUserFavs($dbConn, $UserId){
     $query = "select LikesAndFavs.Favs, Image.CreationPath, Image.UserId
from LikesAndFavs as LikesAndFavs
inner join Image as Image
		on Image.ImageId = LikesAndFavs.ImageId
inner join Users as Users
		on Users.UserId = LikesAndFavs.UserId
where LikesAndFavs.UserId=" . $UserId . " and Favs = 1 ;";
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

function saveCreation($dbConn,$UserId ,$CreationPath, $Category, $Name){
    $query = "insert into Image(UserId, CreationPath, Category, Name)
values ('" . $UserId .  "', '"  . $CreationPath . "', '" . $Category . "', '" . $Name ."')";
    return @mysqli_query($dbConn, $query);
}

?>