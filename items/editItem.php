<?php
global $link;
include "..\dbFunctions.php";

$theID = $_GET['id'];

$query = "SELECT * FROM items WHERE id=$theID";
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
<html lang="">
<body>
<?php
if (!empty($itemName)){?>
    <form action="doEditItem.php" method="post">
        <input type="hidden" name="id" value="<?php echo $theID?>"/>
        <div style="width: 350px">
            <b>Item Name</b>: <label>
                <input type="text" name="name" value="<?php echo $itemName?>"/>
            </label><br>
            <b>Description</b>: <label>
                <input type="text" name="description" value="<?php echo $description?>"/>
            </label> <br>
            <b>Date sold</b>: <?php echo $dateSold?> <br>
            <b>Quality</b>: <?php /*echo $quality*/?>
            <label for="cars"></label>

            <label for="quality"></label><select name="quality" id="quality">
                <?php
                switch ($quality){
                    case "okay":
                        ?>
                        <option selected value="okay">okay</option>
                        <option value="good">good</option>
                        <option value="bad">bad</option>
                        <?php
                        break;
                    case "good":
                        ?>
                        <option value="okay">okay</option>
                        <option selected value="good">good</option>
                        <option value="bad">bad</option>
                        <?php
                        break;
                    case "bad":
                        ?>
                        <option value="okay">okay</option>
                        <option value="good">good</option>
                        <option selected value="bad">bad</option> <?php
                        break;
                    default:
                        ?>
                        <option value="okay">okay</option>
                        <option value="good">good</option>
                        <option value="bad">bad</option> <?php
                        break;
                }
                ?>
            </select><br>
            <b>Price</b>: <label>
                <input type="number" name="price" value="<?php echo $price?>"/>
            </label> <br>
            <img src="../itemPics/<?php echo $image?>" height="100%">
            <br><input type="submit"/>
        </div>

    </form>
<?php }?>
</body>
</html>