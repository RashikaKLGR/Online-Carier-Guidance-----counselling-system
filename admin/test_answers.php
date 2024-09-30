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
         <title>Test Answers</title>
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
		
		include('navi.php');
		
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
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<h1 align="center"> <?php echo $test_type; ?> </h1>
									<?php
									$sql3="SELECT DISTINCT(type) AS distype FROM test1_question_master WHERE finact=0";
									$result3=mysqli_query($link,$sql3);
									while($row3=mysqli_fetch_array($result3)){
									?>
										<h2 align="center"><?php echo $row3['distype']; ?></h2>
										
										<table class="table table-hover table-bordered" style="background-color:#79ed37;font-weight:bold" width="100%">
											
												<?php
													$sql4="SELECT * FROM test1_questionmgt_master WHERE type='$row3[distype]' AND finact=0";
													$result4 = mysqli_query($link,$sql4);
													while($row4=mysqli_fetch_array($result4)){
														$sql10="SELECT * FROM test1_question_master WHERE test1questionmas_key='$row4[question_a_key]' AND finact=0";
														$result10 = mysqli_query($link,$sql10);
														while($row10=mysqli_fetch_array($result10)){
															$question_a_nme=$row10['question_name'];
														}
														
														$sql11="SELECT * FROM test1_question_master WHERE test1questionmas_key='$row4[question_b_key]' AND finact=0";
														$result11 = mysqli_query($link,$sql11);
														while($row11=mysqli_fetch_array($result11)){
															$question_b_nme=$row11['question_name'];
														}
														
														$sql5="SELECT * FROM student_test01_details WHERE studenttestmas_key='$_GET[ts]' AND student_key='$student_key' AND test1_questionmgt_mas_key='$row4[test1_questionmgt_mas_key]' AND finact=0";
														$result5 = mysqli_query($link,$sql5);
														while($row5=mysqli_fetch_array($result5)){
															$test1quekey=$row5['test1questionmas_key'];
														}
														echo "<tr>
																<td width='40%'>".$question_a_nme."</td>";
																if($test1quekey==$row4['question_a_key']){
																	echo "<td width='10%'><input type='radio' checked='checked'></td>";
																}
																else{
																	echo "<td width='10%'><input type='radio'></td>";
																}
																echo "<td width='40%'>".$question_b_nme."</td>";
																
																if($test1quekey==$row4['question_b_key']){
																	echo "<td width='10%'><input type='radio' checked='checked'></td>";
																}
																else{
																	echo "<td width='10%'><input type='radio'></td>";
																}
														echo "</tr>";
													}
												
												?>
												
											
										</table>
									
									<?php
									}
									?>
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
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<h1 align="center"> <?php echo $test_type; ?> </h1>
								
								<div class="row">		  
									<div class="col-lg-12">			
										<div class="row">	
											<?php
											$sql5="SELECT * FROM test2_area_master WHERE finact=0";
											$result5 = mysqli_query($link,$sql5);
											while($row5=mysqli_fetch_array($result5)){
											?>
												<div class="col-lg-6">
													<section class="panel panel-primary panel-transparent">
														<div class="panel-body">
															<h2 align="center"><?php echo $row5['area_name']; ?></h2>
																<table class="table table-hover table-bordered" style="background-color:#79ed37;font-weight:bold" width="100%">
																	
																		<?php
																			$sql4="SELECT * FROM test2_question_master WHERE type='Self Description' AND test2_areamas_key='$row5[test2_area_master_key]' AND finact=0";
																			$result4 = mysqli_query($link,$sql4);
																			while($row4=mysqli_fetch_array($result4)){
																				
																				$sql6="SELECT * FROM student_test02_details WHERE studenttestmas_key='$_GET[ts]' AND student_key='$student_key' AND test2questionmas_key='$row4[test2questionmas_key]' AND finact=0";
																				$result6 = mysqli_query($link,$sql6);
																				while($row6=mysqli_fetch_array($result6)){
																					$reslutd=$row6['resuts'];
																				}
																				echo "<tr>
																						<td width='80%'>".$row4['question_name']."</td>
																						<td width='20%' align='center'>
																							".$reslutd."
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
									</div>
								</div>
						
								<div class="row">
									<div class="col-lg-12">
										<section class="panel panel-primary panel-transparent">
											<div class="panel-body">
											<table class="table table-hover table-bordered" style="background-color:#79ed37;font-weight:bold" width="100%">
												<?php
													$t=0;
													$sql10="SELECT * FROM test2_question_master WHERE type='Jobs' AND finact=0";
													$result10 = mysqli_query($link,$sql10);
													while($row10=mysqli_fetch_array($result10)){
														
														$sql6="SELECT * FROM student_test02_details WHERE studenttestmas_key='$_GET[ts]' AND student_key='$student_key' AND test2questionmas_key='$row10[test2questionmas_key]' AND finact=0";
														$result6 = mysqli_query($link,$sql6);
														while($row6=mysqli_fetch_array($result6)){
															$reslutd=$row6['resuts'];
														}
														
														$t++;
														
														if($t % 2 ==1){
															echo "<tr>";
														}
														
															if($t%2 ==0){
																echo "<td width='40%'>".$row10['question_name']."</td>
																		<td width='10%' align='center'>
																			".$reslutd."
																		</td>";
															}
															if($t%2==1){
																  echo "<td width='40%'>".$row10['question_name']."</td>
																		<td width='10%' align='center'>
																			".$reslutd."
																		</td>";
															}
														if($t%2==0){
															echo "</tr>";
														}	
														
														
														
													}
												?>
											</table>
											</div>
										</section>
									</div>
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