<?php
if (!empty($_POST)){
	$english = $_POST['english'];
	$kiswahili = $_POST['kiswahili'];
	$mathematics = $_POST['mathematics'];
	$biology = $_POST['biology'];
	$chemistry = $_POST['chemistry'];
	$physics = $_POST['physics'];
	$creire = $_POST['creire'];
	$geohis = $_POST['geohis'];
	$elective = $_POST['elective'];
	}

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'betteruni';

$db = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

//update ENGLISH on new submission of grades//
if (!$db) {
	die("Connection failed: " . mysqli_connect_error());
}
$sql1 = "UPDATE moo_kriteria SET bobot='$_POST[english]' WHERE id_criteria=1";
if (mysqli_query($db, $sql1)) {
  } else {
}

//update KISWAHILI on new submission of grades//
if (!$db) {
	die("Connection failed: " . mysqli_connect_error());
} 
$sql2 = "UPDATE moo_kriteria SET bobot='$_POST[kiswahili]' WHERE id_criteria=2";
if (mysqli_query($db, $sql2)) {
  } else {
}

//update MATHEMATICS on new submission of grades//
if (!$db) {
	die("Connection failed: " . mysqli_connect_error());
} 
$sql3 = "UPDATE moo_kriteria SET bobot='$_POST[mathematics]' WHERE id_criteria=3";
if (mysqli_query($db, $sql3)) {
  } else {
}

//update BIOLOGY on new submission of grades//
if (!$db) {
	die("Connection failed: " . mysqli_connect_error());
} 
$sql4 = "UPDATE moo_kriteria SET bobot='$_POST[biology]' WHERE id_criteria=4";
if (mysqli_query($db, $sql4)) {
  } else {
}

//update PHYSICS on new submission of grades//
if (!$db) {
	die("Connection failed: " . mysqli_connect_error());
} 
$sql5 = "UPDATE moo_kriteria SET bobot='$_POST[physics]' WHERE id_criteria=5";
if (mysqli_query($db, $sql5)) {
  } else {
}

//update CHEMISTRY on new submission of grades//
if (!$db) {
	die("Connection failed: " . mysqli_connect_error());
} 
$sql6 = "UPDATE moo_kriteria SET bobot='$_POST[biology]' WHERE id_criteria=6";
if (mysqli_query($db, $sql6)) {
  } else {
}

//update CRE/IRE on new submission of grades//
if (!$db) {
	die("Connection failed: " . mysqli_connect_error());
} 
$sql7 = "UPDATE moo_kriteria SET bobot='$_POST[creire]' WHERE id_criteria=7";
if (mysqli_query($db, $sql7)) {
  } else {
}

//update Geography/History on new submission of grades//
if (!$db) {
	die("Connection failed: " . mysqli_connect_error());
} 
$sql8 = "UPDATE moo_kriteria SET bobot='$_POST[geohis]' WHERE id_criteria=8";
if (mysqli_query($db, $sql8)) {
  } else {
}

//update ELECTIVE on new submission of grades//
if (!$db) {
	die("Connection failed: " . mysqli_connect_error());
} 
$sql9 = "UPDATE moo_kriteria SET bobot='$_POST[elective]' WHERE id_criteria=9";
if (mysqli_query($db, $sql9)) {
  } else {
}

