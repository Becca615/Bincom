<?php
require_once 'config.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    db();
    global $link;
    $sql = "SELECT todoTitle, todo FROM todo WHERE id = '$id'";
    $result = mysqli_query($link, $sql);
    if(mysqli_num_rows($result)==1){
        $row=mysqli_fetch_array($result);
        if($row){
            $title = $row['todoTitle'];
            $description = $row['todo'];

            echo "
                <h2>Edit Todo List</h2>
                
            <form action='edit.php?id=$id' method='post'>
            <p>Title</p>
             <input type='text' name='title' value='$title'>
             <p>Description</p>
             <input type='text' name='description' value='$description'>
             <br>
             <input type='submit' name='submit' value='edit'>
            </form>
            ";
        }
    }else{
        echo "no todo";
    }


    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $description = $_POST['description'];
        db();
        $sql = "UPDATE todo SET todoTitle = '$title', todo = '$description'  WHERE id = '$id'";
        $insertEdited = mysqli_query($link, $sql);
        if($insertEdited){
            echo "successfully updated";
        }
        else{
            echo mysqli_error($link);
        }
    }


}

?>