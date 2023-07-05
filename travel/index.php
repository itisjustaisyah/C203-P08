<?php
global $link;
include "..\dbFunctions.php";

$query = "SELECT * FROM travel_highlights";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
    $arrContent[] = $row;
}
?>
<html>
<body>
<h1>All Travel Highlights</h1>
<table border="1" cellpadding="0" cellspacing="0">
    <tr>
        <th>Title</th>
        <th>City</th>
        <th>Image</th>
        <th>Length</th>
        <th>Total Spent</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>
    <?php
    for ($i = 0; $i < count($arrContent); $i++) {
        $id = $arrContent[$i]['id'];
        $city = $arrContent[$i]['city'];

        $title = $arrContent[$i]['title'];
        $length = $arrContent[$i]['length_days'];
        $spending = $arrContent[$i]['total_spending'];
        $image = $arrContent[$i]['picture'];
        ?>
        <tr>
            <td><a href="travelDetails.php?id=<?php echo $id; ?>"><?php echo $title; ?></a></td>
            <td><?php echo $city; ?></td>
            <td><img src="travelPics/<?php echo $image?>" width="200px"></td>

            <td><?php echo $length; ?></td>
            <td><?php echo $spending; ?></td>
            <td><a href="editTravel.php?id=<?php echo $id; ?>">Edit</a></td>
            <td><a href="deleteTravel.php?id=<?php echo $id; ?>">Delete</a></td>

        </tr>

        <?php
    }
    ?>
</table>
</body>
</html>
