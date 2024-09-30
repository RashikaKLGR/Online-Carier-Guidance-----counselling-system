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
 
    $nm1 = $_POST['sele_coursetype'];
    $nm2 = $_POST['sele_courselevel'];
    $nm3 = $_POST['txt_coursenme'];
    
	$sql3="SELECT * FROM coursetype_master WHERE coursetype_mas_key='$nm1' AND finact=0";
	$result3 = mysqli_query($link,$sql3);
	while($row3=mysqli_fetch_array($result3)){
		$coursetype_nme=$row3['coursetype_nme'];
	}
	
	$sql5="SELECT * FROM course_level_master WHERE courselevelmas_key='$nm2' AND finact=0";
	$result5 = mysqli_query($link,$sql5);
	while($row5=mysqli_fetch_array($result5)){
		$course_level=$row5['course_level'];
	}
	
	
	$sql1="SELECT * FROM course_master WHERE coursetype_key='$nm1' AND course_nme='$nm3' AND finact=0";
	$result1 = mysqli_query($link,$sql1);
	if(mysqli_num_rows($result1)==0){
	
		$sql4="INSERT INTO course_master (finact,status,coursemas_key,coursetype_key,course_type,courselevel_key,course_level,course_nme,act_person) 
								     VALUES(0,'A',NULL,'$nm1','$coursetype_nme','$nm2','$course_level','$nm3','$ses_ukey')";
		if(mysqli_query($link,$sql4)){
			
			$sql2="SELECT * FROM course_master WHERE coursetype_key='$nm1' AND course_nme='$nm3' AND finact=0";
			$result2 = mysqli_query($link,$sql2);
			while($row2=mysqli_fetch_array($result2)){
				$coursemas_key=$row2['coursemas_key'];
			}
			echo "<script>
				alert('Sucessfully Add Course.');
				window.location.href='cd_course.php?cr=$coursemas_key';
			</script>";
		}
		else{
			$message="execute error";
		}
	}
	else{
		echo "<script>
				alert('Sorry, Dupilcate Course.');
				
			</script>";
	}
}

?>

<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Mgt</title>

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

            <div class="col-lg-2">

            </div>
            
                
			<div class="col-lg-8">
				<div class="row">
					<div class="col-lg-12">
						<section class="panel panel-primary panel-transparent">
                          
							<div class="panel-body">
								<form role="form" method="post" name="f1">
									
									<div class="form-group">
                                        <label><font color="red">&lowast;</font>Course Type</label>
										<select class="form-control input-sm" name="sele_coursetype" required>
										<?php
											$sql1="SELECT * FROM coursetype_master where finact=0"; 
																				
											$result1=mysqli_query($link,$sql1);
											$option1 ="";
											while($row1=mysqli_fetch_array($result1)){
												$option1 = $option1."<option value=$row1[coursetype_mas_key]>$row1[coursetype_nme] </option>";			//Load Reagon Name
											}
											?>
												<option value="" disabled selected hidden>Please Choose.............</option>";
                                                <?php echo $option1; ?> 	
											    
										</select>
									</div>
									
									<div class="form-group">
										<label><font color="red">&lowast;</font>Course Level</label>
										<select class="form-control input-sm" name="sele_courselevel">
											<?php
											$sql2="SELECT * FROM course_level_master WHERE finact=0";
											$result2=mysqli_query($link,$sql2);
											$option2 ="";
											while($row2=mysqli_fetch_array($result2)){
												$option2 = $option2."<option value=$row2[courselevelmas_key]>$row2[course_level]</option>";			//Load Reagon Name
											}
											?>
												<option value="" disabled selected hidden>Please Choose.............</option>";
                                                <?php echo $option2; ?>    
										</select>
									</div>
									
									<div class="form-group">
                                      <label><font color="red">&lowast;</font>Course Name</label>
                                      <input type="text" class="form-control input-sm" name="txt_coursenme" placeholder="Please Enter Course Name" required>
									</div>
									
									<button type="submit" name="btn_add" class="btn btn-lg btn-primary btn-block">Create Course</button>
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
