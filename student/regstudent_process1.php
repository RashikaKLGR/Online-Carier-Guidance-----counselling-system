<?php
error_reporting(0);
include 'conn.php';		
include 'session_handler.php';
?>
<?php



$cur_dte=date("Y-m-d");
$back_dte=date("Y-m-d",strtotime("-1 days"));

?>

<?php
if(isset($_POST['btn_add'])){
	$nm1=$_POST['txt_studentno'];
	$nm2=$_POST['sele_course'];
	$nm3=$_POST['sele_batch'];
	$nm4=$_POST['sele_status'];
	
	$sql8="SELECT * FROM  course_batch_details WHERE course_batch_details_key='$nm3' AND finact=0";
	$result8=mysqli_query($link,$sql8);
	while($row8=mysqli_fetch_array($result8)){
		$batch_nme=$row8['batch_nme'];
	}
	
	$sql1="SELECT * FROM student_course_details WHERE student_key='$ses_ukey' AND course_key='$nm2' AND finact=0";
	$result1 = mysqli_query($link,$sql1);
	if(mysqli_num_rows($result1)==0){
		$sql3="INSERT INTO student_course_details (finact,status,studentcoursedetail_key,student_key,student_id,course_key,coursebatch_detail_key,batch,complete_status)
										VALUES (0,'A',NULL,'$ses_ukey','$nm1','$nm2','$nm3','$batch_nme','$nm4')";
		if(mysqli_query($link,$sql3)){
			
			echo "<script>
				alert('Sucessfully Added Your Course.');
				window.location.href='regstudent_process1.php';
			</script>";
		}
		
	}
	else{
		echo "<script>
				alert('Sorry, Already Added this Course Details.');
				
			</script>";
	}
}

if(isset($_GET['dl'])){
	
		$sql5="UPDATE student_course_details SET  finact=1 WHERE studentcoursedetail_key='$_GET[dl]' AND finact=0";
		if(mysqli_query($link,$sql5)){
			
			echo "<script>
				alert('Sucessfully Delete Your Course.');
				window.location.href='regstudent_process1.php';
			</script>";
		}
}
?>

