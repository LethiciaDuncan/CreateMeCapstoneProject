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
    <p>Create unique monsters</p>
    <button class="btn btn-light btn-lg" id="LogButton" onclick="redirectLogin()">
        Login
    </button>
    <button class="btn btn-light btn-lg" id="SignButton" onclick="redirectSignUp()">
        SignUp
    </button>

    <img id="backgroundImg" src="Images/testdesign.png" />
</body>

</html>


<script>
    //Page Redirects
   function redirectLogin() { window.location.href = "login.php"; }
   function redirectSignUp() { window.location.href = "signup.php"; }

</script>