<?php

//constants to avoid repeating variables
define('dbHost', 'localhost');
define('dbUsername','root');
define('dbPassword','');
define('dbDatabase','guestbook');
define('HOMEPAGE', 'http://localhost/dami/bincom/guestbook/');


$db=mysqli_connect(dbHost, dbUsername, dbPassword, dbDatabase);

//if($db == TRUE){
//    echo "success";
//}else{
//    echo "failed";
//}
?>