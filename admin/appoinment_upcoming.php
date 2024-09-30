<?php
error_reporting(0);
include 'conn.php';		
include 'session_handler.php';
?>

<?php
$cur_dte=date("Y-m-d");
$cur_time=date("Y-m-d h:i:s");

$sql3="SELECT * FROM appoinment_master INNER JOIN student_master ON appoinment_master.student_key=student_master.studentmas_key
											 WHERE appoinment_master.approve_status IS NULL
											   AND appoinment_master.finact=0";
$result3 = mysqli_query($link,$sql3);
while($row3=mysqli_fetch_array($result3)){
	$txt_appoinmentkey1="txt_appoinmentkey".$row3['appoinment_mas_key'];
	$txt_appoinmentdte1="txt_appoinmentdte".$row3['appoinment_mas_key'];
	$txt_appoinmenttime1="txt_appoinmenttime".$row3['appoinment_mas_key'];
	$btn_add1="btn_add".$row3['appoinment_mas_key'];
	
	if(isset($_POST[$btn_add1])){
		if($_POST[$txt_appoinmentdte1]>$cur_dte){
			$sql5="UPDATE appoinment_master SET approve_status=1,
												appinment_date='$_POST[$txt_appoinmentdte1]',
												appoinment_time='$_POST[$txt_appoinmenttime1]',
												approve_person_key='$ses_ukey',
												approve_dtetime='$cur_time'
											WHERE appoinment_mas_key='$_POST[$txt_appoinmentkey1]'
											   AND finact=0";
			if(mysqli_query($link,$sql5)){
				echo "<script>
					alert('Sucessfully Approve Appoinment.');
					window.location.href='appoinment_pending.php';
				</script>";
			}
		}
		else{
			echo "<script>
					alert('Sorry! please Check Date.');
					window.location.href='appoinment_pending.php';
				</script>";
		}
		
	}
}

?>


<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
    <head>
         <title>Upcoming Appoinment</title>
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
						<h1> Upcoming Appoinment </h1>
						<table class="table table-striped table-bordered display" id="example" width="100%">
							<thead>
								<tr>
									<th width="15%">Appoinment Date</th>
									<th width="20%">Appoinment Time</th>
									<th width="25%">Student</th>
									<th width="20%">Request Date</th>
									<th width="20%">Registe Date</th>
									
								</tr>
							</thead>
							<tbody>
								
								<?php
									$sql4="SELECT *,appoinment_master.sys_enterdte AS requestdte FROM appoinment_master INNER JOIN student_master ON appoinment_master.student_key=student_master.studentmas_key
																															  WHERE appoinment_master.approve_status=1
																															  AND appoinment_master.appinment_date>='$cur_dte'
																															  AND appoinment_master.finact=0";
									$result4 = mysqli_query($link,$sql4);
									while($row4=mysqli_fetch_array($result4)){
										
										echo "<tr>
												
													<td width='15%'>".$row4['appinment_date']."</td>
													<td width='20%'>".$row4['appoinment_time']."</td>
													<td width='25%'>".$row4['student_nme']."</td>
													<td width='20%'>".$row4['requestdte']."</td>
													<td width='20%'>".$row4['approve_dtetime']."</td>
												
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