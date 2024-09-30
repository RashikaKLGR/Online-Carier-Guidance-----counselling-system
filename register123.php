<?php
include 'admin/conn.php';	
ob_start();
//error_reporting(0);	
?>

<?php

$cur_dte=date("Y-m-d");
?>

<?php
$message="";
session_start();
if(isset($_POST['btn_add'])) {
  
    $nm1 = $_POST['txt_name'];
	$nm2 = $_POST['txt_birthday'];
    $nm3 = $_POST['txt_nic'];
	$nm4 = $_POST['txt_emailaddress'];
	$nm5 = $_POST['txt_password'];
	$nm6 = $_POST['txt_conformpassword'];
	$nm7 = $_POST['txt_addr'];
	
	
	//Validate NIC
	if(strlen($nm3) == 10 || strlen($nm3) == 12){ 
		$sql1="SELECT * FROM  student_master WHERE student_nme='$nm1' AND nic_no='$nm3' AND finact=0";
		$result1 = mysqli_query($link,$sql1);
		if(mysqli_num_rows($result1)==0){
			
			if($nm5==$nm6){		
					$pw=MD5($nm5);
					
					if( !preg_match( '/[^A-Za-z0-9]+/', $nm5) || strlen($nm5) < 8){
						echo "<script>
								alert('Password length should be 8 character or more and should be included a special character')
							</script>";
					}
			//Validate Password
					
					else{
					
						$sql4="INSERT INTO student_master (finact,status,studentmas_key,student_nme,student_addr,date_of_birth,nic_no,user_nme,password) 
												 VALUES(0,'A',NULL,'$nm1','$nm7','$nm2','$nm3','$nm4','$pw')";
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
					
			}
			
			else{
				
				echo "<script>
						alert('Sorry,Not Match Password !! Try Again!!.');
						window.location.href='register.php';
					</script>";
			}
			
		}
		else{
			
			echo "<script>
					alert('Sorry,You are already registerd!!!.');
					window.location.href='register.php';
				</script>";
		}
	}
	
	else{
		echo "<script>
					alert('Sorry,Invalid Nic No!!!.');
					window.location.href='register.php';
				</script>";
		
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
                          
							<div class="panel-body">
								<form role="form" method="post" name="f1">
									
									<div class="form-group">
                                        <label><font color="red">&lowast;</font>Name</label>
                                      <input type="text" class="form-control input-sm" name="txt_name" placeholder="Please Enter Name" required>
									</div>
									<div class="form-group">
                                        <label><font color="red">&lowast;</font>Address</label>
                                      <input type="text" class="form-control input-sm" name="txt_addr" placeholder="Please Enter Address" required>
									</div>
									<div class="form-group">
                                        <label><font color="red">&lowast;</font>Date of Birth</label>
                                      <input type="date" class="form-control input-sm" name="txt_birthday"  required>
									</div>
									<div class="form-group">
                                        <label><font color="red">&lowast;</font>National Identy Card No</label>
                                      <input type="text" class="form-control input-sm" name="txt_nic" maxlength="12" size="12" placeholder="Please Enter National Identy Card No" >
									</div>
									<div class="form-group">
                                        <label><font color="red">&lowast;</font>Email Address</label>
                                      <input type="text" class="form-control input-sm" name="txt_emailaddress"  placeholder="Please Enter Email Address" required>
									</div>
									<div class="form-group">
                                        <label><font color="red">&lowast;</font>Password</label>
                                      <input type="password" class="form-control input-sm" name="txt_password"  placeholder="Please Enter Password" required>
									</div>
									<div class="form-group">
                                        <label><font color="red">&lowast;</font>Conform Password</label>
                                      <input type="password" class="form-control input-sm" name="txt_conformpassword"  placeholder="Please Enter Confirm Password" required>
									</div>
                                  <button type="submit" name="btn_add" class="btn btn-lg btn-primary btn-block">Register Now</button>
								</form>

							</div>
						</section>

					</div>
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
