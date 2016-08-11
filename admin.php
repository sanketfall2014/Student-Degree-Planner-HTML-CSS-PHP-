<?php

require 'connect.inc.php';
require 'core.inc.php';


$cookie_name = "last_login_time1";
								if(!isset($_COOKIE[$cookie_name])){
									
								} else{
									echo "<script type='text/javascript'> alert('You were logged in on:".$_COOKIE[$cookie_name]."');</script>";
								}



if(
isset($_POST['fname'])&&
isset($_POST['lname'])&&
isset($_POST['uid'])&&
isset($_POST['nid'])&&
isset($_POST['joinsem'])&&
isset($_POST['password'])&&
isset($_POST['gpa']) &&
isset($_POST['email'])&&
isset($_POST['pno']) &&
isset($_POST['tno'])) {

$error='';
$fname = $_POST['fname'];
$lname =  $_POST['lname'];
$uid = $_POST['uid'];
$nid  = $_POST['nid'];
$joinsem = $_POST['joinsem'];
$password = $_POST['password'];
$gpa = $_POST['gpa'];
$email = $_POST['email'];
$pno = $_POST['pno'];
$tno = $_POST['tno'];

if(
!empty($fname) &&
!empty($lname) &&
!empty($uid) &&
!empty($nid) &&
!empty($joinsem) &&
!empty($password)&&
!empty($gpa) &&
!empty($email) &&
!empty($pno) &&
!empty($tno)

){
  if(isset($_POST['adduser'])){
  
		if($tno == 'Data Science'){
		$t = 'd';
		}
		else{
			$t = 'n';
		}
  
		

     $password_md5 = md5($password);

   $query1 = "INSERT INTO `users` VALUES ('$nid', '$uid' ,'$fname','$lname','$password_md5','$joinsem','$gpa','$email','$pno','0')";
   //,'$password_color_md5','$password3_md5'
     if ($query_run1 = mysql_query($query1)) {
        echo  "<script type='text/javascript'> alert('Records inserted succesfully..');</script>";
      //  header('Location:admin.php');
	}
     else {
       echo 'Sorry we couldn\'t register you at this moment. Try again later.';
     }
	 
	 if($tno1 == 'Data Science'){
		$t = 'd';
		}
		else{
			$t = 'n';
		}
  
		



   $query1 = "INSERT INTO `usertrack` VALUES ('$uid' ,'$tno','$t')";
   //,'$password_color_md5','$password3_md5'
     if ($query_run1 = mysql_query($query1)) {
        echo  "<script type='text/javascript'> alert('Records inserted succesfully..');</script>";
        header('Location:admin.php');
	}
     else {
       echo 'Sorry we couldn\'t register you at this moment. Try again later.';
     }
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
		}

   }
   
   
   

else {

  //echo 'All fields are required.';
  echo  "<script type='text/javascript'> alert('All fields are required.');</script>";
}
}



if(
isset($_POST['fname1'])&&
isset($_POST['lname1'])&&
isset($_POST['uid1'])&&
isset($_POST['nid1'])&&
isset($_POST['joinsem1'])&&
isset($_POST['password1'])&&
isset($_POST['gpa1'])&&
isset($_POST['email1'])&&
isset($_POST['pno1']) &&
isset($_POST['tno1'])
) {

$error='';
$fname1 = $_POST['fname1'];
$lname1 =  $_POST['lname1'];
$uid1 = $_POST['uid1'];
$nid1  = $_POST['nid1'];
$joinsem1 = $_POST['joinsem1'];
$password1 = $_POST['password1'];
$gpa1 = $_POST['gpa1'];
$email1 = $_POST['email1'];
$pno1 = $_POST['pno1'];
$tno1 = $_POST['tno1'];

if(
!empty($fname1) &&
!empty($lname1) &&
!empty($uid1) &&
!empty($nid1) &&
!empty($joinsem1) &&
!empty($password1) &&
!empty($gpa1) &&
!empty($email1) &&
!empty($pno1) &&
!empty($tno1)

){
  if(isset($_POST['updateuser'])){
  		
		if($tno1 == 'Data Science'){
		$t = 'd';
		}
		else{
			$t = 'n';
		}

  
		

     $password1_md5 = md5($password1);
	 
	$exists = mysql_query ("SELECT * FROM users WHERE uid ='$uid1' ") or die ("query cant connect");   
    if (mysql_num_rows ($exists) != 0) {
    // update the description in the database 

        $query2 = "UPDATE users SET nid='$nid1', fname='$fname1', lname='$lname1', password='$password1_md5', joinsem='$joinsem1', gpa='$gpa1', email='$email1', pno='$pno1' WHERE uid='$uid1'";

 //  $query2 = "INSERT INTO `user` VALUES ('$nid', $uid ,'$fname','$lname','$password_md5','$joinsem')";
   //,'$password_color_md5','$password3_md5'
     if ($query_run2 = mysql_query($query2)) {
        echo  "<script type='text/javascript'> alert('Records inserted succesfully..');</script>";
       // header('Location:admin.php');
	}
     else {
       echo 'Sorry we couldn\'t update at this moment. Try again later.';
     }
		}
		
		else{
			
			echo  "<script type='text/javascript'> alert('This record doesnt exist');</script>";
		}
		
		
	$exists = mysql_query ("SELECT * FROM usertrack WHERE username ='$uid1' ") or die ("query cant connect");   
    if (mysql_num_rows ($exists) != 0) {
    // update the description in the database 

        $query2 = "UPDATE usertrack SET track='$tno1', tid='$t' WHERE username='$uid1'";

 //  $query2 = "INSERT INTO `user` VALUES ('$nid', $uid ,'$fname','$lname','$password_md5','$joinsem')";
   //,'$password_color_md5','$password3_md5'
     if ($query_run2 = mysql_query($query2)) {
        echo  "<script type='text/javascript'> alert('Records inserted succesfully..');</script>";
        header('Location:admin.php');
	}
     else {
       echo 'Sorry we couldn\'t update at this moment. Try again later.';
     }
		}
		
		
		
		
		
		
		
		
		
		
		
		

   }
}
   
   
   

else {

  //echo 'All fields are required.';
  echo  "<script type='text/javascript'> alert('Can not update at this time. Check your information');</script>";
}
}


