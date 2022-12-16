<?php

//constants to avoid repeating variables
define('dbHost', 'localhost');
define('dbUsername','root');
define('dbPassword','');
define('dbDatabase','guestbook');


$db=mysqli_connect(dbHost, dbUsername, dbPassword, dbDatabase);

/*if($conn == TRUE){
    echo "lies";
}else{
    echo "failed";
}*/
?>