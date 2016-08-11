<?php

require 'core.inc.php';
require 'connect.inc.php';


if(loggedin()) {
	
	
  header ('Location:admin.php');

}
else {


include 'loginform2.inc.php';
}

?>

