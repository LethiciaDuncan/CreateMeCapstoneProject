<?php


$imageData = $_POST['imgData'];

$imageData = str_replace('data:image/png;base64,', '', $imageData);

$imageData = base64_decode($imageData);

$filename = uniqid() . '.png';

$path = 'Creation/';

$name = file_put_contents($path . $filename, $imageData);

?>


<!Doctype html>
<html lang="en">
<body>
    <form id="test" action="Backend/saveCreation.php"  method="post">
        <input id="CreationPath" name="CreationPath" value="<?php echo $name; ?>" />
    </form>
</body>
</html>

<script>
         document.getElementById("test").submit();
</script>