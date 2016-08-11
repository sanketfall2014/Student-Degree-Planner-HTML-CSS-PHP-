<?php




if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
        $password = $_POST['password'];

			
	//	if ((strlen($password) % 2) == 0) {

	//$password = recover_technique2($_POST['password'], $_SESSION['array_digits'],$_SESSION['string_char'] );

		$password_hash = md5($password);
		
		//echo "<script type='text/javascript'>alert('$username$password_hash'); window.location = 'index1.php';</script>";
		
		//echo"Username: ".$username." Password: ".$password_hash;
		if (!empty($username) && !empty($password)) {
			$query = "SELECT `uid` FROM `users` WHERE `nid`='$username' AND `password`='$password_hash'";
			if ($query_run = mysql_query($query)) {
				$query_num_rows = mysql_num_rows($query_run);
				if ($query_num_rows == 1) {
					$user_id = mysql_result($query_run, 0, 'uid');
					$_SESSION['user_id'] = $user_id;
					//survey2($timetaken,$username);
					
					header('Location: index.php');
					
				}
			}


		}
		else {
			echo ('Please fill it up completely!');

		}


	/*}
	else {
	echo 'Password should consist even number of digits.';

	// echo  "<script type='text/javascript'>alert('Password should consist even number of digits.');</script>";
	// header('Location: index.php');

	}

	*/
	if ($query_num_rows == 0) {
		$here = 'Invalid username/password combination!';
		echo "<script type='text/javascript'>alert('$here'); window.location = 'index1.php';</script>";


				// echo  "<script type='text/javascript'> alert(Invalid username/password combination!);</script>";
				// header('Location: index.php');

			}
}

?>



<form action="<?php
echo $current_file; ?>" method="POST">

Username: <input type="text" name="username" autofocus><br />
Password: <input id="pass2" type="password"  value="" name="password" onkeypress="starttime2(event)"><br />
<input type="submit" value="Log IN" onclick="stoptime2(event)"><br />
<input type="text"  name="timetaken2" id="timetaken2" hidden>
</form>