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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"> </script>
</head>

<body id="createBody">
   
    <audio id="musicSound">
        <source src="Audio/piano.mp3" type="audio/mp3" />
    </audio>
        <button id="musicButton" onclick="music()">
           music
        </button>
    <button class="btn btn-light btn-lg" id="LogOutButton" onclick="redirectLogout()">
        LogOut
    </button>
    <div id="img" class="creation">
        <img id="bodyImg" src="Images/blob.png" />
        <img id="eyeImg" src="Images/eyes1.png" />
        <img id="mouthImg" src="Images/mouth1.png" />
        <img id="hatImg" src="Images/hat1.png" />
    </div>
    <div class="section1"></div>
    <div class="section2"></div>
    <div class="section3"></div>

        <h1 id="title2"> Create</h1>
        <p class="hat"> hat </p>
            <button onclick="prevHatImg()" class="leftHatButton"></button>
            <button onclick="nextHatImg()" class="rightHatButton"></button>

        <p class="eyes">eyes </p>
            <button onclick="prevEyeImg()" class="leftEyeButton"></button>
            <button onclick="nextEyeImg()" class="rightEyeButton"></button>
   
        <p class="body">body </p>
            <button onclick="prevBodyImg()" class="leftBodyButton"></button>
            <button onclick="nextBodyImg()" class="rightBodyButton"></button>
    
        <p class="mouth">mouth </p>
            <button onclick="prevMouthImg()" class="leftMouthButton"></button>
            <button onclick="nextMouthImg()" class="rightMouthButton"></button>
            
            <button onclick="reset()"  class="btn btn-light btn-lg" id="resetButton">
                Reset
            </button>
            <audio id="buttonSound">
                <source src="Audio/clickSound.mp3" type="audio/mp3" />
            </audio>
            <form id="createForm" action="Backend/saveCreation.php" method="post">
                <h2 id="categoryName" >Category</h2>
                <input type="radio" id="Casual" name="Category" value="Casual" />
                <label for="Casual">Casual</label><br />
                <input type="radio" id="Spooky" name="Category" value="Spooky" />
                <label for="Spooky">Spooky</label><br />
                <input type="radio" id="Cute" name="Category" value="Cute" />
                <label for="Cute">Cute</label><br />
                <input type="radio" id="None" name="Category" value="None" />
                <label for="None">None</label><br />

            </form>

             <button onclick="save()" method="post" class="btn btn-light btn-lg" id="saveButton">
                    Save
             </button>
</body>
</html>

<script>
    var currentBody = 0;
    var bodyImgs = ["Images/blob.png", "Images/circle.png", "Images/oval.png", "Images/square.png", "Images/triangle.png"];
    var currentEye = 0;
    var eyeImgs = ["Images/eyes1.png", "Images/eyes2.png", "Images/eyes3.png", "Images/eyes4.png", "Images/eyes5.png", "Images/eyes6.png"];
    var currentHat = 0;
    var hatImgs = ["Images/hat1.png", "Images/hat2.png", "Images/hat3.png", "Images/hat4.png", "Images/hat6.png","Images/hat7.png","Images/hat5.png"];
    var currentMouth = 0;
    var mouthImgs = ["Images/mouth1.png", "Images/mouth2.png", "Images/mouth3.png", "Images/mouth4.png",  "Images/mouth5.png", "Images/mouth6.png", "Images/mouth7.png", "Images/mouth8.png", "Images/mouth9.png"];

    function music() {
        var on = false;
        const sound = document.getElementById("musicSound");
        const button = document.getElementById("musicButton");
        if (on) {
            sound.pause();
            on = false;
            button.textContent = "Music";
        } else {
            sound.play();
            on = true;
            button.textContent = "Pause";
        }
    }

    //save img
    function save() {
          const createdImg = document.getElementById("img");
        //creating canvas 
        html2canvas(createdImg).then(function (canvas) {
            var imgData = canvas.toDataURL('image/png');
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'SaveImg.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    alert("saved");
                    }
                };

            xhr.send('imgData=' + encodeURIComponent(imgData));
            document.getElementById("createForm").submit();
            });
    }

    function redirectLogout() { window.location.href = "index.php"; }
    
    //reset image options
    function reset() {
        //reset body
        currentBody = (currentBody - currentBody) % bodyImgs.length;
            changeBodyImg();
            //reset eyes
            currentEye = (currentEye - currentEye) % eyeImgs.length;
            changeEyeImg();
        //reset hat
           currentHat = (currentHat - currentHat) % hatImgs.length;
            changeHatImg();
        //reset mouth
        currentMouth = (currentMouth - currentMouth) % mouthImgs.length;
        //changes img
        changeMouthImg();
    }

    //change body Image to previous
    function prevBodyImg() {
        currentBody = (currentBody - 1 + bodyImgs.length) % bodyImgs.length;
        //changes img
        changeBodyImg();
    }
    //change body Image to next
    function nextBodyImg() {
       currentBody = (currentBody + 1) % bodyImgs.length;
        //changes img
        changeBodyImg();
    }
    //change which body img is displayed
    function changeBodyImg() {
        const sound = document.getElementById("buttonSound");
        var img = document.getElementById("bodyImg");
        img.src = bodyImgs[currentBody];
        sound.play();
    }
    //change eye Image to previous
    function prevEyeImg() {
        currentEye = (currentEye - 1 + eyeImgs.length) % eyeImgs.length;
        //changes img
        changeEyeImg();
    }
    //change eye Image to next
    function nextEyeImg() {
       currentEye = (currentEye + 1) % eyeImgs.length;
        //changes img
        changeEyeImg();
    }
    //change which eye img is displayed
    function changeEyeImg() {
        const sound = document.getElementById("buttonSound");
        var img = document.getElementById("eyeImg");
        img.src = eyeImgs[currentEye];
        sound.play();
    }
    //change hat Image to previous
    function prevHatImg() {
        currentHat = (currentHat - 1 + hatImgs.length) % hatImgs.length;
    //changes img
        changeHatImg();
    }
    //change hat Image to next
    function nextHatImg() {
       currentHat = (currentHat + 1) % hatImgs.length;
        //changes img
        changeHatImg();
    }
    //change which hat img is displayed
    function changeHatImg() {
        const sound = document.getElementById("buttonSound");
        var img = document.getElementById("hatImg");
        img.src = hatImgs[currentHat];
        sound.play();
    }
    //change mouth Image to previous
    function prevMouthImg() {
        currentMouth = (currentMouth - 1 + mouthImgs.length) % mouthImgs.length;
    //changes img
        changeMouthImg();
    }
    //change mouth Image to next
    function nextMouthImg() {
       currentMouth = (currentMouth + 1) % mouthImgs.length;
        //changes img
        changeMouthImg();
    }
    //change which mouth img is displayed
    function changeMouthImg() {
        const sound = document.getElementById("buttonSound");
        var img = document.getElementById("mouthImg");
        img.src = mouthImgs[currentMouth];
        sound.play();
    }
</script>

