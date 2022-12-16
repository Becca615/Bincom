<?php
//GET USER ID BY PASSING IT VIA GET METHOD ON THE UPDATE BUTTON

///RUN A QUERY TO SELECT THE GUEST DATA USING THE GUEST ID

///PASS THE DATA AS A VALUE(PLACEHOLDER) IN THE FORM INPUT FEILD

///RUN AN UPDATE QUERY
?>
<form name="guest" method="POST" action="addcomment.php">
			<span>Name:</span>   <input type="text" name="name" placeholder=""/><br />
            <span>Email:</span> <input type="text" name="email"/><br />
            <p>Comment:</p> <textarea name="comment" rows="10" cols="50"> </textarea> <br />
            <button type="submit" name="submit">Submit</button>
        </form>








?>