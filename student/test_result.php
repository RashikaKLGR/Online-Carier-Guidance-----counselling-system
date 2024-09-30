<?php
error_reporting(0);
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
$sql1="SELECT * FROM student_test_master WHERE student_testmas_key='$_GET[ts]' AND finact=0";
$result1 = mysqli_query($link,$sql1);
while($row1=mysqli_fetch_array($result1)){
	$test_type=$row1['test_type'];
	$sys_enterdte=$row1['sys_enterdte'];
	$student_key=$row1['student_key'];
}

$sql2="SELECT * FROM  student_master WHERE studentmas_key='$student_key' AND finact=0";
$result2 = mysqli_query($link,$sql2);
while($row2=mysqli_fetch_array($result2)){
	$student_nme=$row2['student_nme'];
}


?>


<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
    <head>
         <title>Test Result</title>
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
		<?php
		if($test_type=="Test01"){
		?>
			const dataSource = {
			  chart: {
				caption: "Test01 - Result",
				yaxisname: "Marks",
				xAxisName: "Area",
				showValue: "1",
			  },
			  data: [
				<?php
				$sql7="SELECT * FROM test1_area_master WHERE finact=0";
				$result7=mysqli_query($link,$sql7);
				while($row7=mysqli_fetch_array($result7)){
					$numofreslutch=0;
					$sql8="SELECT * FROM student_test01_result_details WHERE studenttestmas_key='$_GET[ts]' 
																			AND student_key='$student_key' 
																			AND test1_areamas_key='$row7[test1_area_master_key]' 
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
		<?php
		}
		?>
		<?php
		if($test_type=="Test02"){
		?>
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
					$sql8="SELECT * FROM student_test02_result_details WHERE studenttestmas_key='$_GET[ts]' 
																			AND student_key='$student_key' 
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
		
		<?php
		}
		?>
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
			<div class="row">
					<div class="col-lg-1">
					
					</div>
					<div class="col-lg-10">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<table border="0" width="100%">
									<tr style="font-weight:bold;font-size:20px;">
										<td width="10%">Student</td>
										<td width="40%"> : <?php echo $student_nme; ?></td>
										<td width="10%">Test Date</td>
										<td width="40%"> : <?php echo $sys_enterdte; ?></td>
									</tr>
								</table>
							</div>
						</section>
					</div>
			</div>
			<?php
			if($test_type=="Test01"){
			?>
				<div class="row">		  
					<div class="col-lg-1">
					</div>
					<div class="col-lg-10">
						<section class="panel panel-primary panel-transparent">
							<div class="panel-body">
								
								<table class="table table-hover table-bordered" style="background-color:#79ed37;font-weight:bold" width="100%">
									<tr>
										<?php
										$sql1="SELECT * FROM test1_area_master WHERE finact=0";
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
										$sql2="SELECT * FROM test1_area_master WHERE finact=0";
										$result2=mysqli_query($link,$sql2);
										while($row2=mysqli_fetch_array($result2)){
											$numofreslut=0;
											$sql4="SELECT * FROM student_test01_result_details WHERE studenttestmas_key='$_GET[ts]' 
																									AND student_key='$student_key' 
																									AND test1_areamas_key='$row2[test1_area_master_key]' 
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
			<?php
			}
			if($test_type=="Test02"){
			?>
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
											$sql4="SELECT * FROM student_test02_result_details WHERE studenttestmas_key='$_GET[ts]' 
																									AND student_key='$student_key' 
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