<?php
include 'conn.php';	
include 'session_handler.php';	
//error_reporting(0);	
?>

<?php
$cur_dte=date("Y-m-d");
?>

<?php
	$sql1="SELECT * FROM exam_master WHERE exammas_key='$_GET[ex]' AND finact=0";
	$result1 = mysqli_query($link,$sql1);
    while($row1=mysqli_fetch_array($result1)){
		$exam_name=$row1['exam_name'];
		$stream=$row1['stream'];
	}
	
	
	if(isset($_POST['btn_add'])){
		$nm1=$_POST['txt_subject'];
		
		$sql2="SELECT * FROM examsubject_master WHERE exammas_key='$_GET[ex]' AND subject_name='$nm1' AND finact=0";
		$result2 = mysqli_query($link,$sql2);
		if(mysqli_num_rows($result2)==0){
			$sql3="INSERT INTO examsubject_master(finact,status,examsubjectmas_key,exammas_key,exam_name,stream,subject_name,act_person)
							VALUES (0,'A',NULL,'$_GET[ex]','$exam_name','$stream','$nm1','$ses_ukey')";
			mysqli_query($link,$sql3);
			echo "<script>
				alert('Sucessfully Added Subject.');
				window.location.href='cd_exam.php?ex=$_GET[ex]';
			</script>";
		}
		else{
			echo "<script>
				alert('Execute Error.');
				window.location.href='cd_exam.php?ex=$_GET[ex]';
			</script>";
		}
	}
	
	$sql5="SELECT * FROM examsubject_master WHERE exammas_key='$_GET[ex]' AND finact=0 
																	   ORDER BY subject_name ASC";
	$result5 = mysqli_query($link,$sql5);
	while($row5=mysqli_fetch_array($result5)){
		$txt_dels1="txt_dels".$row5['examsubjectmas_key'];
		$btn_dels1="btn_dels".$row5['examsubjectmas_key'];
		
		if(isset($_POST[$btn_dels1])){
			
			$sql6="UPDATE examsubject_master SET finact=1 WHERE examsubjectmas_key='$_POST[$txt_dels1]'";
			if(mysqli_query($link,$sql6)){
				echo "<script>
					alert('Successfully Delete Subject.');
					window.location.href='cd_exam.php?ex=$_GET[ex]';
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
    <title>Exam Mgt</title>

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
		
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

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
			.rounded-circle{
				width: 100px;
				height: 100px;
			}
	
		</style>   

</head>
<body class="bc" style="background-position:center;
            background-attachment:fixed;
            background-size:100% 100%; background-image: url(images/a2.jpg);">
     <?php include('navi.php') ?>
		<br>
		<br>
		<br>
		<br>
        
		<div class="row">
			<div class="col-lg-3">
			
			</div>
            <div class="col-lg-6">
				<section class="panel panel-primary panel-transparent">
					<div class="panel-body">
						<h1 align="center" style="font-size:22px;font-weight:bold"><?php echo $exam_name; ?>  <?php echo $stream; ?></h1>
					</div>
				</section>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-3">
			
			</div>
            <div class="col-lg-6">
				<section class="panel panel-primary panel-transparent">
					<div class="panel-body">
						<form name="f1" method="post">
							<div class="form-group">
								<label><font color="red">&lowast;</font>Subject</label>
								<input type="text" class="form-control input-sm" name="txt_subject" placeholder="Please Enter Subject" required>
							</div>
							
							<button type="submit" name="btn_add" class="btn btn-lg btn-primary btn-block">Create Subject</button>
						</form>
					</div>
				</section>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-3">
			
			</div>
            <div class="col-lg-6">
				<section class="panel panel-transparent">
					<div class="panel-body panel-transparent">
						<h3>Subject</h3>
						<table class="table table-striped table-bordered display" id="example" width="100%">
							<thead>
								<tr>
									<th width="80%">Subject</th>
									<th width="20%">Delete</th>
								</tr>
							</thead>
							<tbody>
								
								<?php
									$sql4="SELECT * FROM examsubject_master WHERE exammas_key='$_GET[ex]' AND finact=0 
																	   ORDER BY subject_name ASC";
									$result4 = mysqli_query($link,$sql4);
									while($row4=mysqli_fetch_array($result4)){
										$txt_dels="txt_dels".$row4['examsubjectmas_key']; //txt_dels24
										$btn_dels="btn_dels".$row4['examsubjectmas_key']; //btn_dels24
										echo "<tr>
												<td width='80%'>".$row4['subject_name']."</td>
												<td width='20%'>
													<form name='f2' method='post'>
													<input type='hidden' name='".$txt_dels."' value='".$row4['examsubjectmas_key']."'>
													<button type='submit' name='".$btn_dels."'class='btn btn-sm btn-danger btn-block'>Delete</button>
													</form>
												</td>
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
<?php
mysqli_close($link);
?>
</html>
