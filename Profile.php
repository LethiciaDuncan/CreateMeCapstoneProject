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
    <h1 id="title3"> Profile</h1>
    <div class="profileDiv">
        <nav class="profileNavBar">
            <ul>
                <li>
                    <button id="creationButton">Creations</button>
                </li>
                <li>
                    <button id="likesButton">Likes</button>
                </li>
                <li>
                    <button id="favsButton">Favorites</button>
                </li>
            </ul>
            </nav>
        </div>
    <div id="profileLine"> </div>
    <div class="content">
        <div id="creationContent">HI</div>
        <div class="hide" id="likeContent"> Test</div>
        <div class="hide" id="favoriteContent">Test 2</div>
    </div>
    <img id="backgroundimg" src="Images/testdesign.png" />

</body>

</html>


<script>
    //To diplay the different sections of the profile page and hide the sections that arent currently displayed
    document.getElementById("likesButton").addEventListener('click', function
        () {
        var likes = document.getElementById("likeContent");
        var creation = document.getElementById("creationContent");
        var favs = document.getElementById("favoriteContent");

        likes.style.display = "block";
        creation.style.display = "none";
        favs.style.display = "none";
    })
         document.getElementById("creationButton").addEventListener('click', function
        () {
        var likes = document.getElementById("likeContent");
        var creation = document.getElementById("creationContent");
        var favs = document.getElementById("favoriteContent");

        creation.style.display = "block";
        likes.style.display = "none";
        favs.style.display = "none";
    })
         document.getElementById("favsButton").addEventListener('click', function
        () {
        var likes = document.getElementById("likeContent");
        var creation = document.getElementById("creationContent");
        var favs = document.getElementById("favoriteContent");

        favs.style.display = "block";
        creation.style.display = "none";
        likes.style.display = "none";
    })
</script>

