<?php

require 'core.inc.php';
require 'connect.inc.php';

//	echo "<script type='text/javascript'>alert('Welcome');</script>";
	




if(loggedin()) {

 //settime();

 
  header ('Location:user.php');

}
else {


include 'loginform.inc.php';

}

?>

