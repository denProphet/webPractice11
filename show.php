<?php
$link=mysqli_connect("localhost", "root", "", "pr10");

echo "<table border=1 style='text-align: center;'>";
echo "<tr><th>Firstname</th><th>Lastname</th><th>Portrait</th></tr>";
$res = mysqli_query($link, 'SELECT * FROM users');
while($row = mysqli_fetch_array($res)){
    echo "<tr>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['second_name']."</td>";
    echo "<td>"."<img style='width: 80px;' src = 'images/".$row['img_db_name']."'></td>";
    echo "</tr>";
}
echo "</table>";
?>
