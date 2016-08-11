<?php

require 'core.inc.php';
require 'connect.inc.php';

//echo 'you are logged IN.<a href="logout.php" >Log out.</a><br>';
  $field = 'fname';
  $lfield = 'lname';
  $nfield = 'nid';
  $efield = 'email';
  $pfield = 'pno';
  $afield = 'joinsem';
  $gfield = 'gpa';
  $datetime = 'LastLogin';
  $name = getuserfield($field);
  $dtime = getuserfield($datetime);
  $result1 = gettime();
  $tr = 'track';
  $track = 'Data Science';
  $track1 = 'Networks and Telecommunication';
  
  
								$cookie_name = "last_login_time";
								if(!isset($_COOKIE[$cookie_name])){
									
								} else{
									echo "<script type='text/javascript'> alert('You were logged in on:".$_COOKIE[$cookie_name]."');</script>";
								}
								
							//	echo "<script type='text/javascript'> alert('here');</script>";
							
							if(isset($_POST["yes"])){
								$servername = "localhost";
									$username = "root";
									$password = "";
									$dbname = "project";

									$conn = new mysqli($servername, $username, $password, $dbname);
									if ($conn->connect_error) {
										 die("Connection failed: " . $conn->connect_error);
									}
								
								$t = gettrack($tr);
								if(strcmp($track,$t)){
									echo "<script type='text/javascript'> alert('inside if');</script>";
									$query = "UPDATE usertrack SET track='".$track."'  
										WHERE `username` ='". $_SESSION['user_id']."'"; 
										$result = mysql_query($query);
									
								}
								else{
									echo "<script type='text/javascript'> alert('inside else');</script>";
										$query = "UPDATE usertrack SET track='".$track1."' 
										WHERE `username` ='". $_SESSION['user_id']."'"; 
										$result = mysql_query($query);
									
								}
									  

							}

 
  
  
  

 
									$servername = "localhost";
									$username = "root";
									$password = "";
									$dbname = "project";

									$conn = new mysqli($servername, $username, $password, $dbname);
									if ($conn->connect_error) {
										 die("Connection failed: " . $conn->connect_error);
									} /*

									$sql = "SELECT cname, cnum, cpref, cdes, prereq, credits FROM course";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
										 while($row = $result->fetch_assoc()) {
											 $row1 = $row["cnum"];*/
										//	 echo  "<script type='text/javascript'> alert('$bname');</script>";
										//$bname = $_POST['id'];
											 if(isset($_POST["add_core"])){
											//	 echo  "<script type='text/javascript'> alert('Records inserted succesfully..');</script>";
											//	 echo  "<script type='text/javascript'> alert('Hi $bname');</script>";
											get_course_from_checkboxes($_POST["core_courses"]) ;
											
																			
											}
											if(isset($_POST["add_elective"])){
											//	 echo  "<script type='text/javascript'> alert('Records inserted succesfully..');</script>";
											//	 echo  "<script type='text/javascript'> alert('Hi $bname');</script>";
											get_course_from_checkboxes1($_POST["elective_courses"]) ;
											
																			
											}
											 if(isset($_POST["drop_core"])){
											//	 echo  "<script type='text/javascript'> alert('Records inserted succesfully..');</script>";
											//	 echo  "<script type='text/javascript'> alert('Hi $bname');</script>";
											get_course_from_checkboxes2($_POST["core_courses1"]) ;
											
																			
											}
											
											if(isset($_POST["drop_elective"])){
											//	 echo  "<script type='text/javascript'> alert('Records inserted succesfully..');</script>";
											//	 echo  "<script type='text/javascript'> alert('Hi $bname');</script>";
											get_course_from_checkboxes3($_POST["elective_courses1"]) ;
											
																			
											}
								
								
								function get_course_from_checkboxes($core_courses){
													if(isset($core_courses)){
													//Inserting data in user_classes table
													if(count($core_courses) >0){
												//		echo "<table><caption>Core courses registered now </caption><tr> <th>Course Prefix </th> <th>Course Name </th> <th>Number of Credit Hours </th></tr>";

														foreach ($core_courses as $key => $value) {
															
														//	echo $value;
															$servername = "localhost";
															$username = "root";
															$password = "";
															$dbname = "project";

															$conn = new mysqli($servername, $username, $password, $dbname);
															if ($conn->connect_error) {
																 die("Connection failed: " . $conn->connect_error);
															}
															
															
															$sql = "Insert into registerdcourses values('".$_SESSION['user_id']."','".$value."')";
															     if ($query_run1 = mysql_query($sql)) {
																			echo  "<script type='text/javascript'> alert('Courses added succesfully..');</script>";
																		//	header('Location:admin.php');
																		}
																		 else {
																		  echo  "<script type='text/javascript'> alert('You have already registered the course');</script>";
														//	$conn->query($sql);
														//	echo "</tr>";
															}
													//	echo "</table>";
													}
												//	echo "<br/>";
																		}
																			$conn->close();
																			}
								}
								
								
								function get_course_from_checkboxes2($core_courses1){
													if(isset($core_courses1)){
													//Inserting data in user_classes table
													if(count($core_courses1) >0){
												//		echo "<table><caption>Core courses registered now </caption><tr> <th>Course Prefix </th> <th>Course Name </th> <th>Number of Credit Hours </th></tr>";

														foreach ($core_courses1 as $key => $value) {
															
														//	echo $value;
															$servername = "localhost";
															$username = "root";
															$password = "";
															$dbname = "project";

															$conn = new mysqli($servername, $username, $password, $dbname);
															if ($conn->connect_error) {
																 die("Connection failed: " . $conn->connect_error);
															}
															
															
															$sql = "Delete from registerdcourses where uid='".$_SESSION['user_id']."' and cnum='".$value."'";
															     if ($query_run1 = mysql_query($sql)) {
																			echo  "<script type='text/javascript'> alert('Courses deleted succesfully..');</script>";
																		//	header('Location:admin.php');
																		}
																		 else {
																		  echo  "<script type='text/javascript'> alert('You have already registered the course');</script>";
														//	$conn->query($sql);
														//	echo "</tr>";
															}
													//	echo "</table>";
													}
												//	echo "<br/>";
																		}
																			$conn->close();
																			}
								}
								
								
								function get_course_from_checkboxes1($elective_courses){
													if(isset($elective_courses)){
													//Inserting data in user_classes table
													if(count($elective_courses) >0){
												//		echo "<table><caption>Core courses registered now </caption><tr> <th>Course Prefix </th> <th>Course Name </th> <th>Number of Credit Hours </th></tr>";

														foreach ($elective_courses as $key => $value) {
															
														//	echo $value;
															$servername = "localhost";
															$username = "root";
															$password = "";
															$dbname = "project";

															$conn = new mysqli($servername, $username, $password, $dbname);
															if ($conn->connect_error) {
																 die("Connection failed: " . $conn->connect_error);
															}
															
															
															$sql = "Insert into registeredecourses values('".$_SESSION['user_id']."','".$value."')";
															     if ($query_run1 = mysql_query($sql)) {
																			echo  "<script type='text/javascript'> alert('Courses added succesfully..');</script>";
																		//	header('Location:admin.php');
																		}
																		 else {
																		  echo  "<script type='text/javascript'> alert('You have already registered the course');</script>";
														//	$conn->query($sql);
														//	echo "</tr>";
															}
													//	echo "</table>";
													}
												//	echo "<br/>";
																		}
																			$conn->close();
																			}
								}
								
								function get_course_from_checkboxes3($elective_courses1){
													if(isset($elective_courses1)){
													//Inserting data in user_classes table
													if(count($elective_courses1) >0){
												//		echo "<table><caption>Core courses registered now </caption><tr> <th>Course Prefix </th> <th>Course Name </th> <th>Number of Credit Hours </th></tr>";

														foreach ($elective_courses1 as $key => $value) {
															
														//	echo $value;
															$servername = "localhost";
															$username = "root";
															$password = "";
															$dbname = "project";

															$conn = new mysqli($servername, $username, $password, $dbname);
															if ($conn->connect_error) {
																 die("Connection failed: " . $conn->connect_error);
															}
															
															
															$sql = "Delete from registeredecourses where uid='".$_SESSION['user_id']."' and ecnum='".$value."'";
															     if ($query_run1 = mysql_query($sql)) {
																			echo  "<script type='text/javascript'> alert('Courses deleted succesfully..');</script>";
																		//	header('Location:admin.php');
																		}
																		 else {
																		  echo  "<script type='text/javascript'> alert('You have already registered the course');</script>";
														//	$conn->query($sql);
														//	echo "</tr>";
															}
													//	echo "</table>";
													}
												//	echo "<br/>";
																		}
																			$conn->close();
																			}
								}
								
								
							 if(isset($_POST['add_adv1'])){
								 
								 if(isset($_POST['timeslot'])){
									 
									 $var = $_POST['timeslot'];
								
									echo  "<script type='text/javascript'> alert('You have $var');</script>";
									
									$servername = "localhost";
									$username = "root";
									$password = "";
									$dbname = "project";

									$conn = new mysqli($servername, $username, $password, $dbname);
									if ($conn->connect_error) {
										 die("Connection failed: " . $conn->connect_error);
									} 



									$sql = "Insert into regtslot values('".$_SESSION['user_id']."','".$var."','advisor1')";
									if ($query_run1 = mysql_query($sql)) {
									echo  "<script type='text/javascript'> alert('Appointment made succesfully..');</script>";
										header('Location:user.php');
									}
									 else {
									echo  "<script type='text/javascript'> alert('You have already added timeslot');</script>";
									//	$conn->query($sql);
									//	echo "</tr>";
											}
											
									$sql = "Delete from advapt where id='advisor1' and timeslots='".$var."'";
									//	echo "</table>";
									if ($query_run1 = mysql_query($sql)) {
									echo  "<script type='text/javascript'> alert('Appointment made succesfully..');</script>";
										header('Location:user.php');
									}
									 else {
									echo  "<script type='text/javascript'> alert('You have already added timeslot');</script>";
									//	$conn->query($sql);
									//	echo "</tr>";
											}
								
									//	echo "<br/>";
												
											$conn->close();
								 }
									}
									
									
									if(isset($_POST['add_adv2'])){
								 
								 if(isset($_POST['timeslot1'])){
									 
									 $var = $_POST['timeslot1'];
								
									echo  "<script type='text/javascript'> alert('You have $var');</script>";
									
									$servername = "localhost";
									$username = "root";
									$password = "";
									$dbname = "project";

									$conn = new mysqli($servername, $username, $password, $dbname);
									if ($conn->connect_error) {
										 die("Connection failed: " . $conn->connect_error);
									} 



									$sql = "Insert into regtslot values('".$_SESSION['user_id']."','".$var."','advisor2')";
									if ($query_run1 = mysql_query($sql)) {
									echo  "<script type='text/javascript'> alert('Appointment made succesfully..');</script>";
										header('Location:user.php');
									}
									 else {
									echo  "<script type='text/javascript'> alert('You have already added timeslot');</script>";
									//	$conn->query($sql);
									//	echo "</tr>";
											}
											
									$sql = "Delete from advapt where id='advisor2' and timeslots='".$var."'";
									//	echo "</table>";
									if ($query_run1 = mysql_query($sql)) {
									echo  "<script type='text/javascript'> alert('Appointment made succesfully..');</script>";
										header('Location:user.php');
									}
									 else {
									echo  "<script type='text/javascript'> alert('You have already added timeslot');</script>";
									//	$conn->query($sql);
									//	echo "</tr>";
											}
								
									//	echo "<br/>";
												
											$conn->close();
								 }
									}

								


																			
																 
														

								