<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
    <head>
         <title>Final Step</title>
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
							<a href="process1.php"><button type="button" class="btn btn-lg btn-danger btn-block">Back</button></a>
						  </div>
						  <div class="col-lg-6">
							<h1 style="color:#ffffff;font-weight:bold" align="center">Final Step</h1>
						  </div>
						  <div class="col-lg-3">
							
						  </div>
					</div>
				</section>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-2">
			</div>
            <div class="col-lg-8">
				<section class="panel panel-primary panel-transparent">
					<div class="panel-body">
						<form name="f1" method="post">
							<div class="form-group">
                                <label><font color="red">&lowast;</font>Student No</label>
                                <input type="text" class="form-control input-sm" name="txt_studentno" placeholder="Please Enter Student No" required value="<?php if(isset($_POST['txt_studentno'])){ echo $_POST['txt_studentno']; } ?>">
							</div>
							<div class="form-group">
								<label><font color="red">&lowast;</font>Course</label>
								<select class="form-control input-sm" name="sele_course" required onchange="this.form.submit()">
										<?php
										    $sql1="SELECT * FROM course_master WHERE finact=0";
											$result1=mysqli_query($link,$sql1);
											$option1 ="";
											while($row1=mysqli_fetch_array($result1)){
												$option1 = $option1."<option value=$row1[coursemas_key]>$row1[course_nme]</option>";			
											}
											
											if(isset($_POST['sele_course'])){
												$sql6="SELECT * FROM course_master WHERE coursemas_key='$_POST[sele_course]' AND finact=0";
												$result6=mysqli_query($link,$sql6);
												$option6 ="";
												while($row6=mysqli_fetch_array($result6)){
													$option6 = $option6."<option value=$row6[coursemas_key]>$row6[course_nme]</option>";			
												}
												echo $option6;
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
                                <label><font color="red">&lowast;</font>Batch</label>
                                <select class="form-control input-sm" name="sele_batch" required>
										<?php
										    $sql7="SELECT * FROM  course_batch_details WHERE course_key='$_POST[sele_course]' AND batchapplyclose_status=1 AND finact=0";
											$result7=mysqli_query($link,$sql7);
											$option7 ="";
											while($row7=mysqli_fetch_array($result7)){
												$option7 = $option7."<option value=$row7[course_batch_details_key]>$row7[batch_nme]</option>";			
											}
											
											
											echo "<option value='' disabled selected hidden>Please Choose.............</option>";
											echo $option7;
											
										?>
								</select>
							</div>
							<div class="form-group">
								<label><font color="red">&lowast;</font>Status</label>
								<select class="form-control input-sm" name="sele_status" required>
										<?php
										  
											echo "<option value='' disabled selected hidden>Please Choose.............</option>";
											echo "<option value='Complete'>Complete</option>";
											echo "<option value='Ongoing'>Ongoing</option>";
											echo "<option value='Incomplete'>Incomplete</option>";
											
										?>
								</select>
							</div>
							<button type="submit" name="btn_add" class="btn btn-lg btn-success btn-block">Add Course Details</button>
						</form>
						<br>
						
						<table width="100%" class="table table-striped table-bordered display" border="1">
							<?php
							$sql4="SELECT * FROM student_course_details INNER JOIN course_master ON student_course_details.course_key=course_master.coursemas_key
																			WHERE student_course_details.student_key='$ses_ukey' 
																			AND student_course_details.finact=0";
							$result4=mysqli_query($link,$sql4);
							while($row4=mysqli_fetch_array($result4)){
								
							?>
									
										<tr style="font-weight:bold;">
											<td width="15%"> <?php echo $row4['student_id']; ?></td>
											<td width="35%"> <?php echo $row4['course_nme']; ?></td>
											<td width="15%"> <?php echo $row4['batch']; ?></td>
											<td width="20%"> <?php echo $row4['complete_status']; ?></td>
											<td width="15%">
												<a href="regstudent_process1.php?dl=<?php echo $row4['studentcoursedetail_key']; ?>"><button class="btn btn-sm btn-danger btn-block">Delete</button></a>
											</td>
										</tr>
									
							<?php
							}
							?>
						</table>
						
						
					</div>
				</section>
			</div>
		</div>
		
		<?php
		$sql5="SELECT * FROM student_course_details INNER JOIN course_master ON student_course_details.course_key=course_master.coursemas_key
																			WHERE student_course_details.student_key='$ses_ukey' 
																			AND student_course_details.finact=0";
		$result5=mysqli_query($link,$sql5);
		if(mysqli_num_rows($result5)>0){
		?>
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
	
			<script type="text/javascript" charset="utf-8">
				
					$(window).scroll(function() {
							sessionStorage.scrollTop = $(this).scrollTop();
					});
						
					$(document).ready(function() {
						/*<?php
							$sql14="SELECT * FROM  item_master INNER JOIN price_master ON item_master.itemmaster_key = price_master.itemmas_key WHERE item_master.finact=0 AND price_master.finact=0";
							$result14 = mysqli_query($link,$sql14);
							while($row14=mysqli_fetch_array($result14)){
								$price_key=$row14['pricemas_key'];
								$item_key=$row14['itemmas_key'];

								$sql1="SELECT SUM(qty) AS pulsqty FROM stock_details WHERE item_mas_key='$item_key' AND price_mas_key='$price_key' AND change_status=1 AND finact=0";
								$result1 = mysqli_query($link,$sql1);
								while($row1=mysqli_fetch_array($result1)){	
									$pulsqty=$row1['pulsqty'];
								}
																							
								$sql2="SELECT SUM(qty) AS minzeqty FROM stock_details WHERE item_mas_key='$item_key' AND price_mas_key='$price_key' AND change_status=0 AND finact=0";
								$result2 = mysqli_query($link,$sql2);
								while($row2=mysqli_fetch_array($result2)){	
									$minzeqty=$row2['minzeqty'];
								}
							
								$avs=$pulsqty-$minzeqty;
						?>
							var data1a = <?php echo $price_key; ?>;
							var data2a = <?php echo $avs; ?>;
							alert(data1a);
							$.ajax({
								type: "POST", 
								url: "update_stockjquery.php", 
								data: { s1 : data1a, s2 : data2a};
								dataType: "json",
								success: function(result){ 
											 
								}
							});
						<?php
						}
						?>*/
					});	
					
					/*var intervalId = window.setInterval(function(){
					  //alert("Success");
					  <?php
						$sql14="SELECT * FROM  item_master INNER JOIN price_master ON item_master.itemmaster_key = price_master.itemmas_key WHERE item_master.finact=0 AND price_master.finact=0";
						$result14 = mysqli_query($link,$sql14);
						while($row14=mysqli_fetch_array($result14)){
							$price_key=$row14['pricemas_key'];
							$item_key=$row14['itemmas_key'];

							$sql1="SELECT SUM(qty) AS pulsqty FROM stock_details WHERE item_mas_key='$item_key' AND price_mas_key='$price_key' AND change_status=1 AND finact=0";
							$result1 = mysqli_query($link,$sql1);
							while($row1=mysqli_fetch_array($result1)){	
								$pulsqty=$row1['pulsqty'];
							}
																						
							$sql2="SELECT SUM(qty) AS minzeqty FROM stock_details WHERE item_mas_key='$item_key' AND price_mas_key='$price_key' AND change_status=0 AND finact=0";
							$result2 = mysqli_query($link,$sql2);
							while($row2=mysqli_fetch_array($result2)){	
								$minzeqty=$row2['minzeqty'];
							}
							
							$avs=$pulsqty-$minzeqty;
							
							$sql12="UPDATE price_master SET avb='$avs' WHERE pricemas_key='$price_key'";
							mysqli_query($link,$sql12);
						}
					  
					  ?>
					  
					}, 9000);*/
					
			</script>
    </body>
</html>