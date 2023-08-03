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
    <button class="btn btn-light btn-lg" id="LogOutButton" onclick="redirectLogout()">
        LogOut
    </button>
    <h1 id="title4"> Rankings</h1>
    <div class="dropdown">
        <button class="dropbtn">Category</button>
        <div class="dropdown-content">
            <button id="casualButton">Casual</button>
            <button id="spookyButton">Spooky</button>
            <button id="cuteButton">Cute</button>
        </div>
    </div>
    <div class="section1"></div>
    <div class="content">
        <div id="casualContent">Test</div>
        <div class="hide" id="spookyContent">test2</div>
        <div class="hide" id="cuteContent">test3</div>
    </div>

        <img id="backgroundImg" src="Images/testdesign.png" />

</body>

</html>

<script>
    //To diplay the different sections of the rankings page and hide the sections that arent currently displayed
    document.getElementById("casualButton").addEventListener('click', function
        () {
        var casual = document.getElementById("casualContent");
        var spooky = document.getElementById("spookyContent");
        var cute = document.getElementById("cuteContent");

        casual.style.display = "block";
        spooky.style.display = "none";
        cute.style.display = "none";
    })
    document.getElementById("spookyButton").addEventListener('click', function
        () {
        var casual = document.getElementById("casualContent");
        var spooky = document.getElementById("spookyContent");
        var cute = document.getElementById("cuteContent");

        casual.style.display = "none";
        spooky.style.display = "block";
        cute.style.display = "none";
    })
    document.getElementById("cuteButton").addEventListener('click', function
        () {
        var casual = document.getElementById("casualContent");
        var spooky = document.getElementById("spookyContent");
        var cute = document.getElementById("cuteContent");

        casual.style.display = "none";
        spooky.style.display = "none";
        cute.style.display = "block";
    })
        function redirectLogout() { window.location.href = "login.php"; }
</script>