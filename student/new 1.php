<?php
error_reporting(0);
include 'conn.php';		
include 'session_handler.php';
$cur_dte=date("Y-m-d");
?>

<?php
$sql2="SELECT * FROM student_course_details WHERE student_key='$ses_ukey' AND finact=0";
$result2 = mysqli_query($link,$sql2);
if(mysqli_num_rows($result2)==0){
	$register_status=0;
}
else{
	$register_status=1;
}

$sql3="SELECT * FROM student_newselected_course_details WHERE student_key='$ses_ukey' AND finact=0";
$result3 = mysqli_query($link,$sql3);
if(mysqli_num_rows($result3)==0){
	$course_selected_status=0;
}
else{
	$course_selected_status=1;
}
?>

<?php
$sql8="SELECT * FROM student_newselected_course_details INNER JOIN course_master ON student_newselected_course_details.course_key=course_master.coursemas_key
																									WHERE student_newselected_course_details.student_key='$ses_ukey'
																									AND student_newselected_course_details.register_status IS NULL
																									AND student_newselected_course_details.finact=0 
																									AND course_master.finact=0";
$result8 = mysqli_query($link,$sql8);
while($row8=mysqli_fetch_array($result8)){
	$txt_newselectcorse1="txt_newselectcorse".$row8['student_newselected_course_details_key'];
	$btn_courseadds1="btn_courseadds".$row8['student_newselected_course_details_key'];
	$btn_coursediscards1="btn_coursediscards".$row8['student_newselected_course_details_key'];
	
	if(isset($_POST[$btn_courseadds1])){
		$txt_studentid1="txt_studentid".$row8['student_newselected_course_details_key'];
		
		$sql9="SELECT * FROM student_newselected_course_details WHERE student_newselected_course_details_key='$_POST[$txt_newselectcorse1]' AND finact=0";
		$result9 = mysqli_query($link,$sql9);
		while($row9=mysqli_fetch_array($result9)){
			$sql10="INSERT INTO student_course_details (finact,status,studentcoursedetail_key,student_key,student_id,course_key,coursebatch_detail_key,batch,complete_status)
		                                       VALUES (0,'A',NULL,'$ses_ukey','$_POST[$txt_studentid1]','$row9[course_key]','$row9[coursebatch_detail_key]','$row9[batch_nme]','Ongoing')";
			mysqli_query($link,$sql10);
			
		}
		
		$sql11="UPDATE student_newselected_course_details SET register_status=1 WHERE student_newselected_course_details_key='$_POST[$txt_newselectcorse1]' AND finact=0";
		mysqli_query($link,$sql11);
		
		echo "<script>
				alert('Sucessfully Register course.');
				window.location.href='home.php';
			</script>";
	}
	
	if(isset($_POST[$btn_coursediscards1])){
		
		$sql11="UPDATE student_newselected_course_details SET register_status=2 WHERE student_newselected_course_details_key='$_POST[$txt_newselectcorse1]' AND finact=0";
		mysqli_query($link,$sql11);
		
		echo "<script>
				alert('Sucessfully Discard course.');
				window.location.href='home.php';
			</script>";
	}
	
}
?>

