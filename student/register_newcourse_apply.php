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
$sql8="SELECT * FROM  course_batch_details INNER JOIN course_master ON course_batch_details.course_key=course_master.coursemas_key  
																							WHERE course_batch_details.batchapplyclose_status=0
																							AND course_batch_details.finact=0
																							AND course_master.finact=0";
$result8 = mysqli_query($link,$sql8);
while($row8=mysqli_fetch_array($result8)){
	$txt_applycorse1="txt_applycorse".$row8['course_batch_details_key'];
	$btn_applycorse1="btn_applycorse".$row8['course_batch_details_key'];
	
	if(isset($_POST[$btn_applycorse1])){
		$sql3="SELECT * FROM course_batch_details WHERE course_batch_details_key='$_POST[$txt_applycorse1]' AND finact=0";
		$result3 = mysqli_query($link,$sql3);
		while($row3=mysqli_fetch_array($result3)){
			$course_keyys=$row3['course_key'];
			$batch_nmss=$row3['batch_nme'];
		}
		
		$sql9="SELECT * FROM student_newselected_course_details WHERE student_key='$ses_ukey' AND course_key='$course_keyys' AND coursebatch_detail_key='$_POST[$txt_applycorse1]' AND finact=0";
		$result9 = mysqli_query($link,$sql9);
		if(mysqli_num_rows($result9)==0){
			$sql10="INSERT INTO student_newselected_course_details (finact,status,student_newselected_course_details_key,student_key,course_key,student_testmas_key,test_type,coursebatch_detail_key,batch_nme)
		                                       VALUES (0,'A',NULL,'$ses_ukey','$course_keyys',0,'Direct','$_POST[$txt_applycorse1]','$batch_nmss')";
			mysqli_query($link,$sql10);
			
		}

		echo "<script>
				alert('Sucessfully Apply course.');
				window.location.href='register_newcourse_apply.php';
			</script>";
	}
	
	
}
?>

<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
    <head>
         <title>Apply New Course</title>
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
		include('navi_register.php');
		?>
		<br>
		<br>
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
								
								<table class="table table-striped table-bordered display" id="example" width="100%">
									<thead>
										<tr>
											<th width="25%">Course</th>
											<th width="35%">Batch</th>
											<th width="20%">Apply</th>
											
										</tr>
									</thead>
									<tbody>
										
										<?php
											$sql5="SELECT * FROM  course_batch_details INNER JOIN course_master ON course_batch_details.course_key=course_master.coursemas_key  
																							WHERE course_batch_details.batchapplyclose_status=0
																							AND course_batch_details.finact=0
																							AND course_master.finact=0";
											$result5 = mysqli_query($link,$sql5);
											while($row5=mysqli_fetch_array($result5)){
												$txt_applycorse="txt_applycorse".$row5['course_batch_details_key'];
												$btn_applycorse="btn_applycorse".$row5['course_batch_details_key'];
												echo "<tr>
													<form name='f1' method='post'>
														<td width='25%'>".$row5['course_nme']."</td>
														<td width='35%'>".$row5['batch_nme']."</td>
														<td width='20%'>
															<input type='hidden' name='".$txt_applycorse."' value='".$row5['course_batch_details_key']."'>
															<button type='submit' name='".$btn_applycorse."' class='btn btn-sm btn-primary btn-block'>Apply</button></a>
														</td>
													 </form>";
												echo "</tr>";
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
</html>