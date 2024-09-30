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
$sql8="SELECT * FROM student_newselected_course_details INNER JOIN course_master ON student_newselected_course_details.course_key=course_master.coursemas_key
																									WHERE student_newselected_course_details.student_key='$ses_ukey'
																									AND student_newselected_course_details.register_status IS NULL
																									AND student_newselected_course_details.finact=0 
																									AND course_master.finact=0";
$result8 = mysqli_query($link,$sql8);
while($row8=mysqli_fetch_array($result8)){
	$txt_newselectcorse1="txt_newselectcorse".$row8['student_newselected_course_details_key'];
	$btn_courseadds1="btn_courseadds".$row8['student_newselected_course_details_key'];
	$btn_coursediscards1="btn_coursediscards".$row8['student_newselected_course_details_key'];
	
	if(isset($_POST[$btn_courseadds1])){
		$txt_studentid1="txt_studentid".$row8['student_newselected_course_details_key'];
		
		$sql9="SELECT * FROM student_newselected_course_details WHERE student_newselected_course_details_key='$_POST[$txt_newselectcorse1]' AND finact=0";
		$result9 = mysqli_query($link,$sql9);
		while($row9=mysqli_fetch_array($result9)){
			$sql10="INSERT INTO student_course_details (finact,status,studentcoursedetail_key,student_key,student_id,course_key,coursebatch_detail_key,batch,complete_status)
		                                       VALUES (0,'A',NULL,'$ses_ukey','$row9[course_key]','$row9[coursebatch_detail_key]','$row9[batch_nme]','Ongoing')";
			mysqli_query($link,$sql10);
			
		}
		
		$sql11="UPDATE student_newselected_course_details SET register_status=1 WHERE student_newselected_course_details_key='$_POST[$txt_newselectcorse1]' AND finact=0";
		mysqli_query($link,$sql11);
		
		echo "<script>
				alert('Sucessfully Register course.');
				window.location.href='home.php';
			</script>";
	}
	
	if(isset($_POST[$btn_coursediscards1])){
		
		$sql11="UPDATE student_newselected_course_details SET register_status=2 WHERE student_newselected_course_details_key='$_POST[$txt_newselectcorse1]' AND finact=0";
		mysqli_query($link,$sql11);
		
		echo "<script>
				alert('Sucessfully Discard course.');
				window.location.href='home.php';
			</script>";
	}
	
}
?>

<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
    <head>
         <title>View Test Result</title>
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
		
			<?php
			$sql6="SELECT * FROM student_test_master WHERE student_key='$ses_ukey' AND complete_status=1 AND finact=0";
			$result6 = mysqli_query($link,$sql6);
			if(mysqli_num_rows($result6)>0){
			?>
				<div class="row">
					<div class="col-lg-1">
					
					</div>
					<div class="col-lg-10">
						<section class="panel panel-transparent">
							<div class="panel-body panel-transparent">
								<h1> Your Test Details </h1>
								<table class="table table-striped table-bordered display" id="example" width="100%">
									<thead>
										<tr>
											<th width="25%">Test Date/Time</th>
											<th width="35%">Test Type</th>
											<th width="20%">Answers</th>
											<th width="20%">Result</th>
											
										</tr>
									</thead>
									<tbody>
										
										<?php
											$sql5="SELECT * FROM  student_test_master WHERE student_key='$ses_ukey' AND finact=0";
											$result5 = mysqli_query($link,$sql5);
											while($row5=mysqli_fetch_array($result5)){
												
												echo "<tr>
														<td width='25%'>".$row5['sys_enterdte']."</td>
														<td width='35%'>".$row5['test_type']."</td>
														<td width='20%'>
															<a href='test_answers.php?ts=".$row5['student_testmas_key']."'><button class='btn btn-sm btn-primary btn-block'>Answers</button></a>
														</td>
														<td width='20%'>
															<a href='test_result.php?ts=".$row5['student_testmas_key']."'><button class='btn btn-sm btn-success btn-block'>Results</button></a>
														</td>";
												echo "</tr>";
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