<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
    <head>
         <title>Home</title>
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
		if($register_status==0){
			include('navi_unregister.php');
		}
		if($register_status==1){
			include('navi_register.php');
		}
		?>
		<br>
		<br>
		<br>
		<br>
		<?php
		if($course_selected_status==1 || $register_status==1){
		?>
		
				<div class="row">
					<div class="col-lg-1">
					
					</div>
					<div class="col-lg-10">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<h1> Your Selected New Course(s) </h1>
								<table class="table table-striped table-bordered display"  width="100%">
									<thead>
										<tr>
											<th width="25%">Status</th>
											<th width="10%">Course</th>
											<th width="10%">Batch</th>
											<th width="15%">Test Type</th>
											
											<th width="20%">Student ID</th>
											<th width="10%">Confirm</th>
											<th width="10%">Discard</th>
											
										</tr>
									</thead>
									<tbody>
										
										<?php
											$sql5="SELECT * FROM student_newselected_course_details INNER JOIN course_master ON student_newselected_course_details.course_key=course_master.coursemas_key
																									WHERE student_newselected_course_details.student_key='$ses_ukey'
																									AND student_newselected_course_details.register_status IS NULL
																									AND student_newselected_course_details.finact=0 
																									AND course_master.finact=0";
											$result5 = mysqli_query($link,$sql5);
											while($row5=mysqli_fetch_array($result5)){
												if($row5['inform_status']==1){
													$backgroudcolorstureg="background-color:#64CCC5";
													$informstatuss="Informed-".$row5['inform_type']." - ".$row5['interview_testdte']." - ".$row5['inform_message'];
												}
												else{
													$backgroudcolorstureg="background-color:#FF8080";
													$informstatuss="Process";
												}
												
												$txt_newselectcorse="txt_newselectcorse".$row5['student_newselected_course_details_key'];
												$txt_studentid="txt_studentid".$row5['student_newselected_course_details_key'];
												$btn_courseadds="btn_courseadds".$row5['student_newselected_course_details_key'];
												$btn_coursediscards="btn_coursediscards".$row5['student_newselected_course_details_key'];
												
																								
												echo "<tr>
												<form name='f3' method='post'>
														<td width='25%' style='".$backgroudcolorstureg."'>".$informstatuss."</td>
														<td width='10%' style='".$backgroudcolorstureg."'>".$row5['course_nme']."</td>
														<td width='10%' style='".$backgroudcolorstureg."'>".$row5['batch_nme']."</td>
														<td width='10%' style='".$backgroudcolorstureg."'>".$row5['test_type']."</td>";
													
													if($row5['inform_status']==1 && $row5['interview_testdte']<=$cur_dte){ // check whether interview date is before the current date
													
														echo "<td width='20%' style='".$backgroudcolorstureg."'>
																<input type='hidden' name='".$txt_newselectcorse."' value='".$row5['student_newselected_course_details_key']."'>
																<input type='text' name='".$txt_studentid."' class='form-control input-sm'> 
															  </td>
															  <td width='10%' style='".$backgroudcolorstureg."'>
																<button type='submit' name='".$btn_courseadds."' class='btn btn-sm btn-primary btn-block'>Add Course</button>
															  </td>
															  <td width='10%' style='".$backgroudcolorstureg."'>
																<button type='submit' name='".$btn_coursediscards."' class='btn btn-sm btn-danger btn-block'>Deselect</button>
															  </td>";
													}
													else{
														echo "<td width='20%' style='".$backgroudcolorstureg."'>
																
															  </td>
															  <td width='10%' style='".$backgroudcolorstureg."'>
																
															  </td>
															  <td width='10%' style='".$backgroudcolorstureg."'>
																
															  </td>";
													}
												echo "</form>
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
			$sql7="SELECT * FROM student_course_details WHERE student_key='$ses_ukey' AND finact=0";
			$result7 = mysqli_query($link,$sql7);
			if(mysqli_num_rows($result7)>0){
			?>
				<div class="row">
					<div class="col-lg-1">
					
					</div>
					<div class="col-lg-10">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<h1> Your Course(s) </h1>
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
																						WHERE student_course_details.student_key='$ses_ukey'
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
		}
		else{
		?>	
			<div class="row">
				<div class="col-lg-1">
				
				</div>
				<div class="col-lg-10">
					<section class="panel panel-primary panel-transparent">
							<div class="panel-body">
								<h2 style="color:red;font-weight:bold" align="center">Your information has not been filled in properly.</h2>
								<a href="process1.php"><button type="button" class="btn btn-lg btn-danger btn-block">Fill your information properly.</button></a>
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