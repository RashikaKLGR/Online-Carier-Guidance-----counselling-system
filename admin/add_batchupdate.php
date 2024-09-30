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
 
    $nm1 = $_POST['sele_course'];
    $nm2 = $_POST['txt_batch'];
    $nm3 = $_POST['sele_finish'];
    
	if($nm3=="Open"){
		$status_batchs=0;
	}
	else{
		$status_batchs=1;
	}
	
	$sql1="SELECT * FROM  course_batch_details WHERE course_key='$nm1' AND batch_nme='$nm2' AND finact=0";
	$result1 = mysqli_query($link,$sql1);
	if(mysqli_num_rows($result1)==0){
	
		$sql4="INSERT INTO course_batch_details (finact,status,course_batch_details_key,course_key,batch_nme,batchapplyclose_status,act_person) 
								          VALUES(0,'A',NULL,'$nm1','$nm2','$status_batchs','$ses_ukey')";
		if(mysqli_query($link,$sql4)){
			
			echo "<script>
				alert('Sucessfully Add Batch.');
				window.location.href='add_batchupdate.php';
			</script>";
		}
		else{
			$message="execute error";
		}
	}
	else{
		echo "<script>
				alert('Sorry, Dupilcate Batch.');
				
			</script>";
	}
}

?>

<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batch Update</title>

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
     <?php include('navi.php') ?>
		<br>
		<br>
		<br>
		<br>
        
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
                                        <label><font color="red">&lowast;</font>Course</label>
										<select class="form-control input-sm" name="sele_course" required>
											<?php
											$sql1="SELECT * FROM course_master WHERE finact=0";
											$result1=mysqli_query($link,$sql1);
											$option1 ="";
											while($row1=mysqli_fetch_array($result1)){
												$option1 = $option1."<option value=$row1[coursemas_key]>$row1[course_nme]</option>";			//Load Reagon Name
											}
											?>
												<option value="" disabled selected hidden>Please Choose.............</option>";
                                                <?php echo $option1; ?>    
										</select>
									</div>
									
									<div class="form-group">
                                      <label><font color="red">&lowast;</font>Batch</label>
                                      <input type="text" class="form-control input-sm" name="txt_batch" placeholder="Please Enter Batch" required>
									</div>
									
									<div class="form-group">
                                        <label><font color="red">&lowast;</font>Status</label>
										<select class="form-control input-sm" name="sele_finish" required>
												<option value="" disabled selected hidden>Please Choose.............</option>
												<option value="Open">Open</option>
                                                <option value="Closed">Closed</option>
										</select>
									</div>
									
									<button type="submit" name="btn_add" class="btn btn-lg btn-primary btn-block">Create Batch</button>
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
						<table class="table table-striped table-bordered display" id="example" width="100%">
							<thead>
								<tr>
									<th width="40%">Course</th>
									<th width="40%">Batch</th>
									<th width="20%">Status</th>
								</tr>
							</thead>
							<tbody>
								
								<?php
									$sql5="SELECT * FROM  course_batch_details INNER JOIN course_master ON course_batch_details.course_key=course_master.coursemas_key 
																				WHERE course_batch_details.finact=0 
																				AND course_master.finact=0
																				ORDER BY course_batch_details.course_batch_details_key DESC";
									$result5 = mysqli_query($link,$sql5);
									while($row5=mysqli_fetch_array($result5)){
										if($row5['batchapplyclose_status']==1){
											$status_batch="Closed";
											$background_batch="background-color:#FF8080;font-weight:bold";
										}
										else{
											$status_batch="Open";
											$background_batch="background-color:#64CCC5;font-weight:bold";
										}
										
										echo "<tr>
												<td width='40%' style='".$background_batch."'>".$row5['course_nme']."</td>
												<td width='40%' style='".$background_batch."'>".$row5['batch_nme']."</td>
												<td width='20%' style='".$background_batch."'>".$status_batch."</td>
												
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
</body>
<?php
mysqli_close($link);
?>
</html>
