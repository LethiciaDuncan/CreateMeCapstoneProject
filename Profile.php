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
            <button id="bioButton">Bio</button>
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
    <button id="editButton">Edit</button>
        <div class="content">
            <div class="hide" id="creationContent"></div>
            <div class="hide" id="likeContent"></div>
            <div class="hide" id="favoriteContent"></div>
        </div>
        <div id="bioContent">
            <form class="bioForm" action="Backend/Bio.php" method="post">
                <input placeholder="Enter Bio" name="Bio" id="Bio" />
                <input type="submit" id="BioButton2" value="Submit" />
            </form>
        </div>
    <p id="bioText2"></p>
        <img id="backgroundimg" src="Images/testdesign.png" />

</body>

</html>


<script>
    //To diplay the different sections of the profile page and hide the sections that arent currently displayed
    var bio = document.getElementById("bioContent");
    bio.style.display = "none";
    var edit = document.getElementById("editButton");
    edit.style.display = "none";
    var bio2 = document.getElementById("bioText2");
    bio2.style.display = "none";

         document.getElementById("editButton").addEventListener('click', function
        () {
        var likes = document.getElementById("likeContent");
        var creation = document.getElementById("creationContent");
        var favs = document.getElementById("favoriteContent");
        var bio = document.getElementById("bioContent");
        var bio2 = document.getElementById("bioText2");


        likes.style.display = "none";
        creation.style.display = "none";
        favs.style.display = "none";
         bio.style.display = "block";
         bio2.style.display = "none";
    })
    document.getElementById("likesButton").addEventListener('click', function
        () {
        var likes = document.getElementById("likeContent");
        var creation = document.getElementById("creationContent");
        var favs = document.getElementById("favoriteContent");
        var bio = document.getElementById("bioContent");
        var edit = document.getElementById("editButton");
        var bio2 = document.getElementById("bioText2");

        bio2.style.display = "none";
        edit.style.display = "none";
        likes.style.display = "block";
        creation.style.display = "none";
        favs.style.display = "none";
            bio.style.display = "none";
    })
         document.getElementById("creationButton").addEventListener('click', function
        () {
        var likes = document.getElementById("likeContent");
        var creation = document.getElementById("creationContent");
             var favs = document.getElementById("favoriteContent");
             var bio = document.getElementById("bioContent");
             var edit = document.getElementById("editButton");
             var bio2 = document.getElementById("bioText2");

        bio2.style.display = "none";
        edit.style.display = "none";
        creation.style.display = "block";
        likes.style.display = "none";
             favs.style.display = "none";
                 bio.style.display = "none";
    })
         document.getElementById("favsButton").addEventListener('click', function
        () {
        var likes = document.getElementById("likeContent");
        var creation = document.getElementById("creationContent");
             var favs = document.getElementById("favoriteContent");
             var bio = document.getElementById("bioContent");
             var edit = document.getElementById("editButton");
             var bio2 = document.getElementById("bioText2");

        bio2.style.display = "none";
        edit.style.display = "none";
        favs.style.display = "block";
        creation.style.display = "none";
             likes.style.display = "none";
                 bio.style.display = "none";
         })
         document.getElementById("bioButton").addEventListener('click', function
        () {
        var likes = document.getElementById("likeContent");
        var creation = document.getElementById("creationContent");
        var favs = document.getElementById("favoriteContent");
        var bio = document.getElementById("bioContent");
        var bio2 = document.getElementById("bioText2");
        var edit = document.getElementById("editButton");

        edit.style.display = "block";
        favs.style.display = "none";
        creation.style.display = "none";
        likes.style.display = "none";
        bio.style.display = "none";
        bio2.style.display = "block";
         })

    function redirectLogout() { window.location.href = "index.php"; }

    var request = new XMLHttpRequest();
    window.onload = (event) => {
        loadJson()
        imgPath()
        imgLikesPath2()
        imgFavsPath()
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
        var myBio = "";
        myResponse = request.responseText;
        console.log(myResponse)

        myData = JSON.parse(myResponse);
        console.log(myData)

        //putting user name in profileUserName p tag
        for (index in myData) {
            myUsername += "<tr><td>" +
                myData[index].Username + "</td><td>";

                 myBio += "<tr><td>" +
                myData[index].Bio + "</td><td>";
        }
        myUsername += "<tr><td>";
        myBio += "<tr><td>";
        document.getElementById("profileUserName").innerHTML = myUsername;
        document.getElementById("bioText2").innerHTML = myBio;

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


                    const container = document.createElement("div");
                    container.classList.add('contain');
                    img.classList.add('contain');
                    container.appendChild(img);

                    const buttonContainer = document.createElement("div");
                    buttonContainer.classList.add("buttonContainer");


                    const test = document.createElement("button");
                    test.classList.add("buttonImage", "editButton2");
                    buttonContainer.appendChild(test);

                    const test2 = document.createElement("button");
                    test2.classList.add("buttonImage", "deleteButton");
                    buttonContainer.appendChild(test2);

                    container.appendChild(buttonContainer);
                    imgs.appendChild(container);
                   
                })
            })

        }

         function imgLikesPath2() {
            fetch('./Backend/getLikes.php')
                .then(response => response.json())
                .then(imagePath => {
                    fetch('./Backend/getUserLikesName.php')
                        .then(response => response.json())
                        .then(name => {

                            const imgs = document.getElementById("likeContent");
                            imagePath.forEach(image => {
                            const img = document.createElement("img");
                            img.src = image;

                            img.width = 200;
                            img.height = 200;


                            imgs.appendChild(img);

                            const container = document.createElement("div");
                            container.classList.add('contain');
                            img.classList.add('contain');
                            container.appendChild(img);

    
                            const nameContainer = document.createElement("div");
                            nameContainer.classList.add("nameContainer");

                            const nameLabel = document.createElement("label");
                            nameLabel.textContent = name;
                            nameContainer.appendChild(nameLabel);

                                container.appendChild(nameContainer);
                                imgs.appendChild(container);
                        })
                    })
                })
            

            }

        function imgFavsPath() {
            fetch('./Backend/getFavs.php')
            .then(response => response.json())
            .then(imagePath => {
                const imgs = document.getElementById("favoriteContent");
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

