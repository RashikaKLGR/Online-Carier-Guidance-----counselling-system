<?php
error_reporting(0);
include 'conn.php';		
include 'session_handler.php';
?>
<?php



$cur_dte=date("Y-m-d");
$back_dte=date("Y-m-d",strtotime("-1 days"));

?>


<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
    <head>
         <title>3rd Step</title>
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
        <?php //include('navi.php') ?>
		<br>
		<br>
		<div class="row">
			<div class="col-lg-1">
			</div>
            <div class="col-lg-10">
				<section class="panel panel-primary panel-transparent">
					<div class="panel-body">
						<div class="row">
						  <div class="col-lg-3">
							<a href="process2.php"><button type="button" class="btn btn-lg btn-danger btn-block">Back</button></a>
						  </div>
						  <div class="col-lg-6">
							<h1 style="color:#ffffff;font-weight:bold" align="center">Step 03</h1>
						  </div>
						  <div class="col-lg-3">
							
						  </div>
					</div>
				</section>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-2">
			</div>
            <div class="col-lg-8">
				<section class="panel panel-primary panel-transparent">
					<div class="panel-body">
						<h3 style="color:#ffffff;font-weight:bold" align="center">Please select the test of your choice?</h3>
						<br>
						<div class="row">
							<div class="col-lg-6">
							
							</div>
							<div class="col-lg-3">
								<a href="test1_process.php"><button type="button" class="btn btn-lg btn-success btn-block">Career Interest Test</button></a>
							</div>
							<div class="col-lg-3">
								<a href="test2_process.php"><button type="button" class="btn btn-lg btn-success btn-block">Career Key Test</button></a>
							</div>
						</div>
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
	
    </body>
</html>