mysqli_close($db);

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	
		
	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="../error-404.html" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>BetterUni: Student Portal </title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	
	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/assets.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/calendar/fullcalendar.css">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">
	<link rel="stylesheet" type="text/css" href="assets/css/assets.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/calendar/fullcalendar.css">
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	
	
	
</head>
<body class="ttr-opened-sidebar ttr-pinned-sidebar">
	
	<!-- header start -->
	<header class="ttr-header">
		<div class="ttr-header-wrapper">
			<!--sidebar menu toggler start -->
			<div class="ttr-toggle-sidebar ttr-material-button">
				<i class="ti-menu ttr-close-icon"></i>
				<i class="ti-close ttr-open-icon"></i>
			</div>
			<!--sidebar menu toggler end -->
			
			<div class="ttr-header-menu">
				<!-- header left menu start -->
				<ul class="ttr-header-navigation">
					<li>
						<a href="dashboard.html" class="ttr-material-button ttr-submenu-toggle">HOME</a>
					</li>
				</ul>
				<!-- header left menu end -->
			</div>
			<div class="ttr-header-right ttr-with-seperator">
				<!-- header right menu start -->
				<ul class="ttr-header-navigation">
					<li>
						<a href="#" class="ttr-material-button ttr-search-toggle"><i class="fa fa-search"></i></a>
					</li>
					
					<li>
						<a href="#" class="ttr-material-button ttr-submenu-toggle"><i class="fa fa-user" aria-hidden="true"></i></a>
						<div class="ttr-header-submenu">
							<ul>
								<li><a href="user-profile.php">My profile</a></li>
								<li><a href="basket.php">Applied Courses</a></li>
								<li><a href="mailbox.html">Messages</a></li>
								<li><a href="login.html">Logout</a></li>
							</ul>
						</div>
					</li>
					
				</ul>
				<!-- header right menu end -->
			</div>
			<!--header search panel start -->
			<div class="ttr-search-bar">
				<form class="ttr-search-form">
					<div class="ttr-search-input-wrapper">
						<input type="text" name="qq" placeholder="search something..." class="ttr-search-input">
						<button type="submit" name="search" class="ttr-search-submit"><i class="ti-arrow-right"></i></button>
					</div>
					<span class="ttr-search-close ttr-search-toggle">
						<i class="ti-close"></i>
					</span>
				</form>
			</div>
			<!--header search panel end -->
		</div>
	</header>
	<!-- header end -->
	<!-- Left sidebar menu start -->
	<div class="ttr-sidebar">
		<div class="ttr-sidebar-wrapper content-scroll">
			<!-- sidebar menu start -->
			<nav class="ttr-sidebar-navi">
				<ul>
					<li>
						<a href="dashboard.html" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-home"></i></span>
		                	<span class="ttr-label">Dashboard</span>
		                </a>
		            </li>
					
					<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-book"></i></span>
		                	<span class="ttr-label">Programmes</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<a href="courses.php" class="ttr-material-button"><span class="ttr-label">Degree</span></a>
		                	</li>
		                	<li>
		                		<a href="diploma.html" class="ttr-material-button"><span class="ttr-label">Diploma</span></a>
		                	</li>
							<li>
		                		<a href="certificate.html" class="ttr-material-button"><span class="ttr-label">Certificate</span></a>
		                	</li>
		                </ul>
		            </li>

					<li>
						<a href="application.php" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-home"></i></span>
		                	<span class="ttr-label">Application/Revision</span>
		                </a>
		            </li>


					<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-email"></i></span>
		                	<span class="ttr-label">Mailbox</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<a href="mailbox.html" class="ttr-material-button"><span class="ttr-label">Mail Box</span></a>
		                	</li>
		                	<li>
		                		<a href="mailbox-compose.html" class="ttr-material-button"><span class="ttr-label">Compose</span></a>
		                	</li>
							<li>
		                		<a href="mailbox-read.html" class="ttr-material-button"><span class="ttr-label">Mail Read</span></a>
		                	</li>
		                </ul>
		            </li>

					
				</ul>
				<!-- sidebar menu end -->
			</nav>
			<!-- sidebar menu end -->
		</div>
	</div>
	<!-- Left sidebar menu end -->

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Dashboard</h4>
				<ul class="db-breadcrumb-list">
					<li><a href="#"><i class="fa fa-home"></i>Home</a></li>
					<li>Revision/Application</li>
				</ul>
			</div>	
			<!-- Card -->
			<div class="row">
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg1">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Degree Programmes
							</h4>
							<span class="wc-des">
								
							</span>
							<span class="wc-stats">
								<span class="counter">90</span>
							</span>		
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="wc-progress-bx">
								<span class="wc-change">
									
								</span>
								<span class="wc-number ml-auto">
									
								</span>
							</span>
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg2">					 
						<div class="wc-item">
							<h4 class="wc-title">
								 Diploma Programmes
							</h4>
							<span class="wc-des">
								
							</span>
							<span class="wc-stats counter">
								20
							</span>		
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="wc-progress-bx">
								<span class="wc-change">
									
								</span>
								<span class="wc-number ml-auto">
								
								</span>
							</span>
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg3">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Certificate Programmes
							</h4>
							<span class="wc-des">
								
							</span>
							<span class="wc-stats counter">
								70
							</span>		
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="wc-progress-bx">
								<span class="wc-change">
									
								</span>
								<span class="wc-number ml-auto">
									
								</span>
							</span>
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-3 col-xl-3 col-sm-6 col-12">
					<div class="widget-card widget-bg4">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Universities & Colleges
							</h4>
							<span class="wc-stats counter">
								80
							</span>		
							<div class="progress wc-progress">
								<div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<span class="wc-progress-bx">
								<span class="wc-change">
									
								</span>
								<span class="wc-number ml-auto">
									
								</span>
							</span>
						</div>				      
					</div>
				</div>
			</div>
			<!-- Card END -->
			<div class="row">
				<span class="login100-form-title">
					Below are your subject scores<br>
					
				</span>
				<!--form start here-->
				
				<form class="login100-form validate-form"  method="post" action="optimize.php">
				<table border="2">	
					<?php

						if (!empty($_POST)){
							$english = $_POST['english'];
							$kiswahili = $_POST['kiswahili'];
							$mathematics = $_POST['mathematics'];
							$biology = $_POST['biology'];
							$chemistry = $_POST['chemistry'];
							$physics = $_POST['physics'];
							$creire = $_POST['creire'];
							$geohis = $_POST['geohis'];
							$elective = $_POST['elective'];
						}

						
						echo "<tr>"."<th><em>Subject Name</em></th>". "<th><em><b>Subject Score</b></em></th>" ."</tr>";
						echo "<tr>"."<th><em>English</em></th>". "<th>$english</th>" ."</tr>";
						echo "<tr>"."<th><em>Kiswahili</em></th>". "<th>$kiswahili</th>" ."</tr>"; 
						echo "<tr>"."<th><em>Mathematics</em></th>". "<th>$mathematics</th>" ."</tr>";
						echo "<tr>"."<th><em>Biology</em></th>". "<th>$biology</th>" ."</tr>";
						echo "<tr>"."<th><em>Chemistry</em></th>". "<th>$chemistry</th>" ."</tr>";
						echo "<tr>"."<th><em>Physics</em></th>". "<th>$physics</th>" ."</tr>";
						echo "<tr>"."<th><em>CRE/IRE</em></th>". "<th>$creire</th>" ."</tr>";
						echo "<tr>"."<th><em>GEO/HIS</em></th>". "<th>$geohis</th>" ."</tr>";
						echo "<tr>"."<th><em>Elective</em></th>". "<th>$elective</th>" ."</tr>";


					?>	
				</table>
				</form>
				<?php include_once 'optimize.php';?>
			</div>
		</div>		
	</main>
	<div class="ttr-overlay"></div>
	

