
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
    <button class="btn btn-light btn-lg" id="LogOutButton" onclick="redirectLogout()">
        Back
    </button>
    <h1  id="title"> Sign Up</h1>

    <form class="signForm" action="Backend/signup.php" method="post">
        <p id="divtext">Username</p>
        <input placeholder="Enter your username"  name="Username" id="Username" required />
        <br />
        <p id="divtext">Password</p>
        <input placeholder="Enter your Password"  name="Password" id="Password" required />
        <br />
        <?php

        if (array_key_exists("UserAlreadyExists", $_GET)) {
            echo "<div class='alert alert-danger'>User already exists, please try another username!</div>";
        }

        ?>
       <br />
        <input type="submit" id="LogButton" value="Sign Up" />
    </form>
</body>

</html>
<script>
          function redirectLogout() { window.location.href = "index.php"; }
</script>
<?php
include_once "Footer.php"
?>
