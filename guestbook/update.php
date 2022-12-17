<?php 
include("config.php");
    $result = mysqli_query($db, "SELECT `id` FROM `guestbook` WHERE id=$id");
    while($row = mysqli_fetch_array($result))
    {
    $id = $row['id'];
    $name = $row['name'];
    $comment = $row['comment'];
    ?>
<h3><?php echo $name; ?></h3>
<p><?php echo $comment; ?></p>
<?php } 
    mysqli_close($db);

?>

<?php
$sql = mysqli_query($db, "UPDATE `guestbook` SET `id`=$id WHERE id=$id");

if($sql == TRUE){
    //echo "data updated";
    header('location:http://localhost/dami/bincom/guestbook/');
}else{
    echo "Failed to update data!";
}


