<?php
include 'conn.php';	
include 'session_handler.php';	
//error_reporting(0);	
?>

<?php
$cur_dte=date("Y-m-d");


if(isset($_POST['btn_addquestion'])){
	$s1=$_POST['sele_area'];
	$s2=$_POST['sele_question1'];
	$s3=$_POST['sele_question2'];
	
	if($s2==$s3){
		echo "<script>
				alert('Sorry!! Question A and B Same Not Allowed.');
				window.location.href='add_test1questionmgt.php';
			</script>";
	}
	else{
		$sql1="SELECT * FROM test1_questionmgt_master WHERE type='$s1' AND question_a_key='$s2' AND question_b_key='$s3' AND finact=0";
		$result1 = mysqli_query($link,$sql1);
		if(mysqli_num_rows($result1)==0){
			$sql5="INSERT INTO test1_questionmgt_master (finact,status,test1_questionmgt_mas_key,type,question_a_key,question_b_key,act_person)
					                                   VALUES (0,'A',NULL,'$s1','$s2','$s3','$ses_ukey')";
			if(mysqli_query($link,$sql5)){
				echo "<script>
					alert('Successfully added question.');
					window.location.href='add_test1questionmgt.php';
				</script>";
			}
		}
		else{
			echo "<script>
				alert('Sorry!! Already added this question.');
				window.location.href='add_test1questionmgt.php';
			</script>";
		}
	}
	
}

if(isset($_GET['qm'])){
	$sql7="UPDATE test1_questionmgt_master SET finact=1 WHERE test1_questionmgt_mas_key='$_GET[qm]'";
	if(mysqli_query($link,$sql7)){
		echo "<script>
			alert('Successfully Delete question.');
			window.location.href='add_test1questionmgt.php';
		</script>";
	}
}
?>



<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Test1 -Question Mgt</title>

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
			<div class="col-lg-1">
			
			</div>
            <div class="col-lg-10">
				<section class="panel panel-transparent">
					<div class="panel-body panel-transparent">
						<form name="f1" method="post">
							<table class="table table-striped table-bordered display" width="100%">
								<thead>
									<tr>
										<th width="20%">Type</th>
										<th width="35%">Question A</th>
										<th width="35%">Question B</th>
										<th width="10%">Add</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td width="20%">
											<select class="form-control input-sm" name="sele_area" required onchange="this.form.submit()">
												<?php
												if(isset($_POST['sele_area'])){
												?>
													<option value="<?php echo $_POST['sele_area']; ?>"><?php echo $_POST['sele_area']; ?></option>";
													<option value="Job">Job</option>
													<option value="Course">Course</option>
													<option value="Activity" >Activity</option>
												<?php
												}
												else{
												?>
													<option value="" disabled selected hidden>Please Choose.............</option>";
													<option value="Job">Job</option>
													<option value="Course">Course</option>
													<option value="Activity" >Activity</option>
												
												<?php
												}
												?>
											</select>
										</td>
										<td width="35%">
											<select class="form-control input-sm" name="sele_question1" required>
												<?php
												$sql2="SELECT * FROM test1_question_master WHERE type='$_POST[sele_area]' AND finact=0";
												$result2=mysqli_query($link,$sql2);
												$option2 ="";
												while($row2=mysqli_fetch_array($result2)){
													$option2 = $option2."<option value=$row2[test1questionmas_key]>$row2[question_name]</option>";			
												}
												
												echo "<option value='' disabled selected hidden>Please Choose.............</option>";
												echo $option2;
												?>
											</select>
										</td>
										<td width="35%">
											<select class="form-control input-sm" name="sele_question2" required>
												<?php
												$sql3="SELECT * FROM test1_question_master WHERE type='$_POST[sele_area]' AND finact=0";
												$result3=mysqli_query($link,$sql3);
												$option3 ="";
												while($row3=mysqli_fetch_array($result3)){
													$option3 = $option3."<option value=$row3[test1questionmas_key]>$row3[question_name]</option>";			
												}
												
												echo "<option value='' disabled selected hidden>Please Choose.............</option>";
												echo $option3;
												?>
											</select>
										</td>
										<td width="10%">
											<button type="submit" name="btn_addquestion" class="btn btn-sm btn-primary btn-block">Add</button>
										</td>
									</tr>
								</tbody>
							</table>
						</form>
						
					</div>
				</section>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-lg-1">
			
			</div>
            <div class="col-lg-10">
				<section class="panel panel-transparent">
					<div class="panel-body panel-transparent">
					<table class="table table-striped table-bordered display" id="example" width="100%">
							<thead>
								<tr>
									<th width="20%">Type</th>
									<th width="35%">Question A</th>
									<th width="35%">Question B</th>
									<th width="10%">Delete</th>
								</tr>
							</thead>
							<tbody>
								
								<?php
									$sql4="SELECT * FROM  test1_questionmgt_master
																		WHERE finact=0 ORDER BY test1_questionmgt_mas_key ASC";
									$result4 = mysqli_query($link,$sql4);
									while($row4=mysqli_fetch_array($result4)){
										$sql5="SELECT * FROM test1_question_master WHERE test1questionmas_key='$row4[question_a_key]' AND finact=0";
										$result5 = mysqli_query($link,$sql5);
										while($row5=mysqli_fetch_array($result5)){
											$question_a_nme=$row5['question_name'];
										}
										
										$sql6="SELECT * FROM test1_question_master WHERE test1questionmas_key='$row4[question_b_key]' AND finact=0";
										$result6 = mysqli_query($link,$sql6);
										while($row6=mysqli_fetch_array($result6)){
											$question_b_nme=$row6['question_name'];
										}
										
										echo "<tr>
												<td width='20%'>".$row4['type']."</td>
												<td width='35%'>".$question_a_nme."</td>
												<td width='35%'>".$question_b_nme."</td>
												<td width='10%'>
													<a href='add_test1questionmgt.php?qm=".$row4['test1_questionmgt_mas_key']."'><button type='button' class='btn btn-sm btn-danger btn-block'>Delete</button></a>
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
