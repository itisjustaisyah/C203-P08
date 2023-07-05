<?php
global $link;
include "..\dbFunctions.php";
$theID = $_POST['id'];
$newStory = $_POST['story'];
$title = $_POST['title'];

$msg = "";
$query="
UPDATE travel_highlights
SET story='$newStory'
WHERE id=$theID
";

if( mysqli_query($link, $query) or die(mysqli_error($link))){
    $msg = "<b>$title</b> successfully updated";
}else{
    $msg = "<b>$title</b> not updated";
}?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <Title>doEditTravel</Title>
</head>
<body>
<?php
echo $msg;
$_GET['id'] = $theID;
include "travelDetails.php";
?>
</body>
</html>

