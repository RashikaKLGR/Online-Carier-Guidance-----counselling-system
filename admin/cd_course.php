<?php
include 'conn.php';	
include 'session_handler.php';	
//error_reporting(0);	
?>

<?php
$cur_dte=date("Y-m-d");
?>

<?php
	$sql1="SELECT * FROM course_master WHERE coursemas_key='$_GET[cr]' AND finact=0";
	$result1 = mysqli_query($link,$sql1);
    while($row1=mysqli_fetch_array($result1)){
		$course_type=$row1['course_type'];
		$course_level=$row1['course_level'];
		$course_nme=$row1['course_nme'];
		
		$test1_areamas_key=$row1['test1_areamas_key'];
		$test2_areamas_key=$row1['test2_areamas_key'];
	}

	if(isset($_POST['btn_delete'])){
		$sql2="UPDATE course_master SET finact=1 WHERE coursemas_key='$_GET[cr]' AND finact=0";
		if(mysqli_query($link,$sql2)){
			echo "<script>
				alert('Sucessfully Delete Course.');
				window.location.href='cd_coursemenu.php';
			</script>";
		}
	}
	
	if(isset($_POST['btn_subjectadd'])){
		$a1=$_POST['sele_exam'];
		$a2=$_POST['sele_subject'];
		$a3=$_POST['sele_grade'];
		
		$sql6="SELECT * FROM course_qualification_details WHERE course_key='$_GET[cr]' AND examsubject_mas_key='$a2' AND creditpoint_key='$a3' AND finact=0";
		$result6 = mysqli_query($link,$sql6);
		if(mysqli_num_rows($result6)==0){
			$sql7="INSERT INTO course_qualification_details (finact,status,coursequalification_key,course_key,exam_key,examsubject_mas_key,creditpoint_key,act_person)
													 VALUES (0,'A',NULL,'$_GET[cr]','$a1','$a2','$a3','$ses_ukey')";
			if(mysqli_query($link,$sql7)){
				echo "<script>
					alert('Sucessfully Added Qualification.');
					window.location.href='cd_course.php?cr=$_GET[cr]';
				</script>";
			}
		}
	}
	
	if(isset($_GET['cqd'])){
		$sql8="UPDATE course_qualification_details SET finact=1 WHERE coursequalification_key='$_GET[cqd]' AND finact=0";
		if(mysqli_query($link,$sql8)){
			echo "<script>
				alert('Sucessfully Delete Qualification.');
				window.location.href='cd_course.php?cr=$_GET[cr]';
			</script>";
		}
	}
	
	if(isset($_POST['btn_selectedarea1'])){
		$sele_test1area=$_POST['sele_test1area'];
		
		$sql12="SELECT * FROM test1_area_master WHERE test1_area_master_key='$sele_test1area' AND finact=0";
		$result12 = mysqli_query($link,$sql12);
		while($row12=mysqli_fetch_array($result12)){
			$area_name1=$row12['area_name'];
		}
		
		$sql11="UPDATE course_master SET test1_areamas_key='$sele_test1area',test1_areamas_name='$area_name1' WHERE coursemas_key='$_GET[cr]' AND finact=0";
		if(mysqli_query($link,$sql11)){
			echo "<script>
				alert('Sucessfully Select Area 01 Test.');
				window.location.href='cd_course.php?cr=$_GET[cr]';
			</script>";
		}
	}
	
	if(isset($_POST['btn_selectedarea2'])){
		$sele_test2area=$_POST['sele_test2area'];
		
		$sql13="SELECT * FROM test2_area_master WHERE test2_area_master_key='$sele_test2area' AND finact=0";
		$result13 = mysqli_query($link,$sql13);
		while($row13=mysqli_fetch_array($result13)){
			$area_name2=$row13['area_name'];
		}
		
		$sql14="UPDATE course_master SET test2_areamas_key='$sele_test2area',test2_areamas_name='$area_name2' WHERE coursemas_key='$_GET[cr]' AND finact=0";
		if(mysqli_query($link,$sql14)){
			echo "<script>
				alert('Sucessfully Select Area 02 Test.');
				window.location.href='cd_course.php?cr=$_GET[cr]';
			</script>";
		}
	}
	
	if(isset($_POST['btn_areaupdate01'])){
		$sf1=$_POST['sele_test1areaupd'];
		
		$sql19="SELECT * FROM test1_area_master WHERE test1_area_master_key='$sf1' AND finact=0";
		$result19=mysqli_query($link,$sql19);
		while($row19=mysqli_fetch_array($result19)){
			$area01_nme=$row19['area_name'];	
		}
		$sql20="UPDATE course_master SET test1_areamas_key='$sf1',test1_areamas_name='$area01_nme' WHERE coursemas_key='$_GET[cr]' AND finact=0";
		if(mysqli_query($link,$sql20)){
			echo "<script>
				alert('Sucessfully Select Area 01 Test.');
				window.location.href='cd_course.php?cr=$_GET[cr]';
			</script>";
		}
	}
	
	if(isset($_POST['btn_areaupdate02'])){
		$sf2=$_POST['sele_test2areaupd'];
		
		$sql21="SELECT * FROM test2_area_master WHERE test2_area_master_key='$sf2' AND finact=0";
		$result21=mysqli_query($link,$sql21);
		while($row21=mysqli_fetch_array($result21)){
			$area02_nme=$row21['area_name'];	
		}
		$sql22="UPDATE course_master SET test2_areamas_key='$sf2',test2_areamas_name='$area02_nme' WHERE coursemas_key='$_GET[cr]' AND finact=0";
		if(mysqli_query($link,$sql22)){
			echo "<script>
				alert('Sucessfully Select Area 02 Test.');
				window.location.href='cd_course.php?cr=$_GET[cr]';
			</script>";
		}
	}
	
	if(isset($_POST['btn_selectetcareer'])){
		$a1=$_POST['sele_careerpath'];
		
		
		$sql6="SELECT * FROM course_careerpath_details WHERE course_key='$_GET[cr]' AND career_key='$a1' AND finact=0";
		$result6 = mysqli_query($link,$sql6);
		if(mysqli_num_rows($result6)==0){
			$sql7="INSERT INTO course_careerpath_details(finact,status,coursecareerpathdetail_key,course_key,career_key)
													 VALUES (0,'A',NULL,'$_GET[cr]','$a1')";
			if(mysqli_query($link,$sql7)){
				echo "<script>
					alert('Sucessfully Added Career Path');
					window.location.href='cd_course.php?cr=$_GET[cr]';
				</script>";
			}
		}
	}
		
	if(isset($_GET['cro'])){
		$sql8="UPDATE course_careerpath_details SET finact=1 WHERE coursecareerpathdetail_key='$_GET[cro]' AND finact=0";
		if(mysqli_query($link,$sql8)){
			echo "<script>
				alert('Sucessfully Delete Career Path.');
				window.location.href='cd_course.php?cr=$_GET[cr]';
			</script>";
		}
	}
	
