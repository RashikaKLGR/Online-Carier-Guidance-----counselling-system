<?php
include 'admin/conn.php';	

//error_reporting(0);	
?>

<?php

$cur_dte=date("Y-m-d");
?>

<?php

if(isset($_POST['btn_add'])) {
  
   
	$nm1 = $_POST['txt_emailaddress'];
	
	$msgheader=" Password Reset Successfully";
	
	$sql1="SELECT * FROM  student_master WHERE user_nme='$nm1' AND finact=0";
	$result1 = mysqli_query($link,$sql1);
	if(mysqli_num_rows($result1)>0){
		while($row1=mysqli_fetch_array($result1)){
			$stnme=$row1['student_nme'];
			$stkey=$row1['studentmas_key'];
		}
		
		$pw=MD5(9900);
		
		$sql2="UPDATE student_master SET password='$pw' WHERE studentmas_key='$stkey' AND finact=0";
		mysqli_query($link,$sql2);
		
			$to=$nm1;
			$from=$nm1;
			$subject=$msgheader;				//subject eka danna
			$msg1="Dear : ".$stnme."\r\n"."Your password has been changed successfully.\r\n"."Use 9900 as your new password\r\n"."Then set a new password\r\n"."Thank You";						//message eka danna
			
			$headers="From: $from";

			$ok3=mail($to,$subject,$msg1,$headers);
			if($ok3){
				echo "<script>
						alert('Your password has been changed successfully. Check your email.');
						window.location.href='index.php';
						</script>";
			}
			else{
				header("location:index.php");
				$message = "Mail could not be sent";
			}
			die();
	}
	else{
		
		echo "<script>
				alert('Sorry,Invalid Information!!!.');
				window.location.href='frogetpassword.php';
			</script>";
	}
}

?>

<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Froget Password</title>

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
                                        <label><font color="red">&lowast;</font>Email Address</label>
                                      <input type="text" class="form-control input-sm" name="txt_emailaddress"  placeholder="Please Enter Email Address" required>
									</div>
									
                                  <button type="submit" name="btn_add" class="btn btn-lg btn-primary btn-block">Froget Password</button>
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
