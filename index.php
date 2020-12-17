<?php


?>


<form action="upload.php" method="post" enctype="multipart/form-data">
	Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br>
       <label for="name">Имя:</label>
   <input type="text" name="name">
   <br>
   <br>
    <label for="second_name">Фамилия:</label>
   <input type="text" name="second_name">

        <br>   
         <input type="submit" value="Upload Image" name="submit">
<br>
   <a href="show.php">Смотреть</a>



</form>