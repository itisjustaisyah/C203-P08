<?php
global $link;
include "..\dbFunctions.php";
$theID = $_POST['id'];
$newName = $_POST['name'];

$msg = "";
$query = "DELETE FROM restaurants
          WHERE rest_id = $theID";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

if ($result) {
    $msg = "Restaurant $newName successfully deleted";
}
else {
    $msg = "Restaurant $newName not deleted";
}
?>
<!DOCTYPE html>
<html>
    <body>
    <?php
echo $msg;
?>
</body>
</html>