if(

isset($_POST['uid2'])) {

$error='';

$uid2 = $_POST['uid2'];


if(

!empty($uid2)


){
  if(isset($_POST['deleteuser'])){
  


   $query2 = "DELETE FROM users WHERE uid = '$uid2'";
   //,'$password_color_md5','$password3_md5'
     if ($query_run2 = mysql_query($query2)) {
        echo  "<script type='text/javascript'> alert('Records deleted succesfully..');</script>";
        header('Location:admin.php');
	}
     else {
       echo 'Sorry we couldn\'t register you at this moment. Try again later.';
     }
		}

   }
   
   
   

else {

  //echo 'All fields are required.';
  echo  "<script type='text/javascript'> alert('All fields are required.');</script>";
}
}





if(

isset($_POST['cpref2']) &&
isset($_POST['cnum2'])) {

$error='';

$cpref2 = $_POST['cpref2'];
$cnum2 = $_POST['cnum2'];


if(

!empty($cpref2)&&
!empty($cnum2)


){
  if(isset($_POST['deletecourse'])){
  

echo  "<script type='text/javascript'> alert('$cnum2');</script>"; 
   $query2 = "DELETE FROM ecourse WHERE ecnum = '$cnum2'";
   //,'$password_color_md5','$password3_md5'
     if ($query_run2 = mysql_query($query2)) {
        echo  "<script type='text/javascript'> alert('Records deleted succesfully..');</script>";
        header('Location:admin.php');
	}
     else {
       echo 'Sorry we couldn\'t register you at this moment. Try again later.';
     }
		}

   }
   
   
   

else {

  //echo 'All fields are required.';
  echo  "<script type='text/javascript'> alert('All fields are required.');</script>";
}
}









if(
isset($_POST['cname'])&&
isset($_POST['cnum'])&&
isset($_POST['cpref'])&&
isset($_POST['cdes'])&&
isset($_POST['prereq'])) {

$error='';
$ecname = $_POST['cname'];
$ecnum =  $_POST['cnum'];
$ecpref = $_POST['cpref'];
$ecdes  = $_POST['cdes'];
$eprereq = $_POST['prereq'];


if(
!empty($ecname) &&
!empty($ecnum) &&
!empty($ecpref) &&
!empty($ecdes) &&
!empty($eprereq)

){
  if(isset($_POST['addcourse'])){
  

   $query3 = "INSERT INTO `ecourse` VALUES ('$ecname', '$ecnum' ,'$ecpref','$ecdes','$eprereq','3')";
   //,'$password_color_md5','$password3_md5'
     if ($query_run3 = mysql_query($query3)) {
        echo  "<script type='text/javascript'> alert('Records inserted succesfully..');</script>";
        header('Location:admin.php');
	}
     else {
       echo 'Sorry we couldn\'t register you at this moment. Try again later.';
     }
		}

   } 
   

else {

  //echo 'All fields are required.';
  echo  "<script type='text/javascript'> alert('All fields are required.');</script>";
}
}