?>

<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course</title>

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
		
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

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
			.rounded-circle{
				width: 100px;
				height: 100px;
			}
	
		</style>   

</head>
<body class="bc" style="background-position:center;
            background-attachment:fixed;
            background-size:100% 100%; background-image: url(images/a2.jpg);">
     <?php include('navi.php') ?>
		<br>
		<br>
		<br>
		<br>
        
		<div class="row">
			<div class="col-lg-3">
			
			</div>
            <div class="col-lg-6">
				<section class="panel panel-primary panel-transparent">
					<div class="panel-body">
						<table width="100%">
							<tr>
								<td width="50%">
									<h1 style="font-size:17px;font-weight:bold">Course Type </h1>
								</td>
								<td width="50%">
									<h1 style="font-size:17px;font-weight:bold">: <?php echo $course_type; ?></h1>
								</td>
							</tr>
							<tr>
								<td width="50%">
									<h1 style="font-size:17px;font-weight:bold">Course Level </h1>
								</td>
								<td width="50%">
									<h1 style="font-size:17px;font-weight:bold">: <?php echo $course_level; ?></h1>
								</td>
							</tr>
							<tr>
								<td width="50%">
									<h1 style="font-size:17px;font-weight:bold">Course Name </h1>
								</td>
								<td width="50%">
									<h1 style="font-size:17px;font-weight:bold">: <?php echo $course_nme; ?></h1>
								</td>
							</tr>
						</table>
						
						<br>
						<form name="f1" method="post">
							<button type="submit" name="btn_delete" class="btn btn-lg btn-danger btn-block">Delete</button>
						</form>
					</div>
				</section>
			</div>
		</div>
		
		<div class="row">
			
            <div class="col-lg-6">
				<section class="panel panel-primary panel-transparent">
					<div class="panel-body">
						<form name="f2" method="post">
							<div class="form-group">
							  <label><font color="red">&lowast;</font>Exam</label>
								<select class="form-control input-sm" name="sele_exam" onchange="this.form.submit()"  required>
										<?php
										    $sql1="SELECT * FROM exam_master WHERE finact=0";
											$result1=mysqli_query($link,$sql1);
											$option1 ="";
											while($row1=mysqli_fetch_array($result1)){
												$option1 = $option1."<option value=$row1[exammas_key]>$row1[exam_name] - $row1[stream]</option>";			
											}
											
											if(isset($_POST['sele_exam'])){
												$sql2="SELECT * FROM  exam_master WHERE exammas_key='$_POST[sele_exam]' AND finact=0";
												$result2=mysqli_query($link,$sql2);
												$option2 ="";
												while($row2=mysqli_fetch_array($result2)){
													$option2 = $option2."<option value=$row2[exammas_key]>$row2[exam_name] - $row2[stream]</option>";			
												}
												echo $option2;
												echo $option1;
											}
											else{
												echo "<option value='' disabled selected hidden>Please Choose.............</option>";
												echo $option1;
											}
										?>
								</select>
							</div>
							
							<div class="form-group">
								<label><font color="red">&lowast;</font>Subject</label>
								<select class="form-control input-sm" name="sele_subject" onchange="this.form.submit()" required>
										<?php
										    $sql3="SELECT * FROM examsubject_master WHERE exammas_key='$_POST[sele_exam]' AND finact=0";
											$result3=mysqli_query($link,$sql3);
											$option3 ="";
											while($row3=mysqli_fetch_array($result3)){
												$option3 = $option3."<option value=$row3[examsubjectmas_key]>$row3[subject_name]</option>";			
											}
											
											if(isset($_POST['sele_subject'])){
												$sql4="SELECT * FROM examsubject_master WHERE exammas_key='$_POST[sele_exam]' AND examsubjectmas_key='$_POST[sele_subject]' AND finact=0";
												$result4=mysqli_query($link,$sql4);
												$option4 ="";
												while($row4=mysqli_fetch_array($result4)){
													$option4 = $option4."<option value=$row4[examsubjectmas_key]>$row4[subject_name]</option>";			
												}
												echo $option4;
												echo $option3;
											}
											else{
												echo "<option value='' disabled selected hidden>Please Choose.............</option>";
												echo $option3;
											}
										?>
								</select>
							</div>
							
							<div class="form-group">
							  <label><font color="red">&lowast;</font>Grade</label>
							  <select class="form-control input-sm" name="sele_grade" required>
										<?php
										    $sql5="SELECT * FROM creditpoint_master WHERE finact=0";
											$result5=mysqli_query($link,$sql5);
											$option5 ="";
											while($row5=mysqli_fetch_array($result5)){
												$option5 = $option5."<option value=$row5[creditpointmas_key]>$row5[cedit_name]</option>";			
											}
											
											echo "<option value='' disabled selected hidden>Please Choose.............</option>";
											echo $option5;
											
										?>
								</select>
							</div>
							<button type="submit" name="btn_subjectadd" class="btn btn-lg btn-success btn-block">Add Qualification</button>
						</form>
						<br>
						<br>
						
						<h3 align="center"> Seleted Area of Career Interest Test</h3>
						<form name="f2" method="post">
							<div class="form-group">
								  <label><font color="red">&lowast;</font>Seleted Area of Career Interest Test</label>
								  <select class="form-control input-sm" name="sele_test1area" required>
											<?php
												$sql9="SELECT * FROM test1_area_master WHERE finact=0";
												$result9=mysqli_query($link,$sql9);
												$option9 ="";
												while($row9=mysqli_fetch_array($result9)){
													$option9 = $option9."<option value=$row9[test1_area_master_key]>$row9[area_name]</option>";			
												}
												
												echo "<option value='' disabled selected hidden>Please Choose.............</option>";
												echo $option9;
												
											?>
									</select>
							</div>
							<button type="submit" name="btn_selectedarea1" class="btn btn-lg btn-success btn-block">Add Area of Career Interest Test</button>
						</form>
						<br>
						<br>
						
						<h3 align="center"> Seleted Area of Career Key Test</h3>
						<form name="f3" method="post">
							<div class="form-group">
								  <label><font color="red">&lowast;</font>Seleted Area of Career Key Test</label>
								  <select class="form-control input-sm" name="sele_test2area" required>
											<?php
												$sql10="SELECT * FROM test2_area_master WHERE finact=0";
												$result10=mysqli_query($link,$sql10);
												$option10 ="";
												while($row10=mysqli_fetch_array($result10)){
													$option10 = $option10."<option value=$row10[test2_area_master_key]>$row10[area_name]</option>";			
												}
												
												echo "<option value='' disabled selected hidden>Please Choose.............</option>";
												echo $option10;
												
											?>
									</select>
							</div>
							<button type="submit" name="btn_selectedarea2" class="btn btn-lg btn-success btn-block">Add Area of Career Key Test</button>
						</form>
						<br>
						<br>
						<h3 align="center"> Select Career Path</h3>
						<form name="f3" method="post">
							<div class="form-group">
								  <label><font color="red">&lowast;</font>Select Career Path</label>
								  <select class="form-control input-sm" name="sele_careerpath" required>
											<?php
												$sql10="SELECT * FROM job_master WHERE finact=0";
												$result10=mysqli_query($link,$sql10);
												$option10 ="";
												while($row10=mysqli_fetch_array($result10)){
													$option10 = $option10."<option value=$row10[jobmas_key]>$row10[jobname]</option>";			
												}
												
												echo "<option value='' disabled selected hidden>Please Choose.............</option>";
												echo $option10;
												
											?>
									</select>
							</div>
							<button type="submit" name="btn_selectetcareer" class="btn btn-lg btn-success btn-block">Add Career Path</button>
						</form>
					</div>
				</section>
			</div>
			<div class="col-lg-6">
				<section class="panel panel-primary panel-transparent">
					<div class="panel-body">
						<table class="table table-striped table-bordered display" id="example" width="100%">
							<thead>
								<tr>
									<th width="50%">Subject</th>
									<th width="30%">Credit</th>
									<th width="20%">Delete</th>
								</tr>
							</thead>
							<tbody>
								
								<?php
									$sql4="SELECT * FROM  course_qualification_details INNER JOIN examsubject_master ON course_qualification_details.examsubject_mas_key=examsubject_master.examsubjectmas_key 
																					   INNER JOIN creditpoint_master ON course_qualification_details.creditpoint_key=creditpoint_master.creditpointmas_key
																					    WHERE course_qualification_details.course_key='$_GET[cr]'
																						 AND course_qualification_details.finact=0
																						 AND creditpoint_master.finact=0
																						 AND examsubject_master.finact=0
																						ORDER BY course_qualification_details.coursequalification_key ASC";
									$result4 = mysqli_query($link,$sql4);
									while($row4=mysqli_fetch_array($result4)){
										
										echo "<tr>
												<td width='50%'>".$row4['exam_name']." ".$row4['stream']." - ".$row4['subject_name']."</td>
												<td width='30%' align='center'>".$row4['cedit_name']."</td>
												<td width='20%'>
													<a href='cd_course.php?cr=".$_GET['cr']."&cqd=".$row4['coursequalification_key']."'><button type='button' class='btn btn-sm btn-danger btn-block'>Delete</button></a>
												</td>
											</tr>";
									}
								?>
								
							</tbody>
						</table>
						<br>
						<br>
						<form name="f4" method="post">
							<table class="table table-striped table-bordered display" width="100%">
								<thead>
									<tr>
										<th width="40%">Test</th>
										<th width="40%">Area</th>
										<th width="20%">Delete</th>
									</tr>
								</thead>
								<tbody>
									
									<?php
										if($test1_areamas_key!=null){
											
											echo "<tr>
													<td width='40%'>Career Interest Test</td>";
											 echo "<td width='40%' align='center'>";
													echo "<select class='form-control input-sm' name='sele_test1areaupd' required>";
													
													$sql15="SELECT * FROM test1_area_master WHERE finact=0";
													$result15=mysqli_query($link,$sql15);
													$option15 ="";
													while($row15=mysqli_fetch_array($result15)){
														$option15 = $option15."<option value=$row15[test1_area_master_key]>$row15[area_name]</option>";			
													}
													
													$sql16="SELECT * FROM test1_area_master WHERE test1_area_master_key='$test1_areamas_key' AND finact=0";
													$result16=mysqli_query($link,$sql16);
													$option16 ="";
													while($row16=mysqli_fetch_array($result16)){
														$option16 = $option16."<option value=$row16[test1_area_master_key]>$row16[area_name]</option>";			
													}
													
													echo $option16;
													echo $option15;
												echo "</select>";  
											 echo "</td>";
											 echo "<td width='20%'>
														<button type='submit' name='btn_areaupdate01' class='btn btn-sm btn-success btn-block'>Update</button>
													</td>
												</tr>";
										}
										
										if($test2_areamas_key!=null){
											
											echo "<tr>
													<td width='40%'>Career Key Test</td>";
											 echo "<td width='40%' align='center'>";
												echo "<select class='form-control input-sm' name='sele_test2areaupd' required>";
													
													$sql17="SELECT * FROM test2_area_master WHERE finact=0";
													$result17=mysqli_query($link,$sql17);
													$option17 ="";
													while($row17=mysqli_fetch_array($result17)){
														$option17 = $option17."<option value=$row17[test2_area_master_key]>$row17[area_name]</option>";			
													}
													
													$sql18="SELECT * FROM test2_area_master WHERE test2_area_master_key='$test2_areamas_key' AND finact=0";
													$result18=mysqli_query($link,$sql18);
													$option18 ="";
													while($row18=mysqli_fetch_array($result18)){
														$option18 = $option18."<option value=$row18[test2_area_master_key]>$row18[area_name]</option>";			
													}
													
													echo $option18;
													echo $option17;
													
												echo "</select>";
											 echo "</td>";
											 echo "<td width='20%'>
														<button type='submit' name='btn_areaupdate02' class='btn btn-sm btn-success btn-block'>Update</button>
													</td>
												</tr>";
										}
									?>
									
								</tbody>
							</table>
						</form>
						<br>
						<br>
						
						<table class="table table-striped table-bordered display" id="example" width="100%">
							<thead>
								<tr>
									<th width="80%">Career Path</th>
									<th width="20%">Delete</th>
								</tr>
							</thead>
							<tbody>
								
								<?php
									$sql4="SELECT * FROM  job_master INNER JOIN course_careerpath_details ON job_master.jobmas_key=course_careerpath_details.career_key
																					    WHERE course_careerpath_details.course_key='$_GET[cr]'
																						 AND course_careerpath_details.finact=0
																						 ORDER BY job_master.jobname ASC";
									$result4 = mysqli_query($link,$sql4);
									while($row4=mysqli_fetch_array($result4)){
										
										echo "<tr>
												<td width='80%'>".$row4['jobname']." </td>
												<td width='20%'>
													<a href='cd_course.php?cr=".$_GET['cr']."&cro=".$row4['coursecareerpathdetail_key']."'><button type='button' class='btn btn-sm btn-danger btn-block'>Delete</button></a>
												</td>
											</tr>";
									}
								?>
								
							</tbody>
						</table>
					</div>
				</section>
			</div>
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
<?php
mysqli_close($link);
?>
</html>
