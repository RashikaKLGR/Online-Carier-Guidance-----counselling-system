<?php
//error_reporting(0);
include 'conn.php';		
include 'session_handler.php';
?>

<?php
$sql2="SELECT * FROM student_master WHERE studentmas_key='$_GET[st]' AND finact=0";
$result2 = mysqli_query($link,$sql2);
while($row2=mysqli_fetch_array($result2)){
	$student_nme=$row2['student_nme'];
	$date_of_birth=$row2['date_of_birth'];
	$nic_no=$row2['nic_no'];
	$user_nme=$row2['user_nme'];
	
}
?>

<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
    <head>
         <title>Education Qualification</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link rel="stylesheet" media="screen" href="css/bootstrap.min.css">
        <link rel="stylesheet" media="screen" href="css/bootstrap-theme.min.css">

        <!-- Bootstrap Admin Theme -->
        <link rel="stylesheet" media="screen" href="css/bootstrap-admin-theme.css">

        <!-- Custom styles -->
      <link rel="stylesheet" media="screen" href="css/common.css">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="js/html5shiv.js"></script>
           <script type="text/javascript" src="js/respond.min.js"></script>
        <![endif]-->
		<style type="text/css">
		.padding-0{
			padding-right:0;
			padding-left:0;
		}
		
		.bottom-right {
			position: absolute;
			bottom: 8px;
			right: 16px;
			font-size:40px;
			color:white;
			 text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
		}
		
		
	
		</style>
    </head>
    <body class="bc" style="background-position:center;
            background-attachment:fixed;
            background-size:100% 100%; background-image: url(images/a2.jpg);">
        <!-- small navbar -->
        <?php include('navi.php') ?>
		<br>
		<br>
		<br>
		<br>
		<div class="row">
					<div class="col-lg-1">
					
					</div>
					<div class="col-lg-10">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<table border="0" width="100%">
									<tr style="font-weight:bold;font-size:20px;">
										<td width="20%">Name</td>
										<td width="30%"> : <?php echo $student_nme; ?></td>
										<td width="20%">Date of Birth</td>
										<td width="30%"> : <?php echo $date_of_birth; ?></td>
									</tr>
									<tr style="font-weight:bold;font-size:20px;">
										<td width="20%">National ID Card No</td>
										<td width="30%"> : <?php echo $nic_no; ?></td>
										<td width="20%">Email Address</td>
										<td width="30%"> : <?php echo $user_nme; ?></td>
									</tr>
								</table>
								
							</div>
						</section>
					</div>
		</div>
		
		<div class="row">
			<div class="col-lg-1">
			</div>
            <div class="col-lg-10">
				<section class="panel panel-primary panel-transparent">
					<div class="panel-body">
						<h4 style="color:#ffffff;font-weight:bold" align="center">Education Qualification</h4>
					</div>
				</section>
			</div>
		</div>
		
		
		
		
		
		<div class="row">
			<?php
			$sql5="SELECT * FROM student_exam_details WHERE student_key='$_GET[st]' AND finact=0";
			$result5=mysqli_query($link,$sql5);
			while($row5=mysqli_fetch_array($result5)){
				$sql6="SELECT * FROM exam_master WHERE exammas_key='$row5[exam_key]' AND finact=0";
				$result6=mysqli_query($link,$sql6);
				while($row6=mysqli_fetch_array($result6)){
					$examnme=$row6['exam_name']." - ".$row6['stream'];
				}
			?>
				<div class="col-lg-6">
					<section class="panel panel-primary panel-transparent">
						<div class="panel-body">
							<form name="f2" method="post">
										
										<table width="100%" border="0">
											<tr>
												<td width="30%" align="center" style="font-size:20px;font-weight:bold"><?php echo $examnme; ?></td>
												<td width="70%" align="center" style="font-size:20px;font-weight:bold">Sitting Year : <?php echo $row5['sitting_year']; ?></td>
											</tr>
										</table>
										
										<br>
										<table width="100%" class="table table-striped table-bordered display" border="1">
											<?php
											$sql7="SELECT * FROM examsubject_master WHERE exammas_key='$row5[exam_key]' AND finact=0 ORDER BY examsubjectmas_key ASC";
											$result7=mysqli_query($link,$sql7);
											while($row7=mysqli_fetch_array($result7)){
												
											?>
													<?php
													$sql13="SELECT * FROM student_qualification_details WHERE student_key='$_GET[st]' 
																										AND student_exam_details_key='$row5[student_exam_key]'
																										AND examsubject_mas_key='$row7[examsubjectmas_key]'
																										AND finact=0";
													$result13=mysqli_query($link,$sql13);
													while($row13=mysqli_fetch_array($result13)){
															$creditpointcd_key=$row13['creditpoint_key'];
														
													?>
														<tr>
															<td width="60%" style="font-size:20px;font-weight:bold">&nbsp;&nbsp;&nbsp;<?php echo $row7['subject_name']; ?></td>
															
															<td width="40%" align="center" style="font-size:20px;font-weight:bold">
																	<?php
																	$sql14="SELECT * FROM creditpoint_master WHERE creditpointmas_key='$creditpointcd_key' AND finact=0";
																	$result14=mysqli_query($link,$sql14);
																	$option14 ="";
																	while($row14=mysqli_fetch_array($result14)){
																		echo $row14['cedit_name'];	
																	}
																	?>
																	
															</td>
															
														</tr>
													<?php
													}
													?>
											<?php
											}
											?>
										</table>
								</div>
							</form>
							
						
					</section>
				</div>
			<?php
			}
			?>
			
		</div>
		
		
	
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/twitter-bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-admin-theme-change-size.js"></script>
        <script type="text/javascript" src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
		
        		<link rel="stylesheet" type="text/css" href="datatable/dataTables.min.css" />
				<script type="text/javascript" src="datatable/dataTables.min.js"></script> 	
	
			<script type="text/javascript" charset="utf-8">
				
					$(window).scroll(function() {
							sessionStorage.scrollTop = $(this).scrollTop();
					});
						
					$(document).ready(function() {
						
					});	
					
					
					
			</script>
    </body>
</html>