if(
isset($_POST['cname1'])&&
isset($_POST['cnum1'])&&
isset($_POST['cpref1'])&&
isset($_POST['cdes1'])&&
isset($_POST['prereq1'])) {

$error='';
$cname1 = $_POST['cname1'];
$cnum1 =  $_POST['cnum1'];
$cpref1 = $_POST['cpref1'];
$cdes1  = $_POST['cdes1'];
$prereq1 = $_POST['prereq1'];


if(
!empty($cname1) &&
!empty($cnum1) &&
!empty($cpref1) &&
!empty($cdes1) &&
!empty($prereq1)

){
  if(isset($_POST['updatecourse'])){
  

  
		


	 
	$exists = mysql_query ("SELECT * FROM ecourse WHERE ecnum ='$cnum1' ") or die ("query cant connect");   
    if (mysql_num_rows ($exists) != 0) {
    // update the description in the database       
        $query2 = "UPDATE ecourse SET ecname='$cname1', ecnum='$cnum1', ecpref='$cpref1', ecdes='$cdes1', eprereq='$prereq1', ecredit='3' WHERE ecnum='$cnum1'";

 //  $query2 = "INSERT INTO `user` VALUES ('$nid', $uid ,'$fname','$lname','$password_md5','$joinsem')";
   //,'$password_color_md5','$password3_md5'
     if ($query_run2 = mysql_query($query2)) {
        echo  "<script type='text/javascript'> alert('Records updated succesfully..');</script>";
        header('Location:admin.php');
	}
     else {
       echo 'Sorry we couldn\'t update at this moment. Try again later.';
     }
		}
		
		else{
			
			echo  "<script type='text/javascript'> alert('This record doesnt exist');</script>";
		}

   }
}
   
   
   

else {

  //echo 'All fields are required.';
  echo  "<script type='text/javascript'> alert('Can not update at this time. Check your information');</script>";
}
}






if(
isset($_POST['tname1'])) {

$error='';
$tname1 = $_POST['tname1'];


if(
!empty($tname1)

){
  if(isset($_POST['addtrack'])){
  

  $query1 = "INSERT INTO `track` VALUES ('1', '$tname1')";
   //,'$password_color_md5','$password3_md5'
     if ($query_run1 = mysql_query($query1)) {
        echo  "<script type='text/javascript'> alert('Records inserted succesfully..');</script>";
        header('Location:admin.php');
	}
     else {
       echo 'Sorry we couldn\'t register you at this moment. Try again later.';
     }
		}

   }
   
 else {

  //echo 'All fields are required.';
  echo  "<script type='text/javascript'> alert('All fields are required.');</script>";
}
}


























?>























