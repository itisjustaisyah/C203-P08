<?php
global $link;
include "..\dbFunctions.php";

$theId = $_GET['id'];

$query = "SELECT * FROM restaurants WHERE rest_id=$theId";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);
if (!empty($row)) {
    $restaurantname = $row['name'];
}
?>
<!DOCTYPE html>
<include
<html>
<body>
<?php if(!empty($restaurantname)){
?>
<div style="width:350px">
    Restaurant Name: <?php echo $restaurantname?>
</div>
    <?php } ?>
</div>
</body>
</html>

