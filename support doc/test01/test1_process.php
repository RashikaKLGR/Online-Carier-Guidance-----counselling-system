<?php
error_reporting(0);
include 'conn.php';		
include 'session_handler.php';
$cur_dte=date("Y-m-d");
?>
<?php
if(isset($_POST['btn_confirm'])){
	$sql5="SELECT * FROM student_test_master WHERE student_key='$ses_ukey' AND test_dte='$cur_dte' AND test_type='Test01' AND finact=0";
	$result5 = mysqli_query($link,$sql5);
	if(mysqli_num_rows($result5)==0){
		$sql6="INSERT INTO student_test_master(finact,status,student_testmas_key,test_dte,student_key,test_type,complete_status)
										VALUES(0,'A',NULL,'$cur_dte','$ses_ukey','Test01',1)";
		mysqli_query($link,$sql6);
		
		$sql7="SELECT * FROM student_test_master WHERE student_key='$ses_ukey' AND test_dte='$cur_dte' AND test_type='Test01' AND finact=0";
		$result7 = mysqli_query($link,$sql7);
		while($row7=mysqli_fetch_array($result7)){
			$student_testmas_key=$row7['student_testmas_key'];	
		}
		
		$sql1="SELECT * FROM test1_question_master WHERE finact=0";
		$result1 = mysqli_query($link,$sql1);
		while($row1=mysqli_fetch_array($result1)){
			$chk_question1="chk_question".$row1['test1questionmas_key'];
			
			if(isset($_POST[$chk_question1])){
				$sql2="SELECT * FROM  student_test01_details WHERE studenttestmas_key='$student_testmas_key'
																AND student_key='$ses_ukey'
																AND test1questionmas_key='$_POST[$chk_question1]'
																AND finact=0";
				$result2 = mysqli_query($link,$sql2);
				if(mysqli_num_rows($result2)==0){
					$sql8="INSERT INTO student_test01_details (finact,status,student_test01_details_key,studenttestmas_key,student_key,test1questionmas_key)
					                                   VALUES (0,'A',NULL,'$student_testmas_key','$ses_ukey','$_POST[$chk_question1]')";
					mysqli_query($link,$sql8);
				}
				
				$sql9="UPDATE student_test_master SET complete_status=1 WHERE student_testmas_key='$student_testmas_key' AND finact=0";
				mysqli_query($link,$sql9);
			}
		}
	}
	else{
		$student_testmas_key=$row5['student_testmas_key'];
		
		$sql1="SELECT * FROM test1_question_master WHERE finact=0";
		$result1 = mysqli_query($link,$sql1);
		while($row1=mysqli_fetch_array($result1)){
			$chk_question1="chk_question".$row1['test1questionmas_key'];
			
			if(isset($_POST[$chk_question1])){
				$sql2="SELECT * FROM  student_test01_details WHERE studenttestmas_key='$student_testmas_key'
																AND student_key='$ses_ukey'
																AND test1questionmas_key='$_POST[$chk_question1]'
																AND finact=0";
				$result2 = mysqli_query($link,$sql2);
				if(mysqli_num_rows($result2)==0){
					$sql8="INSERT INTO student_test01_details (finact,status,student_test01_details_key,studenttestmas_key,student_key,test1questionmas_key)
					                                   VALUES (0,'A',NULL,'$student_testmas_key','$ses_ukey','$_POST[$chk_question1]')";
					mysqli_query($link,$sql8);
				}
				
				$sql9="UPDATE student_test_master SET complete_status=1 WHERE student_testmas_key='$student_testmas_key' AND finact=0";
				mysqli_query($link,$sql9);
			}
			else{
				$sql2="SELECT * FROM  student_test01_details WHERE studenttestmas_key='$student_testmas_key'
																AND student_key='$ses_ukey'
																AND test1questionmas_key='$row1[test1questionmas_key]'
																AND finact=0";
				$result2 = mysqli_query($link,$sql2);
				if(mysqli_num_rows($result2)>0){
					$sql8="UPDATE student_test01_details SET finact=1 WHERE studenttestmas_key='$student_testmas_key'
																		AND student_key='$ses_ukey'
																		AND test1questionmas_key='$row1[test1questionmas_key]'
																		AND finact=0";
					mysqli_query($link,$sql8);
				}
			}
		}
		
	}
	
	echo "<script>
		window.location.href='test1_process2.php';
	</script>";
}

?>


<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
    <head>
         <title>Test 01</title>
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
							<a href="unregstudent_process1.php"><button type="button" class="btn btn-lg btn-danger btn-block">Back</button></a>
						  </div>
						  <div class="col-lg-6">
							<h1 style="color:#ffffff;font-weight:bold" align="center">Test 01</h1>
						  </div>
						  <div class="col-lg-3">
							
						  </div>
					</div>
				</section>
			</div>
		</div>
		
		
		<form name="f1" method="post">
			<div class="row">		  
				<?php
				$sql3="SELECT DISTINCT(type) AS distype FROM test1_question_master WHERE finact=0";
				$result3=mysqli_query($link,$sql3);
				while($row3=mysqli_fetch_array($result3)){
				?>
						<div class="col-lg-6">
							<section class="panel panel-primary panel-transparent">
								<div class="panel-body">
									<h2 align="center"><?php echo $row3['distype']; ?></h2>
									
									<table class="table table-hover table-bordered" style="background-color:#79ed37;font-weight:bold" width="100%">
										
											<?php
												$sql4="SELECT * FROM test1_question_master WHERE type='$row3[distype]' AND finact=0";
												$result4 = mysqli_query($link,$sql4);
												while($row4=mysqli_fetch_array($result4)){
													$chk_question="chk_question".$row4['test1questionmas_key'];
													echo "<tr>
															<td width='80%'>".$row4['question_name']."</td>
															<td width='20%'>
																<input type='checkbox'  name='".$chk_question."' value='".$row4['test1questionmas_key']."'>
															</td>
														</tr>";
												}
											?>
											
										
									</table>
								</div>
							</section>
						</div>
				<?php
				}
				?>
			</div>
		
			<div class="row">
				<div class="col-lg-1">
				</div>
				<div class="col-lg-10">
					<section class="panel panel-primary panel-transparent">
						<div class="panel-body">
							
								<button type="submit" name="btn_confirm" class="btn btn-lg btn-success btn-block">Confirm</button></a>
							
						</div>
					</section>
				</div>
			</div>
		</form>
	
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