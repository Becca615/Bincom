<?php
function db() {
    global $link;
    $link = mysqli_connect("localhost", "root", "", "todo") or die("unable to connect to database");
    return $link;
}
  if(db()){
   // echo "connected succesfully";
  }
?>