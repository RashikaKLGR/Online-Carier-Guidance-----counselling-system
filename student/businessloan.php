<?php
include 'conn.php';	
include 'session_handler.php';
//error_reporting(0);	
?>

<?php
$cur_dte=date("Y-m-d");
?>

<?php

if(isset($_POST['btn_add'])) {
 
	$sql1="SELECT * FROM student_businessloan_details WHERE student_key='$ses_ukey' AND inform_status IS NULL AND finact=0";
	$result1 = mysqli_query($link,$sql1);
	if(mysqli_num_rows($result1)==0){
	
		$sql4="INSERT INTO student_businessloan_details (finact,status,student_businessloan_details_key,student_key) 
								                  VALUES(0,'A',NULL,'$ses_ukey')";
		if(mysqli_query($link,$sql4)){
			
			echo "<script>
				alert('Sucessfully Request Business Loan Programme.');
				window.location.href='businessloan.php';
			</script>";
		}
		
	}
	else{
		echo "<script>
				alert('Sorry!! Already Business Loan Programme.');
				window.location.href='businessloan.php';
			</script>";
		
	}
	
}

?>

<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Loan Programme</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link rel="stylesheet" media="screen" href="css/bootstrap.min.css">
        <link rel="stylesheet" media="screen" href="css/bootstrap-theme.min.css">

        <!-- Bootstrap Admin Theme -->
        <link rel="stylesheet" media="screen" href="css/bootstrap-admin-theme.css">
        <link rel="stylesheet" media="screen" href="css/bootstrap-admin-theme-change-size.css">

        <!-- Vendors -->
        <link rel="stylesheet" media="screen" href="vendors/easypiechart/jquery.easy-pie-chart.css">
        <link rel="stylesheet" media="screen" href="vendors/easypiechart/jquery.easy-pie-chart_custom.css">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="js/html5shiv.js"></script>
           <script type="text/javascript" src="js/respond.min.js"></script>
        <![endif]-->
		<link rel="stylesheet" media="screen" href="css/common.css">
		<style type="text/css">
			.padding-0{
				padding-right:0;
				padding-left:0;
			}
			
			.bottom-right {
				position: absolute;
				bottom: 8px;
				right: 16px;
				font-size:80px;
				color:white;
				 text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
			}
	
		</style>   

</head>
<body class="bc" style="background-position:center;
            background-attachment:fixed;
            background-size:100% 100%; background-image: url(images/a2.jpg);">
     <?php include('navi_register.php') ?>
		<br>
		<br>
		<br>
		<br>
    
	<?php
	$sql2="SELECT * FROM student_course_details INNER JOIN course_master ON student_course_details.course_key=course_master.coursemas_key  
																								WHERE student_course_details.complete_status='Complete'
																								AND course_master.coursetype_key=1
																								AND student_course_details.student_key='$ses_ukey'
																								AND student_course_details.finact=0
																								AND course_master.finact=0";
	$result2=mysqli_query($link,$sql2);
	if(mysqli_num_rows($result2)>0){
	?>
		<div class="row">

            <div class="col-lg-2">

            </div>
            
                
			<div class="col-lg-8">
				<div class="row">
					<div class="col-lg-12">
						<section class="panel panel-primary panel-transparent">
                          
							<div class="panel-body">
								<form role="form" method="post" name="f1">
									<button type="submit" name="btn_add" class="btn btn-lg btn-primary btn-block">Request Business Loan Programme</button>
								</form>

							</div>
						</section>

					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-1">
			
			</div>
			<div class="col-lg-10">
				<section class="panel panel-transparent">
					<div class="panel-body panel-transparent">
						<h1> You Request Business Loan Programme</h1>
						<table class="table table-striped table-bordered display" width="100%">
							<thead>
								<tr>
									<th width="20%">Request Date</th>
									<th width="20%">Programme Date</th>
									<th width="40%">Inform Message</th>
									<th width="20%">Inform Date</th>
									
								</tr>
							</thead>
							<tbody>
								
								<?php
									$sql4="SELECT * FROM student_businessloan_details  WHERE student_key='$ses_ukey'
																						AND finact=0";
									$result4 = mysqli_query($link,$sql4);
									while($row4=mysqli_fetch_array($result4)){
										
										if($row4['inform_status']==1){
											$backgroudcolorbusiness="background-color:#64CCC5;font-weight:bold";
										}
										else{
											$backgroudcolorbusiness="background-color:#FF8080;font-weight:bold";
										}
										
										echo "<tr>
												<td width='20%' style='".$backgroudcolorbusiness."'>".$row4['sys_enterdte']."</td>";
												if($row4['inform_status']<1){
													echo "<td width='80%' style='".$backgroudcolorbusiness."' colspan='3' align='center'>Pending Process</td>";
												}
												else{
													echo "<td width='20%' style='".$backgroudcolorbusiness."'>".$row4['programme_dte']."</td>
														  <td width='40%' style='".$backgroudcolorbusiness."'>".$row4['inform_message']."</td>
														  <td width='20%' style='".$backgroudcolorbusiness."'>".$row4['inform_datetime']."</td>";
												}
										echo"</tr>";
									}
								?>
								
							</tbody>
						</table>
					</div>
				</section>
			</div>
		</div>
	<?php
	}
	else{
	?>
		<div class="row">
				<div class="col-lg-1">
				
				</div>
				<div class="col-lg-10">
					<section class="panel panel-primary panel-transparent">
							<div class="panel-body">
								<h2 style="color:red;font-weight:bold" align="center">You must be a compulsory and NVQ course to complete the course for this.</h2>
								
							</div>
					</section>
				</div>
		</div>
	<?php
	}
	?>
    

   

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/twitter-bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-admin-theme-change-size.js"></script>
        <script type="text/javascript" src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
</body>
<?php
mysqli_close($link);
?>
</html>
