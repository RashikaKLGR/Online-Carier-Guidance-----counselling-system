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
 
    $nm1 = $_POST['txt_exam'];
    $nm2 = $_POST['txt_stream'];
    
   
	$sql1="SELECT * FROM  exam_master WHERE exam_name='$nm1' AND stream='$nm2' AND finact=0";
	$result1 = mysqli_query($link,$sql1);
	if(mysqli_num_rows($result1)==0){
	
		$sql4="INSERT INTO exam_master (finact,status,exammas_key,exam_name,stream,act_person) 
								     VALUES(0,'A',NULL,'$nm1','$nm2','$ses_ukey')";
		if(mysqli_query($link,$sql4)){
			
			$sql6="SELECT * FROM exam_master WHERE exam_name='$nm1' AND stream='$nm2' AND finact=0";
			$result6 = mysqli_query($link,$sql6);
			while($rown=mysqli_fetch_array($result6)){
				$exammas_key=$rown['exammas_key'];
				
			}
			echo "<script>
				alert('Sucessfully Add Exam.');
				window.location.href='cd_exam.php?ex=$exammas_key';
			</script>";
		}
		else{
			$message="execute error";
		}
	}
	else{
		$message="Sorry,Dupilcate Exam";
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
     <?php include('navi.php') ?>
		<br>
		<br>
		<br>
		<br>
        <div class="row">
                <div class="col-lg-3">
                   
                </div>
                <?php
                if(isset($_POST['btn_add'])){
                ?>
					<div class="col-lg-6">
						<div class="row">
							<div class="col-lg-12">
									<section class="panel panel-primary panel-transparent">
										<div class="panel-body" align="center">
										   <strong><font color="#FF0000" size="+3"><?php    
											   
													echo $message;
												
											  
										   ?></font> </strong></br>
										</div>
									</section>
							</div>
						</div>
					</div> 
                <?php
                }
                ?>
        </div>
    	
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
                                      <label><font color="red">&lowast;</font>Exam</label>
                                      <input type="text" class="form-control input-sm" name="txt_exam" placeholder="Please Enter Exam" required>
									</div>
									<div class="form-group">
                                      <label><font color="red">&lowast;</font>Stream</label>
                                      <input type="text" class="form-control input-sm" name="txt_stream" placeholder="Please Enter Stream">
									</div>
									
									<button type="submit" name="btn_add" class="btn btn-lg btn-primary btn-block">Create Exam</button>
								</form>

							</div>
						</section>

					</div>
				</div>
			</div>
		</div>
		
		
    

   

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/twitter-bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-admin-theme-change-size.js"></script>
        <script type="text/javascript" src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
</body>
<?php
mysqli_close($link);
?>
</html>
