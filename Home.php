<?php
include_once('header.php');
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
    <h1 id="title4"> Home</h1>
   <div class="section1"></div>

    <button class="btn btn-light btn-lg" id="LogOutButton" onclick="redirectLogout()">
        LogOut
    </button>
    <img id="backgroundImg" src="Images/testdesign.png" />

</body>

</html>

<script>
        function redirectLogout() { window.location.href = "index.php"; }
</script>
