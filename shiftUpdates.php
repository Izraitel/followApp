<?php //create a mySQL DB connection:
	$dbhost = "192.168.210.100";
	$dbuser = "michaliz";
	$dbpass = "H,XlS!w9RaSy";
	$dbname = "michaliz_followApp";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	//testing connection success
	if (mysqli_connect_errno()) {
		die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
	}
?>
<?php
	mysqli_set_charset($connection ,"utf8");
	$user_time = $_POST['usr_time'];
    $behave_output_name = $_POST['behaveOutputName'];
    $ext_event= $_POST['extEvent'];
    $extr_event = $_POST['extrEvent'];
    $med_treatment = $_POST['medTreatment'];
	$reaction = $_POST['reaction'];
	$react1 = $_POST['react'];
	
	$sql_query="INSERT INTO end_of_shift_reports (usr_time, behaveOutputName, extEvent, extrEvent, medTreatment, reaction, react)
	
	values ('$user_time','$behave_output_name','$ext_event','$extr_event','$med_treatment', '$reaction', '$react1')";

	$result = mysqli_query($connection, $sql_query);
	if(!$result) {
 		die("DB query failed.");
 	}	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>		
		<meta charset="UTF-8">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
  		<link rel="stylesheet" href="includes/style/style.css">	
		<title>FollowApp</title>
	</head>
	<body id="shiftUpdates">
		<div id="container">
			<header>
				<nav class="navbar navbar-inverse">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
								<div class="hello">היי, יובל</div>
							</button>
      						<a class="navbar-brand" href="index.html"></a>
    					</div>
    					<div class="collapse navbar-collapse" id="myNavbar">
						    <ul class="nav navbar-nav navbar-right">
						        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> צא</a></li>
						    </ul>
					    </div>
  					</div>
				</nav>
			</header>
			<main>
	  			<h1 class="headLine">Fitness Information</h1>
	  			<section class="bigBox2">
	  				<?php  //get data from DB
				 		$query = "SELECT max(id) FROM end_of_shift_reports";
				 		$result = mysqli_query($connection, $query);
				 		if(!$result) {
							 die("DB query failed.");
						 }
						echo $react1;
				 	?>
				 	<section class="bigBox">
				 		<h4>Workout Days:</h4>
				 		<?php
					 		echo "<h5>".$user_time."</h5>";
						?>
						<h4>Workout Time:</h4>
				 		<?php
							echo "<h5>".$behave_output_name."</h5>";
						?>
						<h4>Activity Style:</h4>
						<?php
							echo "<h5>".$ext_event."</h5>";
						?>				 			
						<h4>Fitness Level:</h4>
						<?php 
		 					echo "<h5>".$extr_event."</h5>";
	 					?>	
						<h4>Want to train with:</h4>
						<?php  
		 					echo "<h5>".$med_treatment."</h5>";
	 					?>	
	 					<h4>Age Range:</h4>
						<?php  
		 					echo "<h5>".$reaction."</h5>";
	 					?>	
						<h4>Goals:</h4>
						<?php 
		 					echo "<h5>".$react1."</h5>";
	 					?>	
	 				</section>				
				</section>
			</main>
		</div>
	</body>
</html>

<?php
//close DB connection
mysqli_free_result($result);
mysqli_close($connection);
?>