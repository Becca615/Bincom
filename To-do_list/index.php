<?php
require_once("config.php");
?>

<DOCTYPE html>
    <html>
        <head>
            <title>My todo task</title>
        </head>
        <body>
            <h2>Add to list</h2>
            <p><a href="create.php">add task</a><p>
            <?php
            db();
            global $link;
            $sql = "SELECT id, todoTitle, todo, date FROM todo";
            $result = mysqli_query($link, $sql);

            //check for data in the table
              if(mysqli_num_rows($result) >= 1){
                while($row = mysqli_fetch_array($result)){
                    $id = $row['id'];
                    $title = $row['todoTitle'];
                    $date = $row['date'];
                ?>

                  <ul>
                    <li><a href="detail.php?id=<?php echo $id?>"><?php echo $title ?></a></li> <?php echo "[[ $date ]]";?>
                    <button type="btn"><a href="delete.php?id=<?php echo $id?>">Delete</a></button>"
                </ul>
                  <?php
                }
              }

?>


</body>
</html>