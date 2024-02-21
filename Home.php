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
    <form id="homeSearchBar" action="Backend/addtoLikes.php" method="post">
        <label class="searchLabel" for="Search">Find User</label>
        <input class="searchInput" type="text" id="Name" name="Search" value="Enter Username" />
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
    //function redirectLogout() { window.location.href = "index.php"; }
  
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



            function addToFavs(image) {
                   var xhr = new XMLHttpRequest();
                            xhr.open('POST', './Backend/addToFavs.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhr.onreadystatechange = function ()
                        {
                            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                                alert("faved");
                            } else {
                                alert("here");
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
                                alert("here");
                            }
                        };

                            xhr.send('image=' + encodeURIComponent(image));

        }
    }
</script>
