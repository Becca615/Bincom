<?php  include('config.php');
//GET USER ID BY PASSING IT VIA GET METHOD ON THE UPDATE BUTTON
$id = $_GET['id'];
///RUN A QUERY TO SELECT THE GUEST DATA USING THE GUEST ID
$sql = mysqli_query($db, "SELECT `id` FROM `guestbook` WHERE id=$id");

?>
///PASS THE DATA AS A VALUE(PLACEHOLDER) IN THE FORM INPUT FEILD
<form name="guest" method="POST" action="addcomment.php">
			<span>Name:</span>   <input type="text" name="name" placeholder=" enter your name"/><br />
            <span>Email:</span> <input type="text" name="email" placeholder="enter your email"/><br />
            <p>Comment:</p> <textarea name="comment" rows="10" cols="50"> </textarea> <br />
            <button type="submit" name="submit">Submit</button>
        </form>

<?php
///RUN AN UPDATE QUERY

$sql = mysqli_query($db, "UPDATE `guestbook` SET `id`=$id WHERE id=$id");

if($sql == TRUE){
    //echo "data edited";
    header('location:http://localhost/dami/bincom/guestbook/');
}else{
    echo "Failed to edit data!";
}
?>









