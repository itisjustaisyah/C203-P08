
<!DOCTYPE html>

<html>
<body>
<?php
include "..\dbFunctions.php";
global $link;

$theId = $_GET['id'];

$query = "SELECT * FROM travel_highlights WHERE id=$theId";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);
if (!empty($row)) {
    $id = $row['id'];
    $title = $row['title'];
    $city = $row['city'];
    $length = $row['length_days'];
    $spending = $row['total_spending'];
    $image = $row['picture'];
}

if(!empty($title)){
    ?>
    <div style="width:350px">
        <div id="<?php echo $theId?>">
            <h2><?php echo $title?></h2>
            <b>Description</b>: <?php echo $city?> <br>
            <b>Length (in days)</b>: <?php echo $length?> <br>
            <b>Total cost</b>: <?php echo $spending?> <br>

            <img src="travelPics/<?php echo $image;?>" width="100%"/>
        </div>
    </div>
    <?php
}
?>
</body>
</html>
