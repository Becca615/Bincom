<?php
include("config.php");
	$result = mysqli_query($db, "SELECT * FROM guestbook");
	while($row = mysqli_fetch_array($result))
	{
	$name = $row['name'];
	$comment = $row['comment'];
		?>
	<h3><?php echo $name; ?></h3>
    <p><?php echo $comment; ?></p>
	<?php } 
		mysqli_close($db);
?>