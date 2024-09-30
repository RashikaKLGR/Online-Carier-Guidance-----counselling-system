<?php
error_reporting(0);
include 'conn.php';		
include 'session_handler.php';

?>

<?php
$sql3="SELECT * FROM student_test_master WHERE student_key='$ses_ukey' AND test_type='Test02' AND complete_status=1 AND finact=0";
$result3=mysqli_query($link,$sql3);
while($row3=mysqli_fetch_array($result3)){
	$student_testmas_key=$row3['student_testmas_key'];
}


$sql2="SELECT * FROM test2_area_master WHERE finact=0";
$result2=mysqli_query($link,$sql2);
while($row2=mysqli_fetch_array($result2)){
	$numofreslut=0;
	$sql4="SELECT SUM(resuts) AS ttresult FROM student_test02_details INNER JOIN test2_question_master ON student_test02_details.test2questionmas_key=test2_question_master.test2questionmas_key
												WHERE student_test02_details.studenttestmas_key='$student_testmas_key'
												AND student_test02_details.student_key='$ses_ukey'
												AND test2_question_master.test2_areamas_key='$row2[test2_area_master_key]'
												AND student_test02_details.finact=0
												AND test2_question_master.finact=0";
	$result4=mysqli_query($link,$sql4);
	while($row4=mysqli_fetch_array($result4)){
		$numofreslut=$row4['ttresult'];
	}

	$sql5="SELECT * FROM  student_test02_result_details WHERE  studenttestmas_key='$student_testmas_key' AND student_key='$ses_ukey' AND test2_areamas_key='$row2[test2_area_master_key]' AND finact=0";
	$result5=mysqli_query($link,$sql5);
	if(mysqli_num_rows($result5)==0){
		$sql6="INSERT INTO student_test02_result_details(finact,status,student_test02_result_details_key,studenttestmas_key,student_key,test2_areamas_key,result)
												VALUES (0,'A',NULL,'$student_testmas_key','$ses_ukey','$row2[test2_area_master_key]','$numofreslut')";
		mysqli_query($link,$sql6);	
	}
	else{
		$sql6="UPDATE student_test02_result_details SET result='$numofreslut' WHERE  studenttestmas_key='$student_testmas_key' AND student_key='$ses_ukey' AND test2_areamas_key='$row2[test2_area_master_key]' AND finact=0";
		mysqli_query($link,$sql6);	
	}
	
}

// Calulate test result by category										
?>


<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
    <head>
         <title>Career Key Test</title>
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
		
		<script type="text/javascript" src="fusioncharts/js/fusioncharts.js"></script>
		<script type="text/javascript" src="fusioncharts/js/themes/fusioncharts.theme.carbon.js"></script>
		
		<script>
		const dataSource = {
		  chart: {
			caption: "Test02 - Result",
			yaxisname: "Marks",
			xAxisName: "Area",
			showValue: "1",
		  },
		  data: [
			<?php
			$sql7="SELECT * FROM test2_area_master WHERE finact=0";
			$result7=mysqli_query($link,$sql7);
			while($row7=mysqli_fetch_array($result7)){
				$numofreslutch=0;
				$sql8="SELECT * FROM student_test02_result_details WHERE studenttestmas_key='$student_testmas_key' 
																		AND student_key='$ses_ukey' 
																		AND test2_areamas_key='$row7[test2_area_master_key]' 
																		AND finact=0";
				$result8=mysqli_query($link,$sql8);
				while($row8=mysqli_fetch_array($result8)){
					$numofreslutch=$row8['result'];
				}
			?>
				{
				  label: "<?php echo $row7['area_name']; ?>",
				  value: "<?php echo $numofreslutch; ?>"
				},
			<?php
			}
			?>
		  ]
		};

		FusionCharts.ready(function() {
		  var myChart = new FusionCharts({
			type: "line",
			renderAt: "chart-container",
			width: "100%",
			height: "500px",
			dataFormat: "json",
			theme: "fusion",
			valueOnRight: "1",
			
            thickness: "5",
			dataSource
		  }).render();
		});
		
		</script>
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
							<h1 style="color:#ffffff;font-weight:bold" align="center">Career Key Test - Result</h1>
						  </div>
						  <div class="col-lg-3">
							
						  </div>
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
						
						<table class="table table-hover table-bordered" style="background-color:#79ed37;font-weight:bold" width="100%">
							<tr>
								<?php
								$sql1="SELECT * FROM test2_area_master WHERE finact=0";
								$result1=mysqli_query($link,$sql1);
								while($row1=mysqli_fetch_array($result1)){
								?>
								<td align="center"><?php echo $row1['area_name']; ?></td>
								<?php
								}
								?>
							</tr>
							<tr>
								<?php
								$sql2="SELECT * FROM test2_area_master WHERE finact=0";
								$result2=mysqli_query($link,$sql2);
								while($row2=mysqli_fetch_array($result2)){
									$numofreslut=0;
									$sql4="SELECT * FROM student_test02_result_details WHERE studenttestmas_key='$student_testmas_key' 
																							AND student_key='$ses_ukey' 
																							AND test2_areamas_key='$row2[test2_area_master_key]' 
																							AND finact=0";
									$result4=mysqli_query($link,$sql4);
									while($row4=mysqli_fetch_array($result4)){
										$numofreslut=$row4['result'];
									}
								?>
								<td align="center"><?php echo $numofreslut; ?></td>
								<?php
								}
								?>
							</tr>	
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
						<div id="chart-container"></div>
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
						<div class="row">
						  <div class="col-lg-3">
						  </div>
						  <div class="col-lg-6">
						  </div>
						  <div class="col-lg-3">
							<a href="test2_process3.php"><button type="button" class="btn btn-lg btn-success btn-block">Next</button></a>
						  </div>
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
	
    </body>
</html>