?>

<script type="text/javascript">
	function addCourse(name){
		//var x = document.getElementById("button").name;
	//	alert('Button '+name);
	}
</script>


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
                <a class="navbar-brand page-scroll" href="#page-top">UTDallas Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Profile</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Course Information</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">CS Master's Acknowledgment of Policies Form</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">CS degree plan of your track</a>
                    </li>
					 <li>
                        <a class="page-scroll" href="#vcourses">Available Courses</a>
                    </li>
					 <li>
                        <a class="page-scroll" href="#contact">Contact Advisor</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="logout.php">Logout</a>
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
                <div class="intro-heading" style="color:orange;">It's Nice To Meet You <b><?php echo getuserfield($field) ?></b></div>
                <a href="#services" class="page-scroll btn btn-xl">To know more about your profile</a>
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Your Profile Information</h2>
                    <h3 class="section-subheading text-muted">The track you choose is <?php echo gettrack($tr)?> track</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Personal Information</h4>
                    <p class="text-muted">Name: <?php echo getuserfield($field) ?>&nbsp<?php echo getuserfield($lfield) ?> </p>
					<p class="text-muted">NetID: <?php echo getuserfield($nfield) ?> </p>
					<p class="text-muted">Email ID: <?php echo getuserfield($efield) ?></p>
					<p class="text-muted">Tel: <?php echo getuserfield($pfield) ?></p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Degree Information</h4>
                    <p class="text-muted">Major: Computer Science</p>
					<p class="text-muted">Track: <?php echo gettrack($tr) ?> </p>
				<p>	<a class="text-muted" href="usern.php">Click here if you want to change to <?php if(strcmp($track,gettrack($tr))){echo $track;}
				else{echo $track1;}?> track</a></p>
					<p class="text-muted">Admitted: <?php echo getuserfield($afield) ?></p>
					<p class="text-muted">GPA: <?php echo getuserfield($gfield) ?></p>
					<p class="text-muted">Expected Graduation: August 2016</p>                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Waivers/Transfers</h4>
					<p class="text-muted">Courses waived: 0</p>
					<p class="text-muted">Courses Transfered: 0</p>                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Course Information</h2>
                    <h3 class="section-subheading text-muted">Summary of courses that you have taken</h3>
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
                        <h4>Core Courses</h4>
                        <p class="text-muted">Computer science: Data Science Track</p>
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
                        <h4>Elective Courses</h4>
                        <p class="text-muted">Computer science: Data Science Track</p>
                    </div>
                </div>
         <!--       <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/treehouse.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Core Courses to be Completed</h4>
                        <p class="text-muted">Computer science: Data Science Track</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/golden.png" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Elective Courses to be Completed</h4>
                        <p class="text-muted">Computer science: Data Science Track</p>
                    </div>
                </div> -->
                
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-heading">Master’s Acknowledgment of Policies Form</h2><br><br><br>
					<i> ** All students must read, complete, sign and date this form upon entrance to the Graduate CS Department** </i>	<br><br>
				
				Name(Last, First):__________________________<br><br>
					UTD ID Number:______________________________<br><br>
					First Semester in graduate program:______________________________<br><br>
					Degree plan(check one):
					<form>
					<input type="checkbox" name="p1">&nbsp Traditional CS <br>
					<input type="checkbox" name="p2">&nbsp Intelligent Systems <br>
					<input type="checkbox" name="p3">&nbsp Software Engineering <br>
					<input type="checkbox" name="p4">&nbsp Data Science <br>
					<input type="checkbox" name="p5">&nbsp Networks & Telecommunications <br>
					<input type="checkbox" name="p6">&nbsp SYSTEMS <br>
					<input type="checkbox" name="p7">&nbsp Information Assurance <br>
					<input type="checkbox" name="p8">&nbsp Interactive Computing <br><br>
	
					</form>
					Prerequisited I was assigned in my admission letter/email(check all that apply):
					<form>
					<input type="checkbox" name="pr1">&nbsp CS 5303 Computer Science I <br>
					<input type="checkbox" name="pr2">&nbsp CS 5330 Computer Science II <br>
					<input type="checkbox" name="pr3">&nbsp CS 5333 Discrete Structures <br>
					<input type="checkbox" name="pr4">&nbsp CS 5343 Data Structures <br>
					<input type="checkbox" name="pr5">&nbsp CS 5348 Operating Systems <br>
					<input type="checkbox" name="pr6">&nbsp CS 5349 Automata Theory <br>
					<input type="checkbox" name="pr7">&nbsp CS 5354 Software Engineering <br>
					<input type="checkbox" name="pr8">&nbsp CS 5390 Computer Networks <br>
					<input type="checkbox" name="pr7">&nbsp CS 3341 Probability & Statistics <br><br>
					
					</form>