<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UTDallas</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">UTDallas Admin Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Courses</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Users</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Degree Plan</a>
                    </li>
                  
                    <li>
                        <a class="page-scroll" href="logout_a.php">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in" style="color:orange;">Welcome To Erik Jonsson School of Engineering and Computer Science</div>
                <a href="#services" class="page-scroll btn btn-xl">To know more about your actions</a>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="section-heading">Add Course</h3>
					<form action="admin.php" method="POST" enctype="multipart/form-data">
					Course Name:<br>
					<input type="text" class="form-control" placeholder="Course Name *" name="cname" id="name" required data-validation-required-message="Please enter course name."><br>					
					Course Number:<br>
					<input type="text" class="form-control" placeholder="Course Number *" name="cnum" id="number" required data-validation-required-message="Please enter course number."><br>					
					Course Prefix:<br>
					<input type="text" class="form-control" placeholder="Course Prefix *" name="cpref" id="prefix" required data-validation-required-message="Please enter course prefix.">	<br>				
					Course Description:<br>
					<input type="text" class="form-control" placeholder="Course Description *" name="cdes" id="descr" required data-validation-required-message="Please enter course description.">	<br>				

					Prerequisites:<br>
					<input type="text" class="form-control" placeholder="Course Prerequisites *" name="prereq" id="prereq" required data-validation-required-message="Please enter course prerequisite.">	<br>
					
					<input type="submit" value="Add Course" name="addcourse"><br><br><br>

					</form>
					
					 <h3 class="section-heading">Update Course</h3>
					<form action="admin.php" method="POST" enctype="multipart/form-data">
					Course Name:<br>
					<input type="text" class="form-control" placeholder="Course Name *" name="cname1" id="name" required data-validation-required-message="Please enter course name."><br>					
					Course Number:<br>
					<input type="text" class="form-control" placeholder="Course Number *" name="cnum1" id="number" required data-validation-required-message="Please enter course number."><br>					
					Course Prefix:<br>
					<input type="text" class="form-control" placeholder="Course Prefix *" name="cpref1" id="prefix" required data-validation-required-message="Please enter course prefix.">	<br>				
					Course Description:<br>
					<input type="text" class="form-control" placeholder="Course Description *" name="cdes1" id="descr" required data-validation-required-message="Please enter course description.">	<br>				

					Prerequisites:<br>
					<input type="text" class="form-control" placeholder="Course Prerequisites *" name="prereq1" id="prereq" required data-validation-required-message="Please enter course prerequisite.">	<br>				
					
					<input type="submit" value="Update Course" name="updatecourse"><br><br><br>
					</form>
					
					 <h3 class="section-heading">Delete Course</h3>
					<form action="admin.php" method="POST" enctype="multipart/form-data">
					Course Prefix:<br>
					<input type="text" class="form-control" placeholder="Course Prefix *" name="cpref2" id="name" required data-validation-required-message="Please enter course prefix."><br>					
					Course Number:<br>
					<input type="text" class="form-control" placeholder="Course Number *" name="cnum2" id="number" required data-validation-required-message="Please enter course number."><br>					
									
					<input type="submit" value="Delete Course" name="deletecourse"><br><br><br>
					</form>
                </div>
            </div>
           
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">User Information</h2>
                    <h3 class="section-subheading text-muted">Add/Update/Delete User Information</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/roundicons.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Add Users</h4>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/startup-framework.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Update Users</h4>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/treehouse.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Delete Users</h4>
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-heading">Add Degree Plan</h2><br><br><br>
					<form action="admin.php" method="POST" enctype="multipart/form-data">
					Degree Plan Name (Track):<br>
					<input type="text" class="form-control" placeholder="Degree Plan Name *" name="tname1" id="name" required data-validation-required-message="Please enter track name."><br>
					<input type="submit" value="Add Track" name="addtrack"><br><br><br>
					</form>
			<!--		<h2 class="section-heading">Update Degree Plan</h2><br><br><br>
					<form>
					Degree Plan Name (Track):<br>
					<input type="text" class="form-control" placeholder="Degree Plan Name *" id="name" required data-validation-required-message="Please enter course name."><br>
					Core Courses:<br>
					<input type="text" class="form-control" placeholder="Core course Name *" id="name" required data-validation-required-message="Please enter core course name."><br>
					Elective courses:<br>
					<input type="text" class="form-control" placeholder="Elective course Name *" id="name" required data-validation-required-message="Please enter elective course name."><br>
					Prerequisitesite:<br>
					<input type="text" class="form-control" placeholder="Prerequisite course Name *" id="name" required data-validation-required-message="Please enter prerequisite course name."><br>
					<input type="submit" value="Update Course"><br><br><br>
					</form>
					<h2 class="section-heading">Delete Degree Plan</h2><br><br><br>
					<form>
					Degree Plan Name (Track):<br>
					<input type="text" class="form-control" placeholder="Degree Plan Name *" id="name" required data-validation-required-message="Please enter course name."><br>
					<input type="submit" value="Delete Course"><br><br><br>
					</form> -->
					
					
					

					
					</div>
            </div>
           

                </div>
      
    </section>

    <!-- Team Section -->
   


    
    <!-- Contact Section -->
   
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Sanket Prabhu 2016</span>
                </div>
               
                
            </div>
        </div>
    </footer>

    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->

    <!-- Portfolio Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                             <h3 class="section-heading">Add User</h3>
					<form action="admin.php" method="POST" enctype="multipart/form-data">
					First Name:<br>
					<input type="text" class="form-control" placeholder="First Name *" name="fname" id="fname" required data-validation-required-message="Please enter first name."><br>					
					Last Name:<br>
					<input type="text" class="form-control" placeholder="Last Name *" name="lname" id="lname" required data-validation-required-message="Please enter last name."><br>					
					UTD ID:<br> <span class="check"  ></span> 
					<input type="text" class="form-control uid" placeholder="UTD ID *" name="uid"  required data-validation-required-message="Please enter utdID."><br>
					
					Net ID:<br>
					<input type="text" class="form-control" placeholder="Net ID *" name="nid" id="nid" required data-validation-required-message="Please enter netID.">	<br>				

					Password:<br>
					<input type="password" class="form-control" placeholder="Password *" name="password" id="pass" required data-validation-required-message="Please enter password.">	<br>
					
					GPA:<br>
					<input type="text" class="form-control" placeholder="GPA *" name="gpa" id="gpa" required data-validation-required-message="Please enter GPA.">	<br>
					
					Joining semester:<br>
					<input type="text" class="form-control" placeholder="Joining Semester *" name="joinsem" id="join" required data-validation-required-message="Please enter joining semester.">	<br>
					
					Email ID:<br>
					<input type="text" class="form-control" placeholder="Email ID *" name="email" id="email" required data-validation-required-message="Please enter Email ID.">	<br>

					Phone Number:<br>
					<input type="text" class="form-control" placeholder="Phone Number *" name="pno" id="pno" required data-validation-required-message="Please enter Phone Number.">	<br>
					
					Track:<br>
					<input type="text" class="form-control" placeholder="Track *" name="tno" id="tno" required data-validation-required-message="Please enter Track.">	<br>
					
					<input type="submit" name="adduser" value="Add User"><br><br><br>

					</form>
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 2 -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h3 class="section-heading">Update User</h3>
					<form action="admin.php" method="POST" enctype="multipart/form-data">
					First Name:<br>
					<input type="text" class="form-control" placeholder="First Name *" name="fname1" id="fname1" required data-validation-required-message="Please enter first name."><br>					
					Last Name:<br>
					<input type="text" class="form-control" placeholder="Last Name *" name="lname1" id="lname1" required data-validation-required-message="Please enter last number."><br>					
					UTD ID:<br>
					<input type="text" class="form-control" placeholder="UTD ID *" name="uid1" id="uid1" required data-validation-required-message="Please enter utdID.">	<br>				
					Net ID:<br>
					<input type="text" class="form-control" placeholder="Net ID *" name="nid1" id="nid1" required data-validation-required-message="Please enter netID.">	<br>				

					Password:<br>
					<input type="password" class="form-control" placeholder="Password *" name="password1" id="password1" required data-validation-required-message="Please enter password.">	<br>
					
					GPA:<br>
					<input type="text" class="form-control" placeholder="GPA *" name="gpa1" id="gpa1" required data-validation-required-message="Please enter GPA.">	<br>
					
					Joining semester:<br>
					<input type="text" class="form-control" placeholder="Joining Semester *" name="joinsem1" id="joinsem1" required data-validation-required-message="Please enter joining semester.">	<br>
					
					Email ID:<br>
					<input type="text" class="form-control" placeholder="Email ID *" name="email1" id="email1" required data-validation-required-message="Please enter Email ID.">	<br>

					Phone Number:<br>
					<input type="text" class="form-control" placeholder="Phone Number *" name="pno1" id="pno1" required data-validation-required-message="Please enter Phone Number.">	<br>

					Track:<br>
					<input type="text" class="form-control" placeholder="Track *" name="tno1" id="tno1" required data-validation-required-message="Please enter track.">	<br>
					
					<input type="submit" name="updateuser" value="Update User"><br><br><br>

					</form>
                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 3 -->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h3 class="section-heading">Delete User</h3>
					<form action="admin.php" method="POST" enctype="multipart/form-data">				
					UTD ID:<br>
					<input type="text" class="form-control" placeholder="UTD ID *" name="uid2" id="uid" required data-validation-required-message="Please enter utdID.">	<br>							

				
					
					
					<input type="submit" name="deleteuser" value="Delete User"><br><br><br>

					</form>
							


                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

   

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>
	

 <!-- <script src="jquery-1.9.1.js"></script> -->
  <script src="jquery-ui.js"></script>
	
	<script type="text/javascript">
	$(function()
	{
		
  $('.uid').keyup(function()
  {

	  
  var checkname=$(this).val();
 var availname=remove_whitespaces(checkname);
  if(availname!=''){
  $('.check').show();
  $('.check').fadeIn(400).html('<img src="image/ajax-loading.gif" /> ');

  var String = 'uid='+ availname;

  $.ajax({
          type: "POST",
          url: "available.php",
          data: String,
          cache: false,
          success: function(result){
               var result=remove_whitespaces(result);
               if(result==''){
						
                       $('.check').html('<img src="image/accept.png" /> This UTD ID Is Avaliable');
                       $(".check").removeClass("red");
                       $('.check').addClass("green");
                       $(".uid").removeClass("yellow");
                       $(".uid").addClass("white");
               }else{
                       $('.check').html('<img src="image/error.png" /> This UTD ID Is Already Taken');
                       $(".check").removeClass("green");
                       $('.check').addClass("red")
                       $(".uid").removeClass("white");
                       $(".uid").addClass("yellow");
               }
          }
      });
   }else{
       $('.check').html('');

   }
  });
});

function remove_whitespaces(str){
     var str=str.replace(/^\s+|\s+$/,'');
     return str;
}
	</script>

</body>

</html>
