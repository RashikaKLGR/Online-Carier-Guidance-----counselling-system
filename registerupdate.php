<?php
include 'admin/conn.php';	
ob_start();
//error_reporting(0);	
?>

<?php

$cur_dte=date("Y-m-d");
?>

<?php
session_start();
if(isset($_POST['btn_update'])) {
  
    $nm1 = $_POST['txt_name'];
	$nm2 = $_POST['txt_birthday'];
    $nm3 = $_POST['txt_nic'];
	$nm4 = $_POST['txt_emailaddress'];
	$nm5 = $_POST['txt_password'];
	$nm6 = $_POST['txt_conformpassword'];
	$nm7 = $_POST['txt_addr'];
	$nm8 = $_POST['txt_tpNo'];
	
	
					
						$sql4="INSERT INTO student_master (finact,status,studentmas_key,student_nme,student_addr,tpnum,date_of_birth,nic_no,user_nme,password) 
												 VALUES(0,'A',NULL,'$nm1','$nm7','$nm8','$nm2','$nm3','$nm4','$pw')";
						if(mysqli_query($link,$sql4)){
							
							$sql2="SELECT * FROM  student_master WHERE student_nme='$nm1' AND nic_no='$nm3' AND finact=0";
							$result2= mysqli_query($link,$sql2);
							while($row2=mysqli_fetch_array($result2)){
								$studentmas_key=$row2['studentmas_key'];
							}
							
							
							$_SESSION['login_user'] = $nm4;
							$_SESSION['user_keye'] = $studentmas_key;
							
							header("location:student/process1.php");
							session_register("username","user_keye");
							
						}
						else{
							$message="execute error";
						
						}
}


	
	$sql21="SELECT * FROM student_master WHERE finact=0";
	$result21 = mysqli_query($link,$sql21);
	while($row21=mysqli_fetch_array($result21)){
		$textnicupdate1="textnicupdate".$row21['studentmas_key'];
		$txtkeyupdate1="txtkeyupdate".$row21['studentmas_key'];
		$btnupdate1="btnupdate".$row21['studentmas_key'];
		
	if(isset($_POST[$btnupdate1])){
	$sql10="UPDATE student_master SET nic_no='$_POST[$textnicupdate1]' WHERE studentmas_key='$_POST[$txtkeyupdate1]' AND finact=0";
	if(mysqli_query($link,$sql10)){
		echo "<script>
			alert('Sucessfully upate nic number');
			window.location.href='registerupdate.php';
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
    <title>Register</title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link rel="stylesheet" media="screen" href="admin/css/bootstrap.min.css">
        <link rel="stylesheet" media="screen" href="admin/css/bootstrap-theme.min.css">

        <!-- Bootstrap Admin Theme -->
        <link rel="stylesheet" media="screen" href="admin/css/bootstrap-admin-theme.css">
        <link rel="stylesheet" media="screen" href="admin/css/bootstrap-admin-theme-change-size.css">

        <!-- Vendors -->
        <link rel="stylesheet" media="screen" href="admin/vendors/easypiechart/jquery.easy-pie-chart.css">
        <link rel="stylesheet" media="screen" href="admin/vendors/easypiechart/jquery.easy-pie-chart_custom.css">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="js/html5shiv.js"></script>
           <script type="text/javascript" src="js/respond.min.js"></script>
        <![endif]-->
		<link rel="stylesheet" media="screen" href="admin/css/common.css">
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
<body style="background-position:center;
            background-attachment:fixed;
            background-size:100% 100%; background-image: url(admin/images/a3.jpg);">
     
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
                          
							<div class="panel-body"><div class="form-group">
                                        <form role="form" method="post" name="f1">
										<label><font color="red">&lowast;</font>nic_no</label>
										 <input type="text" name="txtsearchnic">
										<button type="submit" name="btn_search" class="btn btn-lg btn-primary btn-block">view</button>
										</form>

									</div>
									
							
						
								
									
									
                                  

							</div>
						</section>

					</div>
					<div class="row">
					<div class="col-lg-12">
						<section class="panel panel-primary panel-transparent">
                          
							<div class="panel-body">
							<form name="f3" method="post">
								<table class="table table-striped table-bordered display"  width="100%">
							<thead>
								<tr>
									<th width="20%">Student Name </th>
									<th width="10%">Date of Birth</th>
									<th width="10%">National Identy Card No</th>
									<th width="20%">Email Address</th>
									<th width="30%">Address</th>
									<th width="10%"></th
									
								</tr>
							</thead>
							<tbody>
								
								<?php
								 if(isset($_POST['btn_search'])){
									$sql20="SELECT * FROM student_master WHERE nic_no='$_POST[txtsearchnic]' AND finact=0"; 
								 }
								 else{
									$sql20="SELECT * FROM student_master WHERE finact=0";
									}
									$result20 = mysqli_query($link,$sql20);
									while($row20=mysqli_fetch_array($result20)){
										$textnicupdate="textnicupdate".$row20['studentmas_key'];
										$txtkeyupdate="txtkeyupdate".$row20['studentmas_key'];
										$btnupdate="btnupdate".$row20['studentmas_key'];
										
										echo "<tr>
												<td width='20%'>".$row20['student_nme']." </td>
												<td width='10%'>".$row20['date_of_birth']." </td>
												<td width='10%'>".$row20['nic_no']." </td>
												<td width='20%'>".$row20['student_nme']." </td>
												<td width='30%'>".$row20['student_addr']." </td>
												<td width='10%'>
												<input type='hidden' name='".$txtkeyupdate."' value='".$row20['studentmas_key']."' >
												<input type='text' name='".$textnicupdate."'  >
												<button type='submit' name='".$btnupdate."' class='btn btn-sm btn-danger btn-block'>UPDATE</button> </td>
											</tr>";
									}
								?>
								
							</tbody>
						</table>
						</form>
				</div>
			</div>
		</div>
    
	
   

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script type="text/javascript" src="admin/js/jquery-2.0.3.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script type="text/javascript" src="admin/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="admin/js/twitter-bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="admin/js/bootstrap-admin-theme-change-size.js"></script>
        <script type="text/javascript" src="admin/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
</body>
<?php
mysqli_close($link);
?>
</html>
