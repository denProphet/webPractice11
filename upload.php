<?php
session_start();
require_once("index.php");
require_once("index.php");
$target_dir = "images/";
$link=mysqli_connect("localhost", "root", "", "pr10");

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
    	$uploadOk = 1;
	} else {
        echo "File is not an image.";
    	$uploadOk = 0;
	}
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
	$uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
	$uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $img =  basename( $_FILES["fileToUpload"]["name"]);
        $target_dir1 = "images";

        echo "The file ". $img. " has been uploaded.";
        echo "Файл успешно добавлен!!!";
        $name = $_POST['name'];

        $second_name = $_POST['second_name'];
                mysqli_query($link,"INSERT INTO users SET name='".$name."', second_name='".$second_name."',img_db_name='".$img."'");



         exit();
	} else {
        echo "Sorry, there was an error uploading your file.";
	}
}


?>


<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <style>
       .container {
           width: 400px;
       }
   </style>
</head>
<body style="padding-top: 3rem;">

<div class="container">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

   <a href="show.php">Регистрация</a>
    </form>
</div>


</body>
</html>
