<?php
 
//session_destroy();
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
    <h1 id="title"> Welcome</h1>
    <div class="indexBodyDiv">
        <div id="indexDiv">
            <form class="logForm" action="Backend/login.php" method="post">
                <p id="divtext">Username</p>
                <input placeholder="Enter your username" class="u1" name="Username" id="Username" />
                <p id="divtext">Password</p>
                <input placeholder="Enter your password" class="p1" name="Password" id="Password" />
                <?php if (array_key_exists("alreadyTriedP", $_GET)) {
            echo "<div class='alert alert-danger'>Password does not match.</div>";
        }

        if (array_key_exists("alreadyTriedU", $_GET)) {
            echo "<div class='alert alert-danger' style=color:'White'>User could not be found.</div>";
        }

        if (array_key_exists("AddedUser", $_GET)) {
            echo "<div class='alert alert-danger' style=color:'Green' >Your user has been added, LOGIN!</div>";
        }?>
                <input type="submit" id="LogButton" value="Login" />
            </form>
            <p id="divtext">Dont have an account? Sign up here</p>
            <button class="btn btn-light btn-lg" id="LogButton" onclick="redirectSignUp()">
                SignUp
            </button>
        </div>
        <p id="belowDivText">Want to start without an account</p>
        <button class="btn btn-light btn-lg" id="GameButton" onclick="redirectNoAccount()">
            Play
        </button>
    </div>
    <img id="backgroundImg" src="Images/testdesign.png" />
</body>

</html>


<script>
    //Page Redirects
   function redirectNoAccount() { window.location.href = "NoAccountGame.php"; }
   function redirectSignUp() { window.location.href = "signup.php"; }

</script>