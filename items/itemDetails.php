<?php
include "..\dbFunctions.php";
global $link;

$theId = $_GET['id'];

$query = "SELECT * FROM items WHERE id=$theId";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);
if (!empty($row)) {
    $image = $row['image'];
    $itemName = $row['name'];
    $description = $row['description'];
    $dateSold = $row['date_sold'];
    $quality = $row['quality'];
    $price = $row['price'];


}
?>
<!DOCTYPE html>
<html>
<body>
<?php if(!empty($itemName)){
    ?>
    <div style="width:350px">
        <div id="<?php echo $theId?>">
        <b>Item Name</b>: <?php echo $itemName?> </br>
        <b>Description</b>: <?php echo $description?> </br>
        <b>Date sold</b>: <?php echo $dateSold?> </br>
        <b>Quality</b>: <?php echo $quality?> </br>
        <b>Price</b>:<?php echo $price?> </br>
        <img src="../itemPics/<?php
        switch ($image) {
            case "none":
                echo "none.jpg";break;
            default:
                echo $image;break;
        }?>" height="100%">
    </div>
<?php } ?>
</div>
</body>
</html>

