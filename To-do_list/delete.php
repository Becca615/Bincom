<?php
require_once "config.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    db();
    global $link;
    $sql = "DELETE FROM todo WHERE id = '$id'";
    $delete = mysqli_query($link, $sql);
    if ($delete) {
        echo 'Deleted successfully';
    }
}
?>