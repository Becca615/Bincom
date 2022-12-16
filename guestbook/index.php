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
    <div id="content">
    <h2>Sign Guest Book </h2>
   		<form name="guest" method="post" action="guestbook.php">
			<span>Name:</span>   <input type="text" name="name"/><br />
            <span>Email:</span> <input type="text" name="email"/><br />
            <p>Comment:</p> <textarea name="comment" rows="10" cols="50"> </textarea> <br />
            <button type="submit" value="Post" name="submit">Submit</button>
        </form>
    </div>
</div>
    <div id="footer">
    <hr/>
    <p> Check out our Guestbook! </p>
    </div>
</body>
</html>
