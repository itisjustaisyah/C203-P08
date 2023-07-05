<?php
global $link;
include "..\dbFunctions.php";

$theID = $_GET['id'];

$query = "SELECT * FROM items WHERE id=$theID";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
$row = mysqli_fetch_array($result);
if (!empty($row)) {
    $itemID = $row['id'];
    $itemName = $row['name'];
}
?>
<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<Title>DeleteItem</Title>
<body>
<?php if (!empty($itemID)) { ?>
    <form action="doDeleteItem.php" method="post">
        <input type="hidden" name="id" value="<?php echo $itemID ?>"/>
        <input type="hidden" name="name" value="<?php echo $itemName ?>"/>
        <div style="width:350px;">
            <?php include "itemDetails.php";
            $_GET['id'] = $itemID?>
            <br/><input type="submit" value="Delete"/>
        </div>
    </form>
<?php } ?>
</body>

</html>
