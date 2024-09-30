<?php
error_reporting(0);
include 'conn.php';		
include 'session_handler.php';

?>

<?php
$sql11="SELECT * FROM student_exam_details WHERE student_key='$ses_ukey' AND finact=0";
$result11=mysqli_query($link,$sql11);
if(mysqli_num_rows($result11)==0){
	echo "<script>
			alert('Please add Your Education Qualification')
			window.location.href='examdetails_enterd.php';
		</script>";
}
?>
<?php
$sql3="SELECT * FROM student_test_master WHERE student_key='$ses_ukey' AND test_type='Test01' AND complete_status=1 AND finact=0";
$result3=mysqli_query($link,$sql3);
while($row3=mysqli_fetch_array($result3)){
	$student_testmas_key=$row3['student_testmas_key'];
}

$sql10="SELECT * FROM student_newselected_course_details WHERE student_key='$ses_ukey' 
																 AND student_testmas_key='$student_testmas_key' 
																 AND test_type='Test01' 
																 AND finact=0";
$result10=mysqli_query($link,$sql10);
$noofselectcourse=mysqli_num_rows($result10);
?>

<?php
if(isset($_GET['cs'])){
	
	$sql12="SELECT * FROM course_batch_details WHERE course_key='$_GET[cs]' AND batchapplyclose_status=0 AND finact=0";
	$result12=mysqli_query($link,$sql12);
	while($row12=mysqli_fetch_array($result12)){
		$student_batchs_key=$row12['course_batch_details_key'];
		$student_batchs_nme=$row12['batch_nme'];
	}
	
	$sql7="SELECT * FROM  student_newselected_course_details WHERE student_key='$ses_ukey' AND course_key='$_GET[cs]' AND student_testmas_key='$student_testmas_key' AND test_type='Test01' AND finact=0";
	$result7=mysqli_query($link,$sql7);
	if(mysqli_num_rows($result7)==0){
		$sql8="INSERT INTO student_newselected_course_details (finact,status,student_newselected_course_details_key,student_key,course_key,student_testmas_key,test_type,coursebatch_detail_key,batch_nme)
														VALUES (0,'A',NULL,'$ses_ukey','$_GET[cs]','$student_testmas_key','Test01','$student_batchs_key','$student_batchs_nme')";
		if(mysqli_query($link,$sql8)){
			echo "<script>
				alert('Successfully Select Course')
				window.location.href='test1_process3.php';
			</script>";
		}
	}
	else{
		echo "<script>
				alert('Already Selected this Course')
				window.location.href='test1_process3.php';
			</script>";
	}
}

if(isset($_GET['csd'])){
	$sql10="UPDATE  student_newselected_course_details SET finact=1 WHERE student_key='$ses_ukey' 
																		AND course_key='$_GET[csd]' 
																		AND student_testmas_key='$student_testmas_key'
																		AND test_type='Test01'
																		AND finact=0";
	if(mysqli_query($link,$sql10)){
			echo "<script>
				alert('Successfully Delete Course')
				window.location.href='test1_process3.php';
			</script>";
	}
}
?>

