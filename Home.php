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
    <div id="creationContent2">

       
    </div>
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

      function imgPath() {
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
                    buttonContainer.appendChild(test);

                    const test2 = document.createElement("button");
                    test2.classList.add("buttonImage", "favButton");
                    buttonContainer.appendChild(test2);
                    /*imgs.appendChild(img);*/
                    container.appendChild(buttonContainer);
                    imgs.appendChild(container);
                })
            })

      }

</script>
