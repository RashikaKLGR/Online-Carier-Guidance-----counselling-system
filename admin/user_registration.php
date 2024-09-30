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
  
    
    $nm2 = $_POST['txt_empname'];
	$nm1 = $_POST['txt_designation'];
    $nm3 = $_POST['txt_username'];
	$nm4 = $_POST['sele_ulevel'];
	
	
	$sql1="SELECT * FROM user_master WHERE user_nme='$nm3' AND finact=0";
	$result1 = mysqli_query($link,$sql1);
	if(mysqli_num_rows($result1)==0){
		
				
				$pw=MD5(9900);
				
					$sql4="INSERT INTO user_master (finact,status,usermaster_key,name,designation,user_level,user_nme,password,act_person) 
					                         VALUES(0,'A',NULL,'$nm2','$nm1','$nm4','$nm3','$pw','$ses_ukey')";
					if(mysqli_query($link,$sql4)){
						echo "<script>
							alert('Sucessfully Registration.');
							window.location.href='user_registration.php';
						</script>";
					}
					else{
						$message="execute error";
					}
				
				
		
	}
	else{
		$message="Sorry,Dupilcate User Name";
	}
}

?>

<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

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
<body style="background-position:center;
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
                                        <label><font color="red">&lowast;</font>Employee Name</label>
                                      <input type="text" class="form-control input-sm" name="txt_empname" placeholder="Please Enter Employee Name" required>
									</div>
									<div class="form-group">
                                        <label><font color="red">&lowast;</font>Designation</label>
                                      <input type="text" class="form-control input-sm" name="txt_designation" placeholder="Please Enter Designation" required>
									</div>
									<div class="form-group">
                                        <label><font color="red">&lowast;</font>User Name</label>
                                      <input type="text" class="form-control input-sm" name="txt_username"  placeholder="Please Enter User Name" required>
									</div>
									<div class="form-group">
                                        <label><font color="red">&lowast;</font>User Level</label>
										<select class="form-control input-sm" name="sele_ulevel" required>
													 <option value="" disabled selected hidden>Please Choose.............</option>";
                                                      <option value="Carrer Guide Officer">Carrer Guide Officer</option>
													  <option value='VP'>VP</option>
													  <option value='HOD'>HOD</option>
										</select>
									</div>
								  
								
                                  <button type="submit" name="btn_add" class="btn btn-lg btn-primary btn-block">Add New User</button>
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
