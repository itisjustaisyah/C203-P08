<?php
global $link;
include "..\dbFunctions.php";

$theID = $_GET['id'];

$query = "SELECT * FROM travel_highlights WHERE id=$theID";
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

    <form action="doEditTravel.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id?>"/>
        <input type="hidden" name="title" value="<?php echo $title?>"/>

        <div style="width: 350px">
            Editable Story: <br>
            <textarea name="story" cols="83" rows="10"><?php echo $story?></textarea>
            <br/><input type="submit"/>
        </div>

    </form>
    <p><a href="index.php">Back to Travel Highlight List</a></p>

<?php }
?>
</body>
</html>


