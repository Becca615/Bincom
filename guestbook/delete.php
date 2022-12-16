<?php include('config.php');

$id = $_GET['id'];


$sql = mysqli_query($db, "DELETE FROM guestbook WHERE id=$id");


if($sql == TRUE){
    //echo "data removed";
    header('location:http://localhost/dami/bincom/guestbook/');
}else{
    echo "Failed to remove data!";
}


?>