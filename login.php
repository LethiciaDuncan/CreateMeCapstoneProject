<?php

if (array_key_exists("alreadyTriedP", $_GET)) {
    echo "<div class='alert alert-danger'>Password does not match.</div>";
}

if (array_key_exists("alreadyTriedU", $_GET)) {
    echo "<div class='alert alert-danger'>User could not be found.</div>";
}

if (array_key_exists("AddedUser", $_GET)) {
    echo "<div class='alert alert-danger' style=color:'Green' >Your user has been added, LOGIN!</div>";
}
?>
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
    <h1 id="title"> Log In</h1>
    <form class="logForm" action="Backend/login.php" method="post">
        <input placeholder="Enter your username" class="u1" name="username" id="username" />
        <input placeholder="Enter your password" class="p1" name="password" id="password" />
        <input type="submit" class="btnlog" placeholder="Login" />
    </form>
</body>
