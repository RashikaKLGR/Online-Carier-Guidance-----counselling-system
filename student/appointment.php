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
 
	$sql4="INSERT INTO appoinment_master (finact,status,appoinment_mas_key,student_key) 
								   VALUES(0,'A',NULL,'$ses_ukey')";
	if(mysqli_query($link,$sql4)){
		
		echo "<script>
			alert('Sucessfully Request Appoinment .');
			window.location.href='appointment.php';
		</script>";
	}
	else{
		$message="execute error";
	}
	
}
$sql21="SELECT * FROM appoinment_master WHERE student_key='$ses_ukey' AND finact=0";
	$result21 = mysqli_query($link,$sql21);
	while($row21=mysqli_fetch_array($result21)){
		$btncancelapp1="btncancelapp".$row21['appoinment_mas_key'];
		$txtkeyupdate1="txtkeyupdate".$row21['appoinment_mas_key'];
		
	if(isset($_POST[$btncancelapp1])){
	$sql10="UPDATE appoinment_master SET approve_status=null,appinment_date=null,appoinment_time=null,approve_person_key=null,approve_dtetime=null WHERE appoinment_mas_key='$_POST[$txtkeyupdate1]' AND finact=0";
	if(mysqli_query($link,$sql10)){
		echo "<script>
			alert('Sucessfully cancel the appoinment');
			window.location.href='appointment.php';
		</script>";
		}
	}
	}
	
	
	$sql21="SELECT * FROM appoinment_master WHERE student_key='$ses_ukey' AND finact=0";
	$result21 = mysqli_query($link,$sql21);
	while($row21=mysqli_fetch_array($result21)){
		$btndelapp1="btndelapp".$row21['appoinment_mas_key'];
		$txtkeydelete1="txtkeydelete".$row21['appoinment_mas_key'];
		
	if(isset($_POST[$btndelapp1])){
	$sql10="UPDATE appoinment_master SET finact=1 WHERE appoinment_mas_key='$_POST[$txtkeydelete1]' AND finact=0";
	if(mysqli_query($link,$sql10)){
		echo "<script>
			alert('Sucessfully cancel the appoinment');
			window.location.href='appointment.php';
		</script>";
		}
	}
	}


?>

<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appoinment</title>

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
     <?php include('navi_register.php') ?>
		<br>
		<br>
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
									<button type="submit" name="btn_add" class="btn btn-lg btn-primary btn-block">Request Appoinment</button>
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
					<form name="f3" method="post" >
						<table class="table table-striped table-bordered display" id="example" width="100%">
							<thead>
								<tr>
									<th width="40%">Request Date</th>
									<th width="20%">Approve Date</th>
									<th width="10%">Appoinment Date</th>
									<th width="10%">Appoinment Time</th>
									<th width="10%"> </th>
									<th width="10%"> </th>
									
								</tr>
							</thead>
							<tbody>
								
								<?php
									$sql5="SELECT * FROM  appoinment_master WHERE student_key='$ses_ukey'
																			  AND finact=0
																			ORDER BY sys_enterdte DESC";
									$result5 = mysqli_query($link,$sql5);
									while($row5=mysqli_fetch_array($result5)){
										$btndelapp="btndelapp".$row5['appoinment_mas_key'];
										$txtkeydelete="txtkeydelete".$row5['appoinment_mas_key'];
										$btncancelapp="btncancelapp".$row5['appoinment_mas_key'];
										$txtkeyupdate1="txtkeyupdate".$row5['appoinment_mas_key'];
										if($row5['approve_status']==1){
											$status_appoinment="Approved";
											$background_appoinment="background-color:#64CCC5;font-weight:bold";
										}
										else{
											$status_batch="Pending Approve";
											$background_appoinment="background-color:#FF8080;font-weight:bold";
										}
										
										echo "<tr>
												<td width='40%' style='".$background_appoinment."'>".$row5['sys_enterdte']."</td>";
												if($row5['approve_status']==1){
													echo "<td width='20%' style='".$background_appoinment."'>".$row5['approve_dtetime']."</td>";
													echo "<td width='10%' style='".$background_appoinment."'>".$row5['appinment_date']."</td>";
													echo "<td width='10%' style='".$background_appoinment."'>".$row5['appoinment_time']."</td>";
													echo "<td width='10%' style='".$background_appoinment."'>
													<input type='hidden' name='".$txtkeyupdate."' value='".$row5['appoinment_mas_key']."' >
													<button type='submit' name='".$btncancelapp."' class='btn btn-sm btn-danger btn-block'>Cancel Appoinment</button> </td>";
													
												}
												else{
													echo "<td width='60%' colspan='3' style='".$background_appoinment."'>Pending Approve</td>";
												}
												echo "<td width='10%' style='".$background_appoinment."'>
													<input type='hidden' name='".$txtkeydelete."' value='".$row5['appoinment_mas_key']."' >
													<button type='submit' name='".$btndelapp."' class='btn btn-sm btn-danger btn-block'>delete appoinment</button> </td>";
										echo "</tr>";
									}
								?>
								
							</tbody>
						</table>
						</form>
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
<?php
mysqli_close($link);
?>
</html>
