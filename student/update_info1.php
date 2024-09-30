<?php
//error_reporting(0);
include 'conn.php';		
include 'session_handler.php';
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
?>

<?php


if(isset($_POST['btn_examadd'])){
	$nm1=$_POST['sele_exam'];
	$nm2=$_POST['txt_sittingyear'];
	
	$sql3="SELECT * FROM  student_exam_details WHERE student_key='$ses_ukey' AND exam_key='$nm1' AND sitting_year='$nm2' AND finact=0";
	$result3 = mysqli_query($link,$sql3);
	if(mysqli_num_rows($result3)==0){
		$sql4="INSERT INTO student_exam_details (finact,status,student_exam_key,student_key,exam_key,sitting_year)
										 VALUES (0,'A',NULL,'$ses_ukey','$nm1','$nm2')";
		if(mysqli_query($link,$sql4)){
			echo "<script>
				alert('Sucessfully Added Exam.');
				window.location.href='update_info.php';
			</script>";
		}
		
	}
	else{
		echo "<script>
				alert('Already added this qualification.');
				window.location.href='update_info.php';
			</script>";
	}
	
}

$sql9="SELECT * FROM student_exam_details WHERE student_key='$ses_ukey' AND finact=0";
$result9=mysqli_query($link,$sql9);
while($row9=mysqli_fetch_array($result9)){
	
	$sql8="SELECT * FROM examsubject_master WHERE exammas_key='$row9[exam_key]' AND finact=0";
	$result8=mysqli_query($link,$sql8);
	while($row8=mysqli_fetch_array($result8)){
		$txt_subjectkey1="txt_subjectkey".$row8['examsubjectmas_key'];
		$sele_credit1="sele_credit".$row8['examsubjectmas_key'];
		$btn_subject1="btn_subject".$row8['examsubjectmas_key'];
		
		if(isset($_POST[$btn_subject1])){
			$ng1=$_POST[$txt_subjectkey1];
			$ng2=$_POST[$sele_credit1];
			
			$sql10="SELECT * FROM student_qualification_details WHERE student_key='$ses_ukey' 
																AND student_exam_details_key='$row9[student_exam_key]'
																AND examsubject_mas_key='$ng1'
																AND finact=0";
			$result10=mysqli_query($link,$sql10);
			if(mysqli_num_rows($result10)==0){
				$sql11="INSERT INTO student_qualification_details (finact,status,studentqualification_key,student_key,student_exam_details_key,examsubject_mas_key,creditpoint_key)
													        VALUES (0,'A',NULL,'$ses_ukey','$row9[student_exam_key]','$ng1','$ng2')";
				if(mysqli_query($link,$sql11)){
					echo "<script>
						window.location.href='update_info.php';
					</script>";
				}
			}
			else{
				
				if($ng2=="NotSitting"){
					$sql12="UPDATE student_qualification_details SET finact=1
																WHERE student_key='$ses_ukey' 
																AND student_exam_details_key='$row9[student_exam_key]'
																AND examsubject_mas_key='$ng1'
																AND finact=0";
				}
				else{
					$sql12="UPDATE student_qualification_details SET creditpoint_key='$ng2'
																WHERE student_key='$ses_ukey' 
																AND student_exam_details_key='$row9[student_exam_key]'
																AND examsubject_mas_key='$ng1'
																AND finact=0";
				}
				if(mysqli_query($link,$sql12)){
					echo "<script>
						window.location.href='update_info.php';
					</script>";
				}
			}												
		}
	}
	
}

?>

<?php
	/*$sql15="SELECT * FROM student_newselected_course_details WHERE student_key='$ses_ukey' AND inform_status IS NULL";
	$result15=mysqli_query($link,$sql15);
	while($row15=mysqli_fetch_array($result15)){
		$allresult_student=0;
		$allresult_course=0;
										
		$sql16="SELECT * FROM course_qualification_details WHERE course_key='$row15[course_key]' AND finact=0";
		$result16=mysqli_query($link,$sql16);
		$allresult_course=mysqli_num_rows($result16);
		while($row16=mysqli_fetch_array($result16)){
			
			$sql17="SELECT * FROM  student_qualification_details INNER JOIN student_exam_details ON student_qualification_details.student_exam_details_key=student_exam_details.student_exam_key
																WHERE student_qualification_details.student_key='$ses_ukey'
																  AND student_exam_details.exam_key='$row16[exam_key]'
																  AND student_qualification_details.examsubject_mas_key='$row16[examsubject_mas_key]'
																  AND student_qualification_details.creditpoint_key<='$row16[creditpoint_key]'
																  AND student_qualification_details.finact=0
																  AND student_exam_details.finact=0";
			$result17=mysqli_query($link,$sql17);
			if(mysqli_num_rows($result17)>0){
				$allresult_student++;
			}
		}
		
		if($allresult_course==$allresult_student){
			$sql19="UPDATE student_newselected_course_details SET finact=0,status='A' WHERE student_key='$ses_ukey' AND course_key='$row15[course_key]' AND status='D' AND finact=1";
			mysqli_query($link,$sql19);
		}
		else{
			$sql18="UPDATE student_newselected_course_details SET finact=1,status='D' WHERE student_key='$ses_ukey' AND course_key='$row15[course_key]' AND finact=0";
			mysqli_query($link,$sql18);
		}
	}
*/
?>

