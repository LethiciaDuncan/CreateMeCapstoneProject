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
    <h1 id="title3"> Profile</h1>
    <p id="profileUserName"></p>
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
        <div id="creationContent"></div>
        <div class="hide" id="likeContent"> </div>
        <div class="hide" id="favoriteContent"></div>
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

    function redirectLogout() { window.location.href = "index.php"; }

    var request = new XMLHttpRequest();
    window.onload = (event) => {
        loadJson()
        imgPath()
    }
    //getting user info
    function loadJson() {
        request.open('GET', './Backend/Profile.php');
        request.onload=loadComplete;
        request.send();


    }

    //loading user info
    function loadComplete(evt) {
        var myResponse;
        var myData;
        var myUsername = "";
        myResponse = request.responseText;
        console.log(myResponse)

        myData = JSON.parse(myResponse);
        console.log(myData)

        //putting user name in profileUserName p tag
        for (index in myData) {
            myUsername += "<tr><td>" +
                myData[index].Username + "</td><td>";
        }
        myUsername += "<tr><td>";
        document.getElementById("profileUserName").innerHTML = myUsername;

    }


    //display user created images
    function imgPath() {
        fetch('./Backend/getUserCreation.php')
            .then(response => response.json())
            .then(imagePath => {
                const imgs = document.getElementById("creationContent");
                imagePath.forEach(image => {
                    const img = document.createElement("img");
                    img.src = image;

                    img.width = 200;
                    img.height = 200;
                    

                    imgs.appendChild(img);
                })
            })

    }
</script>

