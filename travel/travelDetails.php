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
    <div id="<?php echo $theId;?>">
        <p><?php echo $story;?></p>
        <br>
        <a href="index.php">Back to Travel Highlight List</a>
    </div>
    <?php }
    ?>
</div>
</body>
</html>

