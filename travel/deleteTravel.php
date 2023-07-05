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
    $story = $row['story'];



}
?>
<!DOCTYPE html>
<html>
<body>
<?php if(!empty($title)){
include "firstDetails.php";
?>
<div style="width:350px">
    <div id="<?php echo $theId?>">
        <p><?php echo $story;?></p>
        <br>
        <form action="doDeleteTravel.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id?>"/>
            <input type="hidden" name="title" value="<?php echo $title?>"/>

            <div style="width: 350px">
                <p>Delete <?php echo $title ?>?</p>
                <br/><input type="submit"/>
            </div>

        </form>

        <p><a href="index.php">Back to Travel Highlight List</a></p>
    </div>
    <?php } ?>
</div>
</body>
</html>