By checking each item below, I indicate that I understand the following policies of The University of Texas at Dallas and the Graduate Computer Science Department: <br><br>
<form>
<input type="checkbox" name="p1" required data-validation-required-message="Please accept this condition"> I must take all my assigned prerequisites unless it has been officially waived by the department or is   not a requirement of my track/degree plan. <br>
<input type="checkbox" name="p2" required data-validation-required-message="Please accept this condition"> I must meet with a Faculty Academic Advisor at least once a year to be advised. <br>
<input type="checkbox" name="p3" required data-validation-required-message="Please accept this condition"> I know that I will not be allowed to enroll in a closed course. No exceptions. No waitlists. <br>  
<input type="checkbox" name="p4" required data-validation-required-message="Please accept this condition"> There is a 6-year window to complete all coursework. <br>
<input type="checkbox" name="p5" required data-validation-required-message="Please accept this condition"> GPA is calculated on the + and – scale (A, A-, B+, B, B-, C+, C). <br>
<input type="checkbox" name="p6" required data-validation-required-message="Please accept this condition"> I must have a core GPA ≥ 3.19, an elective GPA ≥ 3.0, and an overall GPA ≥ 3.0 to graduate. <br>
<input type="checkbox" name="p7" required data-validation-required-message="Please accept this condition"> I may only repeat a course two times; I can only have a total of three repeats across all courses. <br>
<input type="checkbox" name="p8" required data-validation-required-message="Please accept this condition"> I must make up any incomplete (I) grades by the deadline or it will turn into an F on my transcript. <br>
<input type="checkbox" name="p9" required data-validation-required-message="Please accept this condition"> I know I must complete additional paperwork to change my major/program from CS to SE or from  SE to CS at least two semesters prior to graduation. <br>
<input type="checkbox" name="p0" required data-validation-required-message="Please accept this condition"> I know that if I miss three or more lectures in the beginning of any semester, I may be dropped or   reassigned to another course in that semester. <br><br><br><br><br><br><br>


