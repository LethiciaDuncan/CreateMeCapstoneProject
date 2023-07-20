<?php

if(array_key_exists("UserAlreadyExists", $_GET)){
    echo "<div class='alert alert-danger'>User already esists, please try another username!</div>";
}

?>
<!Doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="/Style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Akronim&family=Fascinate&family=Foldit:wght@200&family=Nabla&family=Nosifer&family=Rowdies:wght@300&display=swap" rel="stylesheet" />
    <style>
            body{
                  font-family: 'Nosifer', cursive;
            }
    </style>
</head>
<body>
    <h1 class="display-4" id="title"> Sign Up</h1>

    <form id="signForm" action="Backend/signUp.php" method="post">
        <input placeholder="Enter your username" class="u1" name="Username" id="Username" required />
        <br />
        <input placeholder="Enter your Password" class="p1" name="Password" id="Password" required />
        <br />
        <input type="submit" class="btnlog" value="Sign Up" />
    </form>
</body>

</html>

<?php
include_once "Footer.php"
?>
