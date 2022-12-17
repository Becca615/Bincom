<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, minimum-scale=1">
	<title> Guestbook Page </title>

	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap-grid.min.css" integrity="sha512-JQksK36WdRekVrvdxNyV3B0Q1huqbTkIQNbz1dlcFVgNynEMRl0F8OSqOGdVppLUDIvsOejhr/W5L3G/b3J+8w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script>
function Validate()
{
	var x=document.forms["guest"]["email"].value;
	var y=document.forms["guest"]["name"].value;
	if(y==null || y=="")
	{
		alert("Please enter your Name! ");
		return false;
	}
	if(x==null || x=="")
	{
		alert("Please enter your email address!");
		return false;
	}
	var atpos=x.indexOf("@");
	var dotpos=x.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  	{
  		alert("Not a valid e-mail address");
		return false;
	}
	else
		return true;
}
</script>
</head>

<body>
    <div id="menu">
    <hr/>
    <ul id="mainMenu">
	    <li><a href="index.html">Home</a></li>
       	<li><a href="ourstory.html">Our Story</a></li>
        <li><a href="memories.html">Memories</a></li>
        <li><a href="#">Events</a></li>
        <li><a href="guestbook.php" id="active">Guestbook</a></li>
        <li><a href="#">Contact Us</a></li>
    </ul>
    <hr/>
    </div>
	<div class="guest">
	<?php
	include("config.php");

	$result = mysqli_query($db, "SELECT * FROM guestbook");
	while($row = mysqli_fetch_array($result))
	{
	$id=$row['id'];
	$name = $row['name'];
	$comment = $row['comment'];
		?>
	<h3><?php echo $name; ?></h3>
    <p><?php echo $comment; ?></p><br>
	<button><a href="<?php echo HOMEPAGE?>delete.php?id=<?php echo $id;?>">DELETE</a></button>
	<button><a href="<?php echo HOMEPAGE?>edit.php?id=<?php echo $id;?>">EDIT</a></button>
	<button><a href="<?php echo HOMEPAGE?>update.php?id=<?php echo $id;?>">UPDATE</a></button>


	<?php } 
		mysqli_close($db);
?>
	</div>
    <div id="content">
    <h2>Sign Guest Book </h2>
   		<form name="guest" method="POST" action="addcomment.php">
			<span>Name:</span>   <input type="text" name="name" placeholder="enter your name"/><br />
            <span>Email:</span> <input type="text" name="email" placeholder="enter your email"/><br />
            <p>Comment:</p> <textarea name="comment" placeholder="comment" rows="10" cols="50"> </textarea> <br />
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</div>
    <div id="footer">
    <hr/>
    <p> Check out our Guestbook! </p>
    </div>
</body>
</html>
