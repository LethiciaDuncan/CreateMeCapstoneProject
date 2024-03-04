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
    <form id="homeSearchBar" action="Backend/searchUser.php" method="post">
        <?php

        if (array_key_exists("NotFound", $_GET)) {
            echo "<div class='alert alert-danger'>Unable to find user</div>";
        }

        ?>
        <label class="searchLabel" for="Search">Find User</label>
        <input class="searchInput" type="text" id="Name" name="Name" placeholder="Enter Username" />
        <button id="homeSearchButton">Search</button>
    </form>
        <div id="creationContent2"></div>

    <button class="btn btn-light btn-lg" id="LogOutButton" onclick="redirectLogout()">
        LogOut
    </button>
    <img id="backgroundImg" src="Images/testdesign.png" />

</body>

</html>

<script>
    function redirectLogout() { window.location.href = "index.php"; }

  
    var request = new XMLHttpRequest();
    window.onload = (event) => {
        imgPath()
    }

    function imgPath()
    {
       fetch('./Backend/getAllCreation.php')
            .then(response => response.json())
            .then(imagePath => {
                const imgs = document.getElementById("creationContent2");
                imagePath.forEach(image => {

                    
                    const img = document.createElement("img");
 
                    img.src = image;
                    
                    img.width = 200;
                    img.height = 200;


                    const container = document.createElement("div");
                    container.classList.add('contain');
                    img.classList.add('contain');
                    const form = document.createElement("form");
                    form.setAttribute("action", "/Backend/UserProfile.php");
                    form.setAttribute("method", "POST");
                    form.setAttribute("type", "hidden")
                    const value = document.createElement("input");
                    value.setAttribute("type", "hidden");
                    value.setAttribute("name", "image");
                    value.setAttribute("value", image);
                    form.appendChild(value);
                    const formButton = document.createElement("button");
                    formButton.textContent = "View User";
                    formButton.addEventListener("click", function () {
                        form.submit();
                    });
                    container.appendChild(form);
                    container.appendChild(formButton);
                    container.appendChild(img);

                    const buttonContainer = document.createElement("div");
                    buttonContainer.classList.add("buttonContainer");

                        
                    const test = document.createElement("button");
                    test.classList.add("buttonImage", "likeButton");
                    test.addEventListener("click", function ()
                    {
                        addToLikes(image);
                    });
                    
                        buttonContainer.appendChild(test);

                    const test2 = document.createElement("button");
                    test2.classList.add("buttonImage", "favButton");
                    test2.addEventListener("click", function ()
                    {
                        addToFavs(image);
                    });

                    buttonContainer.appendChild(test2);

                    container.appendChild(buttonContainer);
                    imgs.appendChild(container);
            })
        })
    }
         function addToFavs(image) {
                   var xhr = new XMLHttpRequest();
                            xhr.open('POST', './Backend/addToFavs.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhr.onreadystatechange = function ()
                        {
                            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                                alert("faved");
                            } else {

                            }
                        };

                            xhr.send('image=' + encodeURIComponent(image));
            }


        function addToLikes(image) {
                      var xhr = new XMLHttpRequest();
                            xhr.open('POST', './Backend/addToLikes.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhr.onreadystatechange = function ()
                        {
                            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                                alert("liked");
                            } else {

                            }
                        };

                            xhr.send('image=' + encodeURIComponent(image));

        }
   
</script>
