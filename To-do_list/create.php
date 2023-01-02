<?php
  require_once("config.php");
  if(isset($_POST['submit'])) {
    $title = $_POST['todoTitle'];
    $description = $_POST['todo'];

    //database connection
    db();
    global $link;
    $sql = "INSERT INTO todo(`todoTitle`, `todo`, `date`) VALUES ('$title', '$description', now() )";
    $insertTodo = mysqli_query($link, $sql);
    if($insertTodo){
       // echo "Success";
       
    }else{
     echo mysqli_error($link);
  }
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Todo List with PHP and MYSQL</title>
</head>
<body>
    <h1>Todo</h1>
    <button type="submit"><a href="index.php">View all lists</a></button>
    <form method="post" action="create.php">
        <p>Title: </p>
        <input name="todoTitle" type="text">
        <p>Description: </p>
        <input name="todo" type="text">
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
    </html>