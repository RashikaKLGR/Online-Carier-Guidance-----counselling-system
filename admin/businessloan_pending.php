<?php
error_reporting(0);
include 'conn.php';		
include 'session_handler.php';
?>

<?php
$cur_date=date("Y-m-d");
$cur_time=date("Y-m-d h:i:s");

if(isset($_POST['btn_add'])){
	$nm1=$_POST['txt_programmedte'];
	$nm2=$_POST['txt_message'];
	
	if($nm1<=$cur_date){
		echo "<script>
				alert('Sorry!! Please Check Programme Date.');
		</script>";
	}
	else{
		$sql1="INSERT INTO business_loan_master (finact,status,business_loan_master_key,programme_dte,message,act_person)
										VALUES (0,'A',NULL,'$nm1','$nm2','$ses_ukey')";
		if(mysqli_query($link,$sql1)){
			$sql2="SELECT * FROM business_loan_master WHERE programme_dte='$nm1' AND message='$nm2' AND finact=0";
			$result2 = mysqli_query($link,$sql2);
			while($row2=mysqli_fetch_array($result2)){
				$business_loan_master_key=$row2['business_loan_master_key']; 
				$sys_enterdte=$row2['sys_enterdte']; 
			}
			
			$sql3="SELECT *,student_businessloan_details.sys_enterdte AS regdate FROM  student_businessloan_details INNER JOIN student_master ON student_businessloan_details.student_key=student_master.studentmas_key
																					  WHERE student_businessloan_details.inform_status IS NULL
																						AND student_businessloan_details.finact=0 
																						AND student_master.finact=0";
			$result3 = mysqli_query($link,$sql3);
			while($row3=mysqli_fetch_array($result3)){
				$sql5="UPDATE  student_businessloan_details SET inform_status=1,
																businessloanmas_key='$business_loan_master_key',
																programme_dte='$nm1',
																inform_message='$nm2',
																inform_datetime='$sys_enterdte',
																inform_person='$ses_ukey'
															WHERE inform_status IS NULL
															AND student_key='$row3[student_key]'
															AND finact=0";
				mysqli_query($link,$sql5);
				
				$msgheader="Your loan program will be held on ".$nm1."";
				$to=$row3['user_nme'];
				$from=$row3['user_nme'];
				$subject=$msgheader;				//subject eka danna
				$msg1="Dear : ".$row3['student_nme']."\r\n"."Your loan program will be held on ".$nm1."\r\n".$nm2."\r\n Please participate in it \r\n Thank You";						//message eka danna
				
				$headers="From: $from";
				mail($to,$subject,$msg1,$headers);
			}
			
		}
		echo "<script>
					alert('Sucessfully Shedule Business Loan Programme.');
					window.location.href='home.php';
				</script>";
	}
}
?>

<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
    <head>
         <title>Pending Business Loan Details</title>
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
		<br>
		<br>
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
									
									<div class="form-group">
                                        <label><font color="red">&lowast;</font>Programme Date</label>
										 <input type="date" class="form-control input-sm" name="txt_programmedte" placeholder="Please Enter Programme Date" required>
									</div>
									
									<div class="form-group">
                                      <label><font color="red">&lowast;</font>Message</label>
                                      <textarea class="form-control input-sm" name="txt_message" required></textarea>
									</div>
									
									<button type="submit" name="btn_add" class="btn btn-lg btn-primary btn-block">Inform</button>
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
						<h1> Pending Business Loan Details </h1>
						<table class="table table-striped table-bordered display" id="example" width="100%">
							<thead>
								<tr>
									<th width="15%">Request Date</th>
									<th width="30%">Student</th>
									<th width="20%">Date of Birth</th>
									<th width="15%">NIC No</th>
									<th width="20%">Email Address</th>
								</tr>
							</thead>
							<tbody>
								
								<?php
									$sql4="SELECT *,student_businessloan_details.sys_enterdte AS regdate FROM  student_businessloan_details INNER JOIN student_master ON student_businessloan_details.student_key=student_master.studentmas_key
																					  WHERE student_businessloan_details.inform_status IS NULL
																						AND student_businessloan_details.finact=0 
																						AND student_master.finact=0";
									$result4 = mysqli_query($link,$sql4);
									while($row4=mysqli_fetch_array($result4)){
										echo "<tr>
												<td width='15%'>".$row4['regdate']."</td>
												<td width='15%'>".$row4['student_nme']."</td>
												<td width='20%'>".$row4['date_of_birth']."</td>
												<td width='15%'>".$row4['nic_no']."</td>
												<td width='20%'>".$row4['user_nme']."</td>
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