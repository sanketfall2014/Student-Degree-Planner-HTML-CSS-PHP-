<?php

require 'core.inc.php';
require 'connect.inc.php';


if(loggedin()) {
  header ('Location:advisor.php');

}
else {


include 'loginform3.inc.php';
}

?>