<?php
	/*$sql22="SELECT * FROM student_course_details INNER JOIN course_master ON student_course_details.course_key=course_master.coursemas_key 
																						WHERE student_course_details.student_key='$ses_ukey'
																						AND student_course_details.finact=0 
																						AND course_master.finact=0";
	$result22 = mysqli_query($link,$sql22);
	while($row22=mysqli_fetch_array($result22)){
		$txt_coursestatuskeyys1="txt_coursestatuskeyys".$row22['studentcoursedetail_key'];
		$sele_coursestatus1="sele_coursestatus".$row22['studentcoursedetail_key'];
		$btn_courseupdatestatus1="btn_courseupdatestatus".$row22['studentcoursedetail_key'];
		
		if(isset($_POST[$btn_courseupdatestatus1])){
			$sql23="UPDATE student_course_details SET complete_status='$_POST[$sele_coursestatus1]' WHERE studentcoursedetail_key='$_POST[$txt_coursestatuskeyys1]' AND finact=0";
			if(mysqli_query($link,$sql23)){
					echo "<script>
						alert('Sucessfully Update Course Status');
						window.location.href='update_info.php';
					</script>";
			}
			
		}
		
	}*/

?>

<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
    <head>
         <title>Update Information</title>
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
		$sql20="SELECT * FROM student_course_details WHERE student_key='$ses_ukey' AND finact=0";
		$result20= mysqli_query($link,$sql20);
		if(mysqli_num_rows($result20)>0){
		?>
			<!--	<div class="row">
					<div class="col-lg-1">
					
					</div>
					<div class="col-lg-10">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<h1> Your Course(s) </h1>
								<table class="table table-striped table-bordered display"  width="100%">
									<thead>
										<tr>
											<th width="15%">Status</th>
											<th width="15%">Student ID</th>
											<th width="15%">Batch</th>
											<th width="20%">Course</th>
											<th width="20%">Status</th>
											<th width="15%">Update</th>
										</tr>
									</thead>
									<tbody>-->
										
										<?php /*
											$sql21="SELECT * FROM student_course_details INNER JOIN course_master ON student_course_details.course_key=course_master.coursemas_key 
																						WHERE student_course_details.student_key='$ses_ukey'
																						AND student_course_details.finact=0 
																						AND course_master.finact=0";
											$result21 = mysqli_query($link,$sql21);
											while($row21=mysqli_fetch_array($result21)){
												if($row21['complete_status']=="Complete"){
													$backgroudcolorstureg="background-color:#64CCC5;font-weight:bold";
												}
												else{
													$backgroudcolorstureg="background-color:#FF8080;font-weight:bold";
												}
												
												$txt_coursestatuskeyys="txt_coursestatuskeyys".$row21['studentcoursedetail_key'];
												$sele_coursestatus="sele_coursestatus".$row21['studentcoursedetail_key'];
												$btn_courseupdatestatus="btn_courseupdatestatus".$row21['studentcoursedetail_key'];
												
												echo "<tr>
														<form name='f1' method='post'>
															<td width='15%' style='".$backgroudcolorstureg."'>".$row21['complete_status']."</td>
															<td width='15%' style='".$backgroudcolorstureg."'>".$row21['student_id']."</td>
															<td width='15%' style='".$backgroudcolorstureg."'>".$row21['batch']."</td>
															<td width='20%' style='".$backgroudcolorstureg."'>".$row21['course_nme']."</td>
															<td width='20%' style='".$backgroudcolorstureg."'>
																<input type='hidden' name='".$txt_coursestatuskeyys."' value='".$row21['studentcoursedetail_key']."'>
																<select class='form-control input-sm' name='".$sele_coursestatus."'>
																	<option value=".$row21['complete_status'].">".$row21['complete_status']."</option>
																	<option value='Complete'>Complete</option>
																	<option value='Ongoing'>Ongoing</option>
																	<option value='Incomplete'>Incomplete</option>
																</select>
															</td>
															<td width='15%' style='".$backgroudcolorstureg."'>
																<button type='submit' name='".$btn_courseupdatestatus."' class='btn btn-sm btn-success btn-block'>Update Status</button>
															</td>
														</form>
													</tr>";
											}*/
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
		
		
		<!--<div class="row">
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
			<div class="col-lg-1">
			
			</div>
			<div class="col-lg-10">
				<section class="panel panel-primary panel-transparent">
					<div class="panel-body">
						<form name="f2" method="post">
							<div class="row">
								<div class="col-lg-5">
									<div class="form-group">
									  <label><font color="red">&lowast;</font>Exam</label>
										<select class="form-control input-sm" name="sele_exam" required>
												<?php /*
													$sql1="SELECT * FROM exam_master WHERE finact=0";
													$result1=mysqli_query($link,$sql1);
													$option1 ="";
													while($row1=mysqli_fetch_array($result1)){
														$option1 = $option1."<option value=$row1[exammas_key]>$row1[exam_name] - $row1[stream]</option>";			
													}
													
													echo "<option value='' disabled selected hidden>Please Choose.............</option>";
													echo $option1;*/
													
												?>
										</select>
									</div>
								</div>
								
								<div class="col-lg-5">
									<div class="form-group">
										<label><font color="red">&lowast;</font>Sitting Year</label>
										<input type="text" class="form-control input-sm" name="txt_sittingyear" placeholder="Please Enter Sitting Year" required>
									</div>
								</div>
								<div class="col-lg-2">
									<div class="form-group">
										<label></label>
										<button type="submit" name="btn_examadd" class="btn btn-lg btn-success btn-block">Add Exam Details</button>
									</div>
								</div> -->
							</div>
						</form>
						
					</div>
				</section>
			</div>
		</div>
		
		
		<div class="row">
			<?php
			$sql5="SELECT * FROM student_exam_details WHERE student_key='$ses_ukey' AND finact=0";
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
												$txt_subjectkey="txt_subjectkey".$row7['examsubjectmas_key'];
												$sele_credit="sele_credit".$row7['examsubjectmas_key'];
												$btn_subject="btn_subject".$row7['examsubjectmas_key'];
											?>
													<?php
													$sql13="SELECT * FROM student_qualification_details WHERE student_key='$ses_ukey' 
																										AND student_exam_details_key='$row5[student_exam_key]'
																										AND examsubject_mas_key='$row7[examsubjectmas_key]'
																										AND finact=0";
													$result13=mysqli_query($link,$sql13);
													if(mysqli_num_rows($result13)==0){
													?>
														<tr>
															<td width="40%" style="font-size:20px;font-weight:bold">&nbsp;&nbsp;&nbsp;<?php echo $row7['subject_name']; ?></td>
															
															<td width="40%" style="font-size:20px;font-weight:bold">
																<input type="hidden" name="<?php echo $txt_subjectkey; ?>" value="<?php echo $row7['examsubjectmas_key']; ?>">
																<select class="form-control input-sm" name="<?php echo $sele_credit; ?>">
																	<?php
																	$sql8="SELECT * FROM creditpoint_master WHERE finact=0";
																	$result8=mysqli_query($link,$sql8);
																	$option8 ="";
																	while($row8=mysqli_fetch_array($result8)){
																		$option8 = $option8."<option value=$row8[creditpointmas_key]>$row8[cedit_name]</option>";			//Load Reagon Name
																	}
																	?>
																		<option value="" disabled selected hidden>Please Choose.............</option>";
																		<?php echo $option8; ?>    
																</select>
															</td>
															
															<td width="20%" style="font-size:20px;font-weight:bold">
																<button type="submit" name="<?php echo $btn_subject; ?>" class="btn btn-sm btn-primary btn-block">Add</button>
															</td>
														</tr>
													<?php
													}
													else{
														while($row13=mysqli_fetch_array($result13)){
															$creditpointcd_key=$row13['creditpoint_key'];
														}
													?>
														<tr>
															<td width="40%" style="font-size:20px;font-weight:bold">&nbsp;&nbsp;&nbsp;<?php echo $row7['subject_name']; ?></td>
															
															<td width="40%" style="font-size:20px;font-weight:bold">
																<input type="hidden" name="<?php echo $txt_subjectkey; ?>" value="<?php echo $row7['examsubjectmas_key']; ?>">
																<select class="form-control input-sm" name="<?php echo $sele_credit; ?>">
																	<?php
																	$sql8="SELECT * FROM creditpoint_master WHERE finact=0";
																	$result8=mysqli_query($link,$sql8);
																	$option8 ="";
																	while($row8=mysqli_fetch_array($result8)){
																		$option8 = $option8."<option value=$row8[creditpointmas_key]>$row8[cedit_name]</option>";			//Load Reagon Name
																	}
																	
																	$sql14="SELECT * FROM creditpoint_master WHERE creditpointmas_key='$creditpointcd_key' AND finact=0";
																	$result14=mysqli_query($link,$sql14);
																	$option14 ="";
																	while($row14=mysqli_fetch_array($result14)){
																		$option14 = $option14."<option value=$row14[creditpointmas_key]>$row14[cedit_name]</option>";			//Load Reagon Name
																	}
																	?>
																		
																		<?php echo $option14; ?>
																		<option value="NotSitting">Not Sitting</option>
																		<?php echo $option8; ?>    
																</select>
															</td>
															
															<td width="20%" style="font-size:20px;font-weight:bold">
																<button type="submit" name="<?php echo $btn_subject; ?>" class="btn btn-sm btn-success btn-block">Update</button>
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