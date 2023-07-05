<?php
global $link;
include "..\dbFunctions.php";

$theID = $_GET['id'];

$query = "SELECT * FROM restaurants WHERE rest_id=$theID";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);
if (!empty($row)) {
    $restaurantID = $row['rest_id'];
    $restaurantname = $row['name'];
}
?>
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<Title>DeleteRestaurant</Title>
<body>
<?php if (!empty($restaurantID)) { ?>
    <form action="doDeleteRestaurant.php" method="post">
        <input type="hidden" name="id" value="<?php echo $restaurantID ?>"/>
        <div style="width:350px;">
            Restaurant Name:
            <input type="text" name="name" value="<?php echo $restaurantname ?>"/>
            <br/><input type="submit" value="Delete"/>
        </div>
    </form>
<?php } ?>
</body>

</html>
