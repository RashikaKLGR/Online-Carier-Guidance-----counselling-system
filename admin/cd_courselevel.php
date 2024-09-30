<?php
include 'conn.php';	
include 'session_handler.php';	
//error_reporting(0);	
?>

<?php
$cur_dte=date("Y-m-d");
?>

<?php
	$sql1="SELECT * FROM course_level_master WHERE courselevelmas_key='$_GET[cl]' AND finact=0";
	$result1 = mysqli_query($link,$sql1);
    while($row1=mysqli_fetch_array($result1)){
		$course_level=$row1['course_level'];
		
	}

	if(isset($_POST['btn_delete'])){
		$sql2="UPDATE course_level_master SET finact=1 WHERE courselevelmas_key='$_GET[cl]' AND finact=0";
		if(mysqli_query($link,$sql2)){
			echo "<script>
				alert('Sucessfully Update Course Level.');
				window.location.href='cd_courselevelmenu.php';
			</script>";
		}
	}
?>

<!DOCTYPE html>
<html  class="bootstrap-admin-vertical-centered">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Level</title>

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
						<h1 align="center" style="font-size:22px;font-weight:bold"><?php echo $course_level; ?></h1>
						<br>
						<br>
						<form name="f1" method="post">
							<button type="submit" name="btn_delete" class="btn btn-lg btn-danger btn-block">Delete</button>
						</form>
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
