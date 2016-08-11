<?php

require 'core.inc.php';
require 'connect.inc.php';

$field = 'id';
$name = getadvfield($field);



  
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
											 if(isset($_POST["add_adv1"])){
											//	 echo  "<script type='text/javascript'> alert('Records inserted succesfully..');</script>";
											//	 echo  "<script type='text/javascript'> alert('Hi $bname');</script>";
											get_course_from_checkboxes($_POST["timeslot"]) ;
											
												}
												 if(isset($_POST["capoint"])){
											//	 echo  "<script type='text/javascript'> alert('Records inserted succesfully..');</script>";
											//	 echo  "<script type='text/javascript'> alert('Hi $bname');</script>";
											get_apoint_from_checkboxes($_POST["appointment"]) ;
											
												}
												
												 if(isset($_POST["ceve"])){
											//	 echo  "<script type='text/javascript'> alert('Records inserted succesfully..');</script>";
											//	 echo  "<script type='text/javascript'> alert('Hi $bname');</script>";
											can_apoint_from_checkboxes($_POST["event"]) ;
											
												}
												
												
												function get_apoint_from_checkboxes($appointment){
													if(isset($appointment)){
													//Inserting data in user_classes table
													if(count($appointment) >0){
												//		echo "<table><caption>Core courses registered now </caption><tr> <th>Course Prefix </th> <th>Course Name </th> <th>Number of Credit Hours </th></tr>";

														foreach ($appointment as $key => $value) {
															
														//	echo $value;
															$servername = "localhost";
															$username = "root";
															$password = "";
															$dbname = "project";

															$conn = new mysqli($servername, $username, $password, $dbname);
															if ($conn->connect_error) {
																 die("Connection failed: " . $conn->connect_error);
															}
															
															
															
															$sql = "Delete from regtslot where advisor='".$_SESSION['user_id']."' and username='".$value."'";
															
															
															
															     if ($query_run1 = mysql_query($sql)) {
																			echo  "<script type='text/javascript'> alert('Appointments deleted succesfully..');</script>";
																		//	header('Location:admin.php');
																		}
																		 else {
																		 // echo  "<script type='text/javascript'> alert('You have already registered the course');</script>";
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
								
								
								function can_apoint_from_checkboxes($event){
													if(isset($event)){
													//Inserting data in user_classes table
													if(count($event) >0){
												//		echo "<table><caption>Core courses registered now </caption><tr> <th>Course Prefix </th> <th>Course Name </th> <th>Number of Credit Hours </th></tr>";

														foreach ($event as $key => $value) {
															
														//	echo $value;
															$servername = "localhost";
															$username = "root";
															$password = "";
															$dbname = "project";

															$conn = new mysqli($servername, $username, $password, $dbname);
															if ($conn->connect_error) {
																 die("Connection failed: " . $conn->connect_error);
															}
															
															
															$sql = "Delete from advapt where id='".$_SESSION['user_id']."' and timeslots='".$value."'";
															     if ($query_run1 = mysql_query($sql)) {
																			echo  "<script type='text/javascript'> alert('Appointments deleted succesfully..');</script>";
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
												
									
											
											
											function get_course_from_checkboxes($timeslot){
													if(isset($timeslot)){
													//Inserting data in user_classes table
													if(count($timeslot) >0){
												//		echo "<table><caption>Core courses registered now </caption><tr> <th>Course Prefix </th> <th>Course Name </th> <th>Number of Credit Hours </th></tr>";

														foreach ($timeslot as $key => $value) {
															
														//	echo $value;
															$servername = "localhost";
															$username = "root";
															$password = "";
															$dbname = "project";

															$conn = new mysqli($servername, $username, $password, $dbname);
															if ($conn->connect_error) {
																 die("Connection failed: " . $conn->connect_error);
															}
															
															
															$sql = "Insert into advapt values('".$_SESSION['user_id']."','".$value."')";
															     if ($query_run1 = mysql_query($sql)) {
																			echo  "<script type='text/javascript'> alert('Timeslots added succesfully..');</script>";
																		//	header('Location:admin.php');
																		}
																		 else {
																		  echo  "<script type='text/javascript'> alert('You have already added timeslot');</script>";
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
                <a class="navbar-brand page-scroll" href="#page-top">UTDallas Advisor Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Appointment Summary</a>
                    </li>
                   <li>
                        <a class="page-scroll" href="#portfolio">Time slot availability</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">Advising Event</a>
                    </li> 
                  
                    <li>
                        <a class="page-scroll" href="logout_ad.php">Logout</a>
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
                    <h3 class="section-heading">Appointment Summary</h3>
					
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

									$sql = "SELECT username, timeslots FROM regtslot where advisor='".$_SESSION['user_id']."'";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
										 echo "<table class=\"table\">
								<thead>
								  <tr>
									<th>Student Name </th>
									<th>Time Slot </th>
								</thead>";
										 // output data of each row
										 while($row = $result->fetch_assoc()) {
											 
											
											//echo  "<script type='text/javascript'> alert('$bname $current_file');</script>";
											 echo "<tbody><tr><td>" . $row['username']. "</td><td>" . $row['timeslots']. "</td><td> <form action=\"". $current_file. "\" method=\"POST\">
											<input type=\"checkbox\" name=\"appointment[]\" value=\"".$row['username']."\" ></td></tr></tbody>";
											
											
										 }
										 echo "</table>";
										 echo "
													<input class = \"buttons\" type = \"submit\" name = \"capoint\" value = \"Cancel an Appointment\"/>
										
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
	
	 <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Available time slots</h2><br><br>
					
                    <h2 class="section-heading"><?php echo $name?></h2>
					</div>
					<div class="col-lg-12">
					<form action="advisor.php" method="POST">
					<input type="checkbox" name="timeslot[]" value="9 am to 10 am">&nbsp 9 am to 10 am <br>
					<input type="checkbox" name="timeslot[]" value="10 am to 11 am">&nbsp 10 am to 11 am <br>
					<input type="checkbox" name="timeslot[]" value="11 am to 12 pm">&nbsp 11 am to 12 pm <br>
					<input type="checkbox" name="timeslot[]" value="12 pm to 1 pm">&nbsp 12 pm to 1 pm <br>
					<input type="checkbox" name="timeslot[]" value="2 pm to 3 pm">&nbsp 2 pm to 3 pm<br>
					<input type="checkbox" name="timeslot[]" value="3 pm to 4 pm">&nbsp 3 pm to 4 pm <br>
					<input type="checkbox" name="timeslot[]" value="4 pm to 5 pm">&nbsp 4 pm to 5 pm <br>
					<input type="checkbox" name="timeslot[]" value="5 pm to 6 pm">&nbsp 5 pm to 6 pm <br><br><br>
					<input class="btn btn-xl" type = "submit" name = "add_adv1" value = "Schedule Appointment" /><br><br>
					</form>
					
					
					
					
					
					
					
					
					
					
					
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
	
	    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="section-heading">Advising event</h3>
					
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

									$sql = "SELECT timeslots FROM advapt where id='".$_SESSION['user_id']."'";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
										 echo "<table class=\"table\">
								<thead>
								  <tr>
									
									<th>Time Slot </th>
								</thead>";
										 // output data of each row
										 while($row = $result->fetch_assoc()) {
											 
											
											//echo  "<script type='text/javascript'> alert('$bname $current_file');</script>";
											 echo "<tbody><tr><td>" . $row['timeslots']. "</td><td> <form action=\"". $current_file. "\" method=\"POST\">
											<input type=\"checkbox\" name=\"event[]\" value=\"".$row['timeslots']."\" ></td></tr></tbody>";
											
											
										 }
										 echo "</table>";
										 echo "
													<input class = \"buttons\" type = \"submit\" name = \"ceve\" value = \"Cancel an Event\"/>
										
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
