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
    <div class="section1"></div>
    <div class="section2"></div>
    <div class="section3"></div>
    <div class="grid-container">
        <div class="item1"><h1 id="title2"> Create</h1></div>
        <div class="item2">2</div>
        <div class="item3"> hat
            <button class="leftHatButton"></button>
            <button class="rightHatButton"></button>
        </div>
        <div class="item4">4</div>
        <div class="item5">eyes
            <button class="leftEyeButton"></button>
            <button class="rightEyeButton"></button>
        </div>
        <div class="item6">6</div>
        <div class="item7">body
            <button class="leftBodyButton"></button>
            <button class="rightBodyButton"></button>
        </div>
        <div class="item8">8</div>
        <div class="item9">mouth
            <button class="leftMouthButton"></button>
            <button class="rightMouthButton"></button>
        </div>
        <div class="item10">
        <button class="btn btn-light btn-lg" id="resetButton">
        Reset
        </button>
        </div>
        <div class="item11">
        <form>
         <h2>Category</h2>
         <input type="radio" id="Casual" name="catergory" value="Casual" />
         <label for="Casual">Casual</label><br />
         <input type="radio" id="Spooky" name="catergory" value="Spooky" />
        <label for="Spooky">Spooky</label><br />
        <input type="radio" id="Cute" name="catergory" value="Cute" />
        <label for="Cute">Cute</label><br />
        <input type="radio" id="None" name="catergory" value="None" />
         <label for="None">None</label><br /> 
</form></div>
        <div class="item12">
        <button class="btn btn-light btn-lg" id="saveButton">
         Save
        </button>
        </div>
    </div>
</body>

</html>
