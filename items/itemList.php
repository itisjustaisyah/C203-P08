<?php
global $link;
include "..\dbFunctions.php";

$query = "SELECT * FROM items";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
    $arrContent[] = $row;
}
?>
<html>
<body>
<h1>List of Items</h1>
<table border="1" cellpadding="0" cellspacing="0">
    <tr>
        <th>Item List</th>
        <th>Date Sold</th>
        <th>Quality</th>
        <th>Price</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>

    </tr>
    <?php
    for ($i = 0; $i < count($arrContent); $i++) {
        $id = $arrContent[$i]['id'];
        $name = $arrContent[$i]['name'];

        $dateSold = $arrContent[$i]['date_sold'];
        $quality = $arrContent[$i]['quality'];
        $price = $arrContent[$i]['price'];
        $image = $arrContent[$i]['image'];
        ?>
        <tr>
            <td><a href="itemDetails.php?id=<?php echo $id; ?>"><?php echo $name; ?></a></td>
            <td><?php echo $dateSold; ?></td>
            <td><?php echo $quality; ?></td>
            <td><?php echo $price; ?></td>
            <td><img src="../itemPics/<?php
                switch ($image) {
                    case "none":
                        echo "none.jpg";break;
                    default:
                        echo $image;break;
                }?>" height="100px"></td>
            <td><a href="editItem.php?id=<?php echo $id; ?>">Edit</a></td>
            <td><a href="deleteItem.php?id=<?php echo $id; ?>">Delete</a></td>

        </tr>

        <?php
    }
    ?>
</table>
</body>
</html>
