<?php
error_reporting(0);
include 'conn.php';		
include 'session_handler.php';
?>

<?php
$cur_dte=date("Y-m-d");
$cur_time=date("Y-m-d h:i:s");

if(isset($_POST['btn_add'])){
	
	$nm1=$_POST['sele_batch'];
	$nm2=$_POST['sele_type'];
	$nm3=$_POST['txt_interviewdte'];
	$nm4=$_POST['txt_informmessage'];
	
	if($nm3<=$cur_dte){
		
		echo "<script>
				alert('Sorry!! Please Check date.');
				window.location.href='inform_course.php';
		</script>";
		
	}
	else{
		$sql2="UPDATE course_batch_details SET batchapplyclose_status=1,
												inform_type='$nm2',
												interview_testdte='$nm3',
												inform_message='$nm4',
												inform_person='$ses_ukey',
												inform_sysenterdte='$cur_time'
											WHERE course_batch_details_key='$nm1'
											 AND finact=0";
		if(mysqli_query($link,$sql2)){
			$sql4="SELECT * FROM student_newselected_course_details INNER JOIN course_master ON student_newselected_course_details.course_key=course_master.coursemas_key
																	INNER JOIN student_master ON student_newselected_course_details.student_key=student_master.studentmas_key
																	WHERE student_newselected_course_details.coursebatch_detail_key='$nm1'
																      AND student_newselected_course_details.inform_status IS NULL
																	  AND student_newselected_course_details.finact=0
																	  AND course_master.finact=0
																	  AND student_master.finact=0";
			$result4=mysqli_query($link,$sql4);
			while($row4=mysqli_fetch_array($result4)){
																	
				$sql3="UPDATE student_newselected_course_details SET inform_status=1,
																	 interview_testdte='$nm3',
																	 inform_type='$nm2',
																	 inform_message='$nm4',
																	 inform_datetime='$cur_time',
																	 inform_person='$ses_ukey'
																WHERE coursebatch_detail_key='$nm1'
																AND student_key='$row4[student_key]'
																AND inform_status IS NULL
																AND finact=0";
				mysqli_query($link,$sql3);
				
				if($nm2=="Interview"){
					$msgheader="The ".$row4['batch_nme']." batch of the ".$row4['course_nme']." course involves conducting interviews.";
				}
				if($nm2=="Test"){
					$msgheader="The ".$row4['batch_nme']." batch of the ".$row4['course_nme']." course involves taking a test.";
				}
				
				$to=$row4['user_nme'];
				$from=$row4['user_nme'];
				$subject=$msgheader;				//subject eka danna
				$msg1="Dear : ".$row4['student_nme']."\r\n"."You Selected Course : ".$row4['course_nme']-$row4['batch_nme'].".\r\n"."Date : ".$nm3."\r\n".$nm2."\r\n".$nm4."\r\nThank You";						//message eka danna
				
				$headers="From: $from";

				mail($to,$subject,$msg1,$headers);
			
			}
			
			
		}
		
	}
}
?>


<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
    <head>
         <title>Schedule Interview/appitude Test</title>
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

            <div class="col-lg-2">

            </div>
            
                
			<div class="col-lg-8">
				<div class="row">
					<div class="col-lg-12">
						<section class="panel panel-primary panel-transparent">
                          
							<div class="panel-body">
								<form role="form" method="post" name="f1">
									
									<div class="form-group">
                                        <label><font color="red">&lowast;</font>Course and Batch</label>
										<select class="form-control input-sm" name="sele_batch" required>
											<?php
											$sql1="SELECT * FROM  course_batch_details INNER JOIN  course_master ON course_batch_details.course_key=course_master.coursemas_key  
																							WHERE course_batch_details.batchapplyclose_status=0
																							AND course_batch_details.finact=0
																							AND course_master.finact=0";
											$result1=mysqli_query($link,$sql1);
											$option1 ="";
											while($row1=mysqli_fetch_array($result1)){
												$option1 = $option1."<option value=$row1[course_batch_details_key]>$row1[course_nme] - $row1[batch_nme]</option>";			//Load Reagon Name
											}
											?>
												<option value="" disabled selected hidden>Please Choose.............</option>
                                                <?php echo $option1; ?>    
										</select>
									</div>
									
									<div class="form-group">
										<label><font color="red">&lowast;</font>Type</label>
										<select class="form-control input-sm" name="sele_type">
											
												<option value="" disabled selected hidden>Please Choose.............</option>";
                                                <option value="Test">Test</option>
												<option value="Interview">Interview</option>
										</select>
									</div>
									
									<div class="form-group">
                                      <label><font color="red">&lowast;</font>Date</label>
                                      <input type="date" class="form-control input-sm" name="txt_interviewdte" placeholder="Please Enter Date" required>
									</div>
									
									<div class="form-group">
                                      <label><font color="red">&lowast;</font>Inform Message</label>
                                      <textarea class="form-control input-sm" name="txt_informmessage" required></textarea>
									</div>
									
									<button type="submit" name="btn_add" class="btn btn-lg btn-primary btn-block">Schedule Interview/appitude Test</button>
								</form>

							</div>
						</section>

					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-lg-1">
			
			</div>
			<div class="col-lg-10">
				<section class="panel panel-transparent">
					<div class="panel-body panel-transparent">
						<h1> Scheduled Interview/appitude Test </h1>
						<table class="table table-striped table-bordered display" id="example" width="100%">
							<thead>
								<tr>
									<th width="15%">Informed Date</th>
									<th width="15%">Course</th>
									<th width="10%">Batch</th>
									<th width="15%">Date</th>
									<th width="15%">Type</th>
									<th width="30%">Message</th>
									
								</tr>
							</thead>
							<tbody>
								
								<?php
									$sql4="SELECT * FROM course_batch_details INNER JOIN course_master ON course_batch_details.course_key=course_master.coursemas_key
																			WHERE course_batch_details.batchapplyclose_status=1
																			AND course_batch_details.inform_type IS NOT NULL
																			AND course_batch_details.finact=0";
									$result4 = mysqli_query($link,$sql4);
									while($row4=mysqli_fetch_array($result4)){
										
										echo "<tr>
												<td width='15%'>".$row4['inform_sysenterdte']."</td>
												<td width='15%'>".$row4['course_nme']."</td>
												<td width='10%'>".$row4['batch_nme']."</td>
												<td width='15%'>".$row4['interview_testdte']."</td>
												<td width='15%'>".$row4['inform_type']."</td>
												<td width='30%'>".$row4['inform_message']."</td>
												
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
</html>