<p align="left">_________________________<br>Student signature and Date</p> <p align="right">____________________________________<br>Graduate Advisors signature and Date</p>


<input type="submit" name="ack" value="Submit">
			
					
					
	</form>				
					</div>
            </div>
           

                </div>
      
    </section>

    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-heading">CS degree plan of your track</h2> <br><br>
					<h3>Core courses &nbsp &nbsp (15 credit hours) &nbsp &nbsp 3.19 GPA required </h3>
					<table class="table">
								<thead>
								  <tr>
									<th>Course Number</th>
									<th>Course Name</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<td>CS 6313</td>
									<td>Statistical Methods for Data Sciences</td>
								  </tr>
								  <tr>
									<td>CS 6350</td>
									<td>Big Data Management and Analytics</td>
								  </tr>
								  <tr>
									<td>CS 6363</td>
									<td>Design and Analysis of Computer Algorithms</td>
								  </tr>
								  <tr>
									<td>CS 6375</td>
									<td>Machine Learning</td>
								  </tr>
								</tbody>
							  </table>
							  
							  <h4>Any one of the following  5 Core courses</h4>
					<table class="table">
								<thead>
								  <tr>
									<th>Course Number</th>
									<th>Course Name</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<td>CS 6301</td>
									<td>Social Network Analytics</td>
								  </tr>
								  <tr>
									<td>CS 6347</td>
									<td>Statistics for Machine Learning</td>
								  </tr>
								  <tr>
									<td>CS 6327</td>
									<td>Video Analytics</td>
								  </tr>
								  <tr>
									<td>CS 6320</td>
									<td>Natural Language Processing</td>
								  </tr>
								   <tr>
									<td>CS 6360</td>
									<td>Database Design</td>
								  </tr>
								</tbody>
							  </table>
							  
							  <h3>5 Aproved 6000 Level Electives &nbsp &nbsp (15 credit hours) &nbsp &nbsp 3.0 GPA required </h3>

							  <table class="table">
								<thead>
								  <tr>
									<th>Course Number</th>
									<th>Course Name</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<td>1</td>
									<td></td>
								  </tr>
								  <tr>
									<td>2</td>
									<td></td>
								  </tr>
								  <tr>
									<td>3</td>
									<td></td>
								  </tr>
								  <tr>
									<td>4</td>
									<td></td>
								  </tr>
								  <tr>
									<td>5</td>
									<td></td>
								  </tr>
								</tbody>
							  </table>
							  
							    
							  <h4>Additional Electives &nbsp &nbsp (3 credit hours minimum)</h4>

							  <table class="table">
								<thead>
								  <tr>
									<th>Course Number</th>
									<th>Course Name</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<td>1</td>
									<td></td>
								  </tr>
								  <tr>
									<td>2</td>
									<td></td>
								  </tr>
								  <tr>
									<td>3</td>
									<td></td>
								  </tr>
								</tbody>
							  </table>
							  
							   <h3>Other requirements</h3>

							  <table class="table">
								<thead>
								  <tr>
									<th></th>
									<th></th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<td></td>
									<td></td>
								  </tr>
								  <tr>
									<td></td>
									<td></td>
								  </tr>
								</tbody>
							   </table>
							  
							  <h3>Prerequisites</h3>
					<table class="table">
								<thead>
								  <tr>
									<th>Course Number</th>
									<th>Course Name</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<td>CS 5303</td>
									<td>Computer Science I</td>
								  </tr>
								  <tr>
									<td>CS 5330</td>
									<td>Computer Science II</td>
								  </tr>
								  <tr>
									<td>CS 5333</td>
									<td>Discrete Structures</td>
								  </tr>
								  <tr>
									<td>CS 5343</td>
									<td>Algorithm Analysis & Data Structures</td>
								  </tr>
								   <tr>
									<td>CS 5348</td>
									<td>Operating Systems Concepts</td>
								  </tr>
								   <tr>
									<td>CS 3341</td>
									<td>Probability & Statistics in CS</td>
								  </tr>
								</tbody>
							  </table>
							  
							  
                   
                    </div>
                </div>
            </div>
            
       
    </section>
	
	  <section id="vcourses" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-heading">Available Courses</h2> <br><br>
					<h3>Core Courses</h3>
								<?php
									$servername = "localhost";
									$username = "root";
									$password = "";
									$dbname = "project";

									// Create connection
									$conn = new mysqli($servername, $username, $password, $dbname);
									// Check connection
									if ($conn->connect_error) {
										 die("Connection failed: " . $conn->connect_error);
									} 

									$sql = "SELECT cname, cnum, cpref, cdes, prereq, credits FROM course";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
										 echo "<table class=\"table\">
								<thead>
								  <tr>
									<th>Course Prefix </th>
									<th>Course Number </th>
									<th>Course Name</th>
									<th>Description</th>
									<th>Prerequisite </th>
									<th>Credit Hours</th>
								  </tr>
								</thead>";
										 // output data of each row
										 while($row = $result->fetch_assoc()) {
											 
											$bname = $row["cnum"];
											//echo  "<script type='text/javascript'> alert('$bname $current_file');</script>";
											 echo "<tbody><tr><td>" . $row["cpref"]. "</td><td>" . $row["cnum"]. "</td><td>" . $row["cname"]. "</td><td>" . $row["cdes"]. "</td><td>" . $row["prereq"]. "</td><td>" . $row["credits"]. "</td><td> <form action=\"". $current_file. "\" method=\"POST\">
											<input type=\"checkbox\" name=\"core_courses[]\" value=\"".$row["cnum"]."\" ></td></tr></tbody>";
									//		onClick='addCourse(this.name)' id=\"button\"
										 }
										 echo "</table>";
										 echo "
													<input class = \"buttons\" type = \"submit\" name = \"add_core\" value = \"Add\"/>
										
													</form><br><br>";

									} else {
										 echo "0 results";
									}

									$conn->close();
									?>
					
							  <br>
							  
							  <h3>Elective Courses</h3>
							  <?php
									$servername = "localhost";
									$username = "root";
									$password = "";
									$dbname = "project";

									// Create connection
									$conn = new mysqli($servername, $username, $password, $dbname);
									// Check connection
									if ($conn->connect_error) {
										 die("Connection failed: " . $conn->connect_error);
									} 

									$sql = "SELECT ecname, ecnum, ecpref, ecdes, eprereq, ecredit FROM ecourse";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
										 echo "<table class=\"table\">
								<thead>
								  <tr>
									<th>Course Prefix </th>
									<th>Course Number </th>
									<th>Course Name</th>
									<th>Description</th>
									<th>Prerequisite </th>
									<th>Credit Hours</th>
								  </tr>
								</thead>";
										 // output data of each row
										 while($row = $result->fetch_assoc()) {
											 
											//$bname = $row["cnum"];
											//echo  "<script type='text/javascript'> alert('$bname $current_file');</script>";
											 echo "<tbody><tr><td>" . $row["ecpref"]. "</td><td>" . $row["ecnum"]. "</td><td>" . $row["ecname"]. "</td><td>" . $row["ecdes"]. "</td><td>" . $row["eprereq"]. "</td><td>" . $row["ecredit"]. "</td><td> <form action=\"". $current_file. "\" method=\"POST\">
											<input type=\"checkbox\" name=\"elective_courses[]\" value=\"".$row["ecnum"]."\" ></td></tr></tbody>";
									//		onClick='addCourse(this.name)' id=\"button\"
										 }
										 echo "</table>";
										 echo "
													<input type = \"submit\" name = \"add_elective\" value = \"Add\"/>
										
													</form><br><br>";

									} else {
										 echo "0 results";
									}

									$conn->close();
									?>
					
							  
							 
							  
							  </div>
							  </div>
							  </div>
							  </section>


    
    <!-- Contact Section -->
 <section id="contact" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-heading">Available Timeslots</h2> <br><br>
					
					
								<?php
									$servername = "localhost";
									$username = "root";
									$password = "";
									$dbname = "project";

									// Create connection
									$conn = new mysqli($servername, $username, $password, $dbname);
									// Check connection
									if ($conn->connect_error) {
										 die("Connection failed: " . $conn->connect_error);
									} 
									
									$sql = "select timeslots from regtslot where username = '".$_SESSION['user_id']."'";
									$result = $conn->query($sql);

								
									if ($result->num_rows > 0) {
										
										$field1 = 'advisor';
										$field2 = 'timeslots';
										
										$adv = gettimefield($field1);
										$tme = gettimefield($field2);
										
										echo "<h2 class=\"section-heading\">You already have an appointment at $tme with $adv</h2> <br><br>";
										
									}
									else {
										
										echo"<h3 class=\"section-heading\">Advisor-1</h3>";
									
									$sql = "SELECT timeslots FROM advapt where id='advisor1'";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
										 echo "<table class=\"section-heading\">
								<thead>
								  <tr>
									<th>Timeslot </th><br>
								  </tr>
								</thead>";
										 // output data of each row
										 while($row = $result->fetch_assoc()) {
											 
											
											//echo  "<script type='text/javascript'> alert('$bname $current_file');</script>";
											 echo "<tbody><tr><td>" . $row['timeslots']. "</td><td><form action=\"". $current_file. "\" method=\"POST\">
											<input type=\"radio\" name=\"timeslot\" value=\"".$row['timeslots']."\" ></td></tr></tbody>";
									//		onClick='addCourse(this.name)' id=\"button\"
										 }
										 echo "</table>";
										 echo " <br><br>
													<input class = \"buttons\" type = \"submit\" name = \"add_adv1\" value = \"Schedule an appointment\"/>
										
													</form><br><br>";

									} else {
										 echo "0 results";
									}
									

									$conn->close();
									?>
					
							  <br>
							  
							  <h3 class="section-heading">Advisor-2</h3>
								<?php
									$servername = "localhost";
									$username = "root";
									$password = "";
									$dbname = "project";

									// Create connection
									$conn = new mysqli($servername, $username, $password, $dbname);
									// Check connection
									if ($conn->connect_error) {
										 die("Connection failed: " . $conn->connect_error);
									} 

									$sql = "SELECT timeslots FROM advapt where id='advisor2'";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
										 echo "<table class=\"section-heading\">
								<thead>
								  <tr>
									<th>Timeslot </th><br>
								  </tr>
								</thead>";
										 // output data of each row
										 while($row = $result->fetch_assoc()) {
											 
											
											//echo  "<script type='text/javascript'> alert('$bname $current_file');</script>";
											 echo "<tbody><tr><td>" . $row['timeslots']. "</td><td><form action=\"". $current_file. "\" method=\"POST\">
											<input type=\"radio\" name=\"timeslot1\" value=\"".$row['timeslots']."\" ></td></tr></tbody>";
									//		onClick='addCourse(this.name)' id=\"button\"
										 }
										 echo "</table>";
										 echo " <br><br>
													<input class = \"buttons\" type = \"submit\" name = \"add_adv2\" value = \"Schedule an appointment\"/>
										
													</form><br><br>";

									} else {
										 echo "0 results";
									}

									$conn->close();
									}
									?>
							  
						
					
							  
							 
							  
							  </div>
							  </div>
							  </div>
							  </section>

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
                            <h2>Core Courses</h2>
							
							<?php
									$servername = "localhost";
									$username = "root";
									$password = "";
									$dbname = "project";

									// Create connection
									$conn = new mysqli($servername, $username, $password, $dbname);
									// Check connection
									if ($conn->connect_error) {
										 die("Connection failed: " . $conn->connect_error);
									} 

									$sql = "SELECT c.cname, c.cnum, c.cpref FROM course c, registerdcourses r where c.cnum=r.cnum AND r.uid='".$_SESSION['user_id']."'";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
										 echo "<table class=\"table\">
								<thead>
								  <tr>
									<th>Course Prefix</th>
									<th>Course Number </th>
									<th>Course Name</th>
								  </tr>
								</thead>";
										 // output data of each row
										 while($row = $result->fetch_assoc()) {
											 
										//	$bname = $row["cnum"];
											//echo  "<script type='text/javascript'> alert('$bname $current_file');</script>";
											 echo "<tbody><tr><td>" . $row["cpref"]. "</td><td>" . $row["cnum"]. "</td><td>" . $row["cname"]. "</td><td> <form action=\"". $current_file. "\" method=\"POST\">
											<input type=\"checkbox\" name=\"core_courses1[]\" value=\"".$row["cnum"]."\" ></td></tr></tbody>";
									//		onClick='addCourse(this.name)' id=\"button\"
										 }
										 echo "</table>";
										 echo "
													<input class = \"buttons\" type = \"submit\" name = \"drop_core\" value = \"Drop\"/>
										
													</form><br><br>";

									} else {
										 echo "0 results";
									}

									$conn->close();
									?>
                                      
							 


					<!--		 <table class="table">
								<thead>
								  <tr>
									<th>Term</th>
									<th>Course Name</th>
									<th>GPA</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<td>Spring 2015</td>
									<td>CS 6313 Statistical Methods for Data Sciences</td>
									<td>3.33</td>
								  </tr>
								  <tr>
									<td>Spring 2016</td>
									<td>CS 6350 Big Data Management and Analytics</td>
									<td>3.33</td>
								  </tr>
								  <tr>
									<td>Spring 2016</td>
									<td>CS 6363 Design and Analysis of Computer Algorithms</td>
									<td>3.0</td>
								  </tr>
								  <tr>
									<td>Spring 2015</td>
									<td>CS 6360 Database Design</td>
									<td>3.67</td>
								  </tr>
								</tbody>
							  </table> -->
							  
							  
							  
							  
							  
							  
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
                            <h2>Elective Courses</h2>
							
							<?php
									$servername = "localhost";
									$username = "root";
									$password = "";
									$dbname = "project";

									// Create connection
									$conn = new mysqli($servername, $username, $password, $dbname);
									// Check connection
									if ($conn->connect_error) {
										 die("Connection failed: " . $conn->connect_error);
									} 

									$sql = "SELECT e.ecname, e.ecnum, e.ecpref FROM ecourse e, registeredecourses r where e.ecnum=r.ecnum AND r.uid='".$_SESSION['user_id']."'";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
										 echo "<table class=\"table\">
								<thead>
								  <tr>
									<th>Course Prefix</th>
									<th>Course Number </th>
									<th>Course Name</th>
								  </tr>
								</thead>";
										 // output data of each row
										 while($row = $result->fetch_assoc()) {
											 
										//	$bname = $row["cnum"];
											//echo  "<script type='text/javascript'> alert('$bname $current_file');</script>";
											 echo "<tbody><tr><td>" . $row["ecpref"]. "</td><td>" . $row["ecnum"]. "</td><td>" . $row["ecname"]. "</td><td> <form action=\"". $current_file. "\" method=\"POST\">
											<input type=\"checkbox\" name=\"elective_courses1[]\" value=\"".$row["ecnum"]."\" ></td></tr></tbody>";
									//		onClick='addCourse(this.name)' id=\"button\"
										 }
										 echo "</table>";
										 echo "
													<input class = \"buttons\" type = \"submit\" name = \"drop_elective\" value = \"Drop\"/>
										
													</form><br><br>";

									} else {
										 echo "0 results";
									}

									$conn->close();
									?>
                                      
							 
						<!--	 <table class="table">
								<thead>
								  <tr>
									<th>Term</th>
									<th>Course Name</th>
									<th>GPA</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<td>Spring 2016</td>
									<td>CS 6301 Special TPCS:Computer science- Software Analysis and Comprehension</td>
									<td>3.33</td>
								  </tr>
								  <tr>
									<td>Spring 2015</td>
									<td>CS 6314 Web Programming Language</td>
									<td>3.33</td>
								  </tr>
								  <tr>
									<td>Fall 2014</td>
									<td>CS 5333 Discrete Structures</td>
									<td>2.67</td>
								  </tr>
								  <tr>
									<td>Fall 2015</td>
									<td>CS 6301 Special TPCS:Computer science- Analyze and secure social media</td>
									<td>3.33</td>
								  </tr>
								  <tr>
									<td>Fall 2014</td>
									<td>CS 6390 Advanced Computer Networks</td>
									<td>3.0</td>
								  </tr>
								</tbody>
							  </table> -->
							  
							  
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
                            <h2>Core Courses</h2>
                           
							  <table class="table">
								<thead>
								  <tr>
									<th>Term</th>
									<th>Course Name</th>
									<th>Required GPA to graduate</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<td>Summer 2016</td>
									<td>CS 6375 Machine Learning</td>
									<td>2.67</td>
								  </tr>
								 
								</tbody>
							  </table>
							


                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Portfolio Modal 4 -->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
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
                            <h2>Elective Courses</h2>          
							  <table class="table">
								<thead>
								  <tr>
									<th>Term</th>
									<th>Course Name</th>
									<th>Required GPA to graduate</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<td>Summer 2016</td>
									<td>CS 6364 Artificial Intelligence</td>
									<td>2.33</td>
								  </tr>
								  
								  </tr>
								</tbody>
							  </table>
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

</body>

</html>
