<?php
include 'admin/conn.php';
ob_start();
 error_reporting(0);
 ?>


<?php
$message="";

session_start();
	if (isset($_POST['btn_login']) && !empty($_POST['txt_username']) && !empty($_POST['txt_password'])) {
           
        $username=$_POST['txt_username'];
        $password=MD5($_POST['txt_password']);
        
        $username=stripslashes($username);
        $password=stripslashes($password);
        
        $username = mysqli_real_escape_string($link,$username);
        $password = mysqli_real_escape_string($link,$password);

		$sql = "SELECT * FROM student_master WHERE user_nme = '$username' and password = '$password' and status=0";
		$result = mysqli_query($link,$sql);
		while($row=mysqli_fetch_array($result)){

		   $unme=$row['user_nme'];
		   $pass=$row['password'];
		   $ukey=$row['studentmas_key'];
		   
		}
    
		if($unme == $username && $pass == $password){
			
                if($password=="8af95fe2ab1a54b488ef8efb3f3b0797"){ //9900

                        $_SESSION['login_user'] = $username;
                        $_SESSION['user_keye'] = $ukey;
                        
                        header("location:newpassword.php");
                        session_register("username","user_keye");
                }
                else{
                    $_SESSION['login_user'] = $username;
					$_SESSION['user_keye'] = $ukey;
					
                    header("location:student/home.php");
                    session_register("username","user_keye");
                }
            
        }
		else{
			
			echo "<script>
					alert('Your UserName or Password is invalid.');
					window.location.href='index.php';
				</script>";
		}
		
	}
	else{
        
        $message = "Login";
        
	}
      


?>

<!DOCTYPE html>

<html class="bootstrap-admin-vertical-centered">
    <head>
        <title>Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap -->
        <link rel="stylesheet" media="screen" href="admin/css/bootstrap.min.css">
        <link rel="stylesheet" media="screen" href="admin/css/bootstrap-theme.min.css">

        <!-- Bootstrap Admin Theme -->
        <link rel="stylesheet" media="screen" href="admin/css/bootstrap-admin-theme.css">
		<link rel="stylesheet" media="screen" href="admin/css/common.css">

        <!-- Custom styles -->
        <style type="text/css">
            .alert{
                margin: 0 auto 20px;
            }
        </style>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
           <script type="text/javascript" src="js/html5shiv.js"></script>
           <script type="text/javascript" src="js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body style="background-position:center;
            background-attachment:fixed;
            background-size:100% 100%; background-image: url(admin/images/a2.jpg);">
        <br>
		<br>
        <div class="container">
			
            <div class="row">
				<div class="col-lg-8">
				</div>
                <div class="col-lg-4">
					<a href="admin/index.php"><button class="btn btn-lg btn-primary btn-block">Staff Login</button></a>
					<br>
					<br>
					<section class="panel-primary panel-transparent">
						<div class="panel-body">
							<form method="post" >
								<?php
								if($message==""){
								?>
							
									<h2>Login</h2>
								
								<?php
								}
								else{
								?>
								
								  <h3><?php echo $message; ?></h3>
								
							   <?php
								}
							   ?>
								
								<div class="form-group">
									<input class="form-control" type="text" name="txt_username" placeholder="Email">
								</div>
								<div class="form-group">
									<input class="form-control" type="password" name="txt_password" placeholder="Password">
								</div>
								
								<button class="btn btn-lg btn-primary btn-block" name='btn_login' type="submit">Login</button>
								
							</form>
							<br>
							<a href="frogetpassword.php"><button class="btn btn-sm btn-danger btn-block">Froget Password</button></a>
							<br>
							 <a href="register.php"><button class="btn btn-lg btn-success btn-block" name='btn_login' type="submit">Register Now</button></a>
						</div>
					</section>
                </div>
				
            </div>
        </div>

       <script type="text/javascript" src="admin/js/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="admin/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(function() {
                // Setting focus
                $('input[name="email"]').focus();

                // Setting width of the alert box
                var alert = $('.alert');
                var formWidth = $('.bootstrap-admin-login-form').innerWidth();
                var alertPadding = parseInt($('.alert').css('padding'));

                if (isNaN(alertPadding)) {
                    alertPadding = parseInt($(alert).css('padding-left'));
                }

                $('.alert').width(formWidth - 2 * alertPadding);
            });
        </script>
    </body>
</html>