<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
    <head>
         <title>Select Course</title>
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
        <?php //include('navi.php') ?>
		<br>
		<br>
		<div class="row">
			<div class="col-lg-1">
			</div>
            <div class="col-lg-10">
				<section class="panel panel-primary panel-transparent">
					<div class="panel-body">
						<div class="row">
						  <div class="col-lg-3">
							
						  </div>
						  <div class="col-lg-6">
							<h1 style="color:#ffffff;font-weight:bold" align="center">Career Interest Test - Select Course</h1>
						  </div>
						  <div class="col-lg-3">
							 <a href="examdetails_enterd.php"><button type="button" class="btn btn-lg btn-success btn-block">Education Qualification</button></a>
						  </div>
						</div>
					</div>
				</section>
			</div>
		</div>
		
		<?php
		if($noofselectcourse<=3){
		?>
			<div class="row">		  
				<div class="col-lg-1">
				</div>
				<div class="col-lg-10">
					<section class="panel panel-primary panel-transparent">
						<div class="panel-body">
							<table class="table table-hover table-bordered" style="background-color:#79ed37;font-weight:bold" width="100%">
							<?php
							$s=1;
							$you_course=0;
							$sql1="SELECT * FROM  student_test01_result_details WHERE studenttestmas_key='$student_testmas_key' 
																				  AND student_key='$ses_ukey' 
																				  AND finact=0 
																				  ORDER BY result DESC";
							$result1=mysqli_query($link,$sql1);
							while($row1=mysqli_fetch_array($result1)){
								
								if($s<=2){
									$sql4="SELECT * FROM test1_area_master WHERE test1_area_master_key='$row1[test1_areamas_key]' AND finact=0";
									$result4=mysqli_query($link,$sql4);
									while($row4=mysqli_fetch_array($result4)){
										$area_name=$row4['area_name'];
									}
									
									$sql2="SELECT * FROM course_master WHERE test1_areamas_key='$row1[test1_areamas_key]' AND finact=0";
									$result2=mysqli_query($link,$sql2);
									while($row2=mysqli_fetch_array($result2)){
										
										$allresult_student=0;
										$allresult_course=0;
										
										$sql5="SELECT * FROM course_qualification_details WHERE course_key='$row2[coursemas_key]' AND finact=0";
										$result5=mysqli_query($link,$sql5);
										$allresult_course=mysqli_num_rows($result5);
										while($row5=mysqli_fetch_array($result5)){
											
											$sql6="SELECT * FROM  student_qualification_details INNER JOIN student_exam_details ON student_qualification_details.student_exam_details_key=student_exam_details.student_exam_key
																								WHERE student_qualification_details.student_key='$ses_ukey'
																								  AND student_exam_details.exam_key='$row5[exam_key]'
																								  AND student_qualification_details.examsubject_mas_key='$row5[examsubject_mas_key]'
																								  AND student_qualification_details.creditpoint_key<='$row5[creditpoint_key]'
																								  AND student_qualification_details.finact=0
																								  AND student_exam_details.finact=0";
											$result6=mysqli_query($link,$sql6);
											if(mysqli_num_rows($result6)>0){
												$allresult_student++;
											}
										}
										
										if($allresult_course==$allresult_student){
											
											$you_course++;
											echo '<tr>';
												echo '<td>'.$area_name.'</td>';
												echo '<td>'.$row2['course_type'].'</td>';
												echo '<td>'.$row2['course_level'].'</td>';
												echo '<td>'.$row2['course_nme'].'</td>';
												echo '<td>';
													$sql14="SELECT * FROM  job_master INNER JOIN course_careerpath_details ON job_master.jobmas_key=course_careerpath_details.career_key
																					    WHERE course_careerpath_details.course_key='$row2[coursemas_key]'
																						 AND course_careerpath_details.finact=0
																						 ORDER BY job_master.jobname ASC";
													$result14=mysqli_query($link,$sql14);
													while($row14=mysqli_fetch_array($result14)){
														echo ''.$row14['jobname'].'<br>';
													}
												echo '</td>';
												echo '<td><a href="test1_process3.php?cs='.$row2['coursemas_key'].'"><button class="btn btn-sm btn-primary btn-block">Select</button></a></td>';
											echo '</tr>';
										}
									}
								}
								$s++;
							}
							?>
							
							<?php
							if($you_course<1){
								echo '<tr>';
									echo '<td colspan="6">sorry we have not provide courses matching to your interest. please visit any other technical college or other institute.</td>';
								echo '</tr>';
							}
							?>
							</table>
						</div>
					</section>
				</div>
			</div>
		<?php
		}
		?>
		
		<br>
		
		<?php
		if($noofselectcourse>0){
		?>
			<div class="row">		  
				<div class="col-lg-1">
				</div>
				<div class="col-lg-10">
					<section class="panel panel-primary panel-transparent">
						<div class="panel-body">
							<h1 align="center">Selected Course</h1>
							<table class="table table-hover table-bordered" style="background-color:#79ed37;font-weight:bold" width="100%">
								<?php
								$n=0;
								$sql9="SELECT * FROM student_newselected_course_details INNER JOIN course_master ON student_newselected_course_details.course_key=course_master.coursemas_key
																				  WHERE student_newselected_course_details.student_key='$ses_ukey' 
																				  AND student_newselected_course_details.student_testmas_key='$student_testmas_key' 
																				  AND student_newselected_course_details.test_type='Test01' 
																				  AND student_newselected_course_details.finact=0 
																				  ORDER BY student_newselected_course_details.student_newselected_course_details_key ASC";
								$result9=mysqli_query($link,$sql9);
								while($row9=mysqli_fetch_array($result9)){
									$n++;
									echo '<tr>';
												echo '<td>'.$n.'</td>';
												echo '<td>'.$row9['course_type'].'</td>';
												echo '<td>'.$row9['course_level'].'</td>';
												echo '<td>'.$row9['course_nme'].'-'.$row9['batch_nme'].' batch</td>';
												echo '<td>';
													$sql13="SELECT * FROM  job_master INNER JOIN course_careerpath_details ON job_master.jobmas_key=course_careerpath_details.career_key
																					    WHERE course_careerpath_details.course_key='$row9[coursemas_key]'
																						 AND course_careerpath_details.finact=0
																						 ORDER BY job_master.jobname ASC";
													$result13=mysqli_query($link,$sql13);
													while($row13=mysqli_fetch_array($result13)){
														echo ''.$row13['jobname'].'<br>';
													}
												echo '</td>';
												echo '<td><a href="test1_process3.php?csd='.$row9['coursemas_key'].'"><button class="btn btn-sm btn-danger btn-block">Delete</button></a></td>';
									echo '</tr>';
								}
								?>
							</table>
						</div>
					</section>
				</div>
			</div>
			<br>
		
			<div class="row">
				<div class="col-lg-1">
				</div>
				<div class="col-lg-10">
					<section class="panel panel-primary panel-transparent">
						<div class="panel-body">
							<div class="row">
							  <div class="col-lg-3">
							  </div>
							  <div class="col-lg-6">
							  </div>
							  <div class="col-lg-3">
								<a href="home.php"><button type="button" class="btn btn-lg btn-success btn-block">Finish</button></a>
							  </div>
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
	
    </body>
</html>