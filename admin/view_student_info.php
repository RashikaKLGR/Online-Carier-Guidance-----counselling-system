<?php
error_reporting(0);
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
         <title>Student Info</title>
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
		
        <?php
		
		include('navi.php');
		
		?>
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
								<br>
								<a href="view_educationqualification.php?st=<?php echo $_GET['st']; ?>"><button class='btn btn-md btn-success btn-block'>Education Qualification</button></a>
							</div>
						</section>
					</div>
			</div>
			
			
			<?php
			$sql3="SELECT * FROM student_newselected_course_details WHERE student_key='$_GET[st]' AND register_status IS NULL AND finact=0";
			$result3 = mysqli_query($link,$sql3);
			if(mysqli_num_rows($result3)>0){
				while($row3=mysqli_fetch_array($result3)){
					$informsstatus=$row3['inform_status'];
				}
			?>
				<div class="row">
					<div class="col-lg-1">
					
					</div>
					<div class="col-lg-10">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<h1> Selected New Course(s) </h1>
								<table class="table table-striped table-bordered display" id="example" width="100%">
									<thead>
										<tr>
											<th width="25%">Status</th>
											<th width="30%">Course</th>
											<th width="25%">Batch</th>
											<th width="20%">Test Type</th>
											
										</tr>
									</thead>
									<tbody>
										
										<?php
											$sql5="SELECT * FROM student_newselected_course_details INNER JOIN course_master ON student_newselected_course_details.course_key=course_master.coursemas_key
																									WHERE student_newselected_course_details.student_key='$_GET[st]'
																									AND student_newselected_course_details.register_status IS NULL
																									AND student_newselected_course_details.finact=0 
																									AND course_master.finact=0";
											$result5 = mysqli_query($link,$sql5);
											while($row5=mysqli_fetch_array($result5)){
												if($row5['inform_status']==1){
													$backgroudcolorstureg="background-color:#64CCC5";
													$informstatus="Informed";
												}
												else{
													$backgroudcolorstureg="background-color:#FF8080";
													$informstatus="Process";
												}
												
											
												echo "<tr>
														<td width='25%' style='".$backgroudcolorstureg."'>".$informstatus."</td>
														<td width='10%' style='".$backgroudcolorstureg."'>".$row5['course_nme']."</td>
														<td width='10%' style='".$backgroudcolorstureg."'>".$row5['batch_nme']."</td>
														<td width='10%' style='".$backgroudcolorstureg."'>".$row5['test_type']."</td>";
												echo "</tr>";
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
			?>
			
			<?php
			$sql7="SELECT * FROM student_course_details WHERE student_key='$_GET[st]' AND finact=0";
			$result7 = mysqli_query($link,$sql7);
			if(mysqli_num_rows($result7)>0){
			?>
				<div class="row">
					<div class="col-lg-1">
					
					</div>
					<div class="col-lg-10">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<h1> Course(s) </h1>
								<table class="table table-striped table-bordered display" id="example" width="100%">
									<thead>
										<tr>
											<th width="20%">Status</th>
											<th width="30%">Student ID</th>
											<th width="20%">Batch</th>
											<th width="30%">Course</th>
										</tr>
									</thead>
									<tbody>
										
										<?php
											$sql4="SELECT * FROM student_course_details INNER JOIN course_master ON student_course_details.course_key=course_master.coursemas_key 
																						WHERE student_course_details.student_key='$_GET[st]'
																						AND student_course_details.finact=0 
																						AND course_master.finact=0";
											$result4 = mysqli_query($link,$sql4);
											while($row4=mysqli_fetch_array($result4)){
												if($row4['complete_status']=="Complete"){
													$backgroudcolorstureg="background-color:#64CCC5;font-weight:bold";
												}
												else{
													$backgroudcolorstureg="background-color:#FF8080;font-weight:bold";
												}
												echo "<tr>
														<td width='20%' style='".$backgroudcolorstureg."'>".$row4['complete_status']."</td>
														<td width='30%' style='".$backgroudcolorstureg."'>".$row4['student_id']."</td>
														<td width='20%' style='".$backgroudcolorstureg."'>".$row4['batch']."</td>
														<td width='30%' style='".$backgroudcolorstureg."'>".$row4['course_nme']."</td>
														
													</tr>";
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
			?>
			
			<?php
			$sql8="SELECT * FROM student_test_master WHERE student_key='$_GET[st]' AND complete_status=1 AND finact=0";
			$result8 = mysqli_query($link,$sql8);
			if(mysqli_num_rows($result8)>0){
			?>
				<div class="row">
					<div class="col-lg-1">
					
					</div>
					<div class="col-lg-10">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<h1>Test Details </h1>
								<table class="table table-striped table-bordered display"  width="100%">
									<thead>
										<tr>
											<th width="25%">Test Date/Time</th>
											<th width="35%">Test Type</th>
											<th width="20%">Answers</th>
											<th width="20%">Result</th>
											
										</tr>
									</thead>
									<tbody>
										
										<?php
											$sql5="SELECT * FROM  student_test_master WHERE student_key='$_GET[st]' AND finact=0";
											$result5 = mysqli_query($link,$sql5);
											while($row5=mysqli_fetch_array($result5)){
												
												echo "<tr>
														<td width='25%'>".$row5['sys_enterdte']."</td>
														<td width='35%'>".$row5['test_type']."</td>
														<td width='20%'>
															<a href='test_answers.php?ts=".$row5['student_testmas_key']."'><button class='btn btn-sm btn-primary btn-block'>Answers</button></a>
														</td>
														<td width='20%'>
															<a href='test_result.php?ts=".$row5['student_testmas_key']."'><button class='btn btn-sm btn-success btn-block'>Results</button></a>
														</td>";
												echo "</tr>";
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
			?>
			
			<?php
			$sql12="SELECT * FROM appoinment_master WHERE student_key='$_GET[st]' AND finact=0";
			$result12 = mysqli_query($link,$sql12);
			if(mysqli_num_rows($result12)>0){
			?>
				<div class="row">
					<div class="col-lg-1">
					
					</div>
					<div class="col-lg-10">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<h1>Appoinment </h1>
								<table class="table table-striped table-bordered display" id="example" width="100%">
									<thead>
										<tr>
											<th width="40%">Request Date</th>
											<th width="20%">Approve Date</th>
											<th width="20%">Appoinment Date</th>
											<th width="20%">Appoinment Time</th>
											
										</tr>
									</thead>
									<tbody>
										
										<?php
											$sql9="SELECT * FROM  appoinment_master WHERE student_key='$_GET[st]'
																					  AND finact=0
																					ORDER BY sys_enterdte DESC";
											$result9 = mysqli_query($link,$sql9);
											while($row9=mysqli_fetch_array($result9)){
												if($row9['approve_status']==1){
													$status_appoinment="Approved";
													$background_appoinment="background-color:#64CCC5;font-weight:bold";
												}
												else{
													$status_batch="Pending Approve";
													$background_appoinment="background-color:#FF8080;font-weight:bold";
												}
												
												echo "<tr>
														<td width='40%' style='".$background_appoinment."'>".$row9['sys_enterdte']."</td>";
														if($row9['approve_status']==1){
															echo "<td width='20%' style='".$background_appoinment."'>".$row9['approve_dtetime']."</td>";
															echo "<td width='20%' style='".$background_appoinment."'>".$row9['appinment_date']."</td>";
															echo "<td width='20%' style='".$background_appoinment."'>".$row9['appoinment_time']."</td>";
														}
														else{
															echo "<td width='60%' colspan='3' style='".$background_appoinment."'>Pending Approve</td>";
														}
												echo "</tr>";
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
			?>
			
			<?php
			$sql13="SELECT * FROM student_trainingpoint_master WHERE student_key='$_GET[st]' AND finact=0";
			$result13 = mysqli_query($link,$sql13);
			if(mysqli_num_rows($result13)>0){
			?>
				<div class="row">
					<div class="col-lg-1">
					
					</div>
					<div class="col-lg-10">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<h1> Training Point </h1>
								<table class="table table-striped table-bordered display" width="100%">
									<thead>
										<tr>
											<th width="15%">Request Date</th>
											<th width="25%">Course</th>
											<th width="20%">Batch</th>
											<th width="20%">Training Point</th>
											<th width="20%">Designation</th>
										</tr>
									</thead>
									<tbody>
										
										<?php
											$sql10="SELECT * FROM student_trainingpoint_master INNER JOIN course_master ON student_trainingpoint_master.course_key=course_master.coursemas_key 
																							  INNER JOIN course_batch_details ON student_trainingpoint_master.coursebatch_detail_key=course_batch_details.course_batch_details_key
																							  WHERE student_trainingpoint_master.student_key='$_GET[st]'
																								AND student_trainingpoint_master.finact=0 
																								AND course_batch_details.finact=0
																								AND course_master.finact=0";
											$result10 = mysqli_query($link,$sql10);
											while($row10=mysqli_fetch_array($result10)){
												
												if($row10['approve_status']==1){
													$backgroudcolorappoint="background-color:#64CCC5;font-weight:bold";
												}
												else{
													$backgroudcolorappoint="background-color:#FF8080;font-weight:bold";
												}
												
												echo "<tr>
														<td width='15%' style='".$backgroudcolorappoint."'>".$row10['sys_enterdte']."</td>
														<td width='25%' style='".$backgroudcolorappoint."'>".$row10['course_nme']."</td>
														<td width='20%' style='".$backgroudcolorappoint."'>".$row10['batch_nme']."</td>";
														if($row10['approve_status']<1){
															echo "<td width='20%' style='".$backgroudcolorappoint."' colspan='2' align='center'>Pending Process</td>";
														}
														else{
															echo "<td width='20%' style='".$backgroudcolorappoint."'>".$row10['training_point_nme']."</td>
																  <td width='20%' style='".$backgroudcolorappoint."'>".$row10['training_point_designation']."</td>";
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
			?>
			
			<?php
			$sql14="SELECT * FROM student_businessloan_details WHERE student_key='$_GET[st]' AND finact=0";
			$result14 = mysqli_query($link,$sql14);
			if(mysqli_num_rows($result14)>0){
			?>
				<div class="row">
					<div class="col-lg-1">
					
					</div>
					<div class="col-lg-10">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<h1> Business Loan Programme</h1>
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
											$sql11="SELECT * FROM student_businessloan_details  WHERE student_key='$_GET[st]'
																								AND finact=0";
											$result11 = mysqli_query($link,$sql11);
											while($row11=mysqli_fetch_array($result11)){
												
												if($row11['inform_status']==1){
													$backgroudcolorbusiness="background-color:#64CCC5;font-weight:bold";
												}
												else{
													$backgroudcolorbusiness="background-color:#FF8080;font-weight:bold";
												}
												
												echo "<tr>
														<td width='20%' style='".$backgroudcolorbusiness."'>".$row11['sys_enterdte']."</td>";
														if($row11['inform_status']<1){
															echo "<td width='80%' style='".$backgroudcolorbusiness."' colspan='3' align='center'>Pending Process</td>";
														}
														else{
															echo "<td width='20%' style='".$backgroudcolorbusiness."'>".$row11['programme_dte']."</td>
																  <td width='40%' style='".$backgroudcolorbusiness."'>".$row11['inform_message']."</td>
																  <td width='20%' style='".$backgroudcolorbusiness."'>".$row11['inform_datetime']."</td>";
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
			?>
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
			$(document).ready(function() {
							
							
							$('#example thead th').each( function () {
								 var title = $('#example thead th').eq( $(this).index() ).text();
								
								$(this).html( '<label style="font-size:18px;color:white">'+title+'</label><input type="text" placeholder="'+title+'" style="color:black;" class="form-control input-sm" />' );
							} );
			 
						// DataTable
							var table = $('#example').DataTable({

								
									
							});
						
							
					
							table.columns().eq( 0 ).each( function ( colIdx ) {
								$( 'input', table.column( colIdx ).header() ).on( 'keyup change', function () {
									table
										.column( colIdx )
										.search( this.value )
										.draw();
								} );
							} );
						
						
							$(".clickable-row").click(function() {
								window.location = $(this).data("href");
							  });
							
							
							
					});	
		</script>
    </body>
</html>