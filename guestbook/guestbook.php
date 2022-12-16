<?php
include("config.php");
	$result = mysqli_query($db, "SELECT 'id', 'name', 'email', 'comment' FROM guestbook");
	while($row = mysqli_fetch_array($result))
	{ 
		?>
	<h3><?php echo $row['name']; ?></h3>
    <p><?php echo $row['comment']; ?></p>
	<?php } 
		mysqli_close($db);
?>