<!-- External JavaScripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
	<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
	<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
	<script src="assets/vendors/counter/waypoints-min.js"></script>
	<script src="assets/vendors/counter/counterup.min.js"></script>
	<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
	<script src="assets/vendors/masonry/masonry.js"></script>
	<script src="assets/vendors/masonry/filter.js"></script>
	<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
	<script src='assets/vendors/scroll/scrollbar.min.js'></script>
	<script src="assets/js/functions.js"></script>
	<script src="assets/vendors/chart/chart.min.js"></script>
	<script src="assets/js/admin.js"></script>
	<script src='assets/vendors/calendar/moment.min.js'></script>
	<script src='assets/vendors/calendar/fullcalendar.js'></script>
	<script src='assets/vendors/switcher/switcher.js'></script>
	<script>
		$(document).ready(function() {

			$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listWeek'
			},
			defaultDate: '2019-03-12',
			navLinks: true, // can click day/week names to navigate views

			weekNumbers: true,
			weekNumbersWithinDays: true,
			weekNumberCalculation: 'ISO',

			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
				{
				title: 'All Day Event',
				start: '2019-03-01'
				},
				{
				title: 'Long Event',
				start: '2019-03-07',
				end: '2019-03-10'
				},
				{
				id: 999,
				title: 'Repeating Event',
				start: '2019-03-09T16:00:00'
				},
				{
				id: 999,
				title: 'Repeating Event',
				start: '2019-03-16T16:00:00'
				},
				{
				title: 'Conference',
				start: '2019-03-11',
				end: '2019-03-13'
				},
				{
				title: 'Meeting',
				start: '2019-03-12T10:30:00',
				end: '2019-03-12T12:30:00'
				},
				{
				title: 'Lunch',
				start: '2019-03-12T12:00:00'
				},
				{
				title: 'Meeting',
				start: '2019-03-12T14:30:00'
				},
				{
				title: 'Happy Hour',
				start: '2019-03-12T17:30:00'
				},
				{
				title: 'Dinner',
				start: '2019-03-12T20:00:00'
				},
				{
				title: 'Birthday Party',
				start: '2019-03-13T07:00:00'
				},
				{
				title: 'Click for Google',
				url: 'http://google.com/',
				start: '2019-03-28'
				}
			]
			});
		});

	</script>
</body>

</html>