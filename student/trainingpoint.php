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
 
    $nm1 = $_POST['sele_batch'];
	
	$sql3="SELECT * FROM course_batch_details WHERE course_batch_details_key='$nm1' AND finact=0";
	$result3 = mysqli_query($link,$sql3);
	while($row3=mysqli_fetch_array($result3)){
		$course_keys=$row3['course_key'];
	}

	$sql1="SELECT * FROM student_trainingpoint_master WHERE student_key='$ses_ukey' AND course_key='$course_keys' AND coursebatch_detail_key='$nm1' AND finact=0";
	$result1 = mysqli_query($link,$sql1);
	if(mysqli_num_rows($result1)==0){
	
		$sql4="INSERT INTO student_trainingpoint_master (finact,status,student_trainingpoint_mas_key,student_key,course_key,coursebatch_detail_key) 
								                  VALUES(0,'A',NULL,'$ses_ukey','$course_keys','$nm1')";
		if(mysqli_query($link,$sql4)){
			
			echo "<script>
				alert('Sucessfully Request Training Point.');
				window.location.href='trainingpoint.php';
			</script>";
		}
		
	}
	else{
		echo "<script>
				alert('Sorry!! Already Request Training Point.');
				window.location.href='trainingpoint.php';
			</script>";
		
	}
	
}

?>

<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Traning Point</title>

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
									<div class="form-group">
                                      <label><font color="red">&lowast;</font>Referance Course and Batch</label>
										<select class="form-control input-sm" name="sele_batch" required>
												<?php
												$sql1="SELECT * FROM student_course_details INNER JOIN course_master ON student_course_details.course_key=course_master.coursemas_key  
																								WHERE student_course_details.complete_status='Complete'
																								AND student_course_details.student_key='$ses_ukey'
																								AND student_course_details.finact=0
																								AND course_master.finact=0";
												$result1=mysqli_query($link,$sql1);
												$option1 ="";
												while($row1=mysqli_fetch_array($result1)){
													$option1 = $option1."<option value=$row1[coursebatch_detail_key]>$row1[course_nme] - $row1[batch]</option>";			//Load Reagon Name
												}
												?>
												<option value="" disabled selected hidden>Please Choose.............</option>
                                                <?php echo $option1; ?>    
										</select>
									</div>
									
									<button type="submit" name="btn_add" class="btn btn-lg btn-primary btn-block">Request Training Point</button>
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
						<h1> You Request Training Point </h1>
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
									$sql4="SELECT * FROM student_trainingpoint_master INNER JOIN course_master ON student_trainingpoint_master.course_key=course_master.coursemas_key 
																					  INNER JOIN course_batch_details ON student_trainingpoint_master.coursebatch_detail_key=course_batch_details.course_batch_details_key
																					  WHERE student_trainingpoint_master.student_key='$ses_ukey'
																						AND student_trainingpoint_master.finact=0 
																						AND course_batch_details.finact=0
																						AND course_master.finact=0";
									$result4 = mysqli_query($link,$sql4);
									while($row4=mysqli_fetch_array($result4)){
										
										if($row4['approve_status']==1){
											$backgroudcolorappoint="background-color:#64CCC5;font-weight:bold";
										}
										else{
											$backgroudcolorappoint="background-color:#FF8080;font-weight:bold";
										}
										
										echo "<tr>
												<td width='15%' style='".$backgroudcolorappoint."'>".$row4['sys_enterdte']."</td>
												<td width='25%' style='".$backgroudcolorappoint."'>".$row4['course_nme']."</td>
												<td width='20%' style='".$backgroudcolorappoint."'>".$row4['batch_nme']."</td>";
												if($row4['approve_status']<1){
													echo "<td width='20%' style='".$backgroudcolorappoint."' colspan='2' align='center'>Pending Process</td>";
												}
												else{
													echo "<td width='20%' style='".$backgroudcolorappoint."'>".$row4['training_point_nme']."</td>
														  <td width='20%' style='".$backgroudcolorappoint."'>".$row4['training_point_designation']."</td>";
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
								<h2 style="color:red;font-weight:bold" align="center">You must complete the course for this.</h2>
								
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
