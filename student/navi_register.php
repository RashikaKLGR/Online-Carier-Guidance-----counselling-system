 <html>

<!-- main / large navbar -->
        <nav class="navbar navbar-default navbar-fixed-top bootstrap-admin-navbar bootstrap-admin-navbar-small" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="home.php">Path Mgt</a>
                        </div>
                        <div class="collapse navbar-collapse main-navbar-collapse">
                            <ul class="nav navbar-nav">
                                
								<li><a href="home.php">Dashboard</a></li>
								<li><a href="appointment.php">Appoinment</a></li>
								<li><a href="trainingpoint.php">Request Training Point</a></li>
								<li><a href="businessloan.php">Business Loan Programme</a></li>
								<li><a href="register_newcourse_apply.php">Apply New Course</a></li>
								<li><a href="viewtestresult.php">Test Result</a></li>
								<li><a href="update_info.php">Update Your Profile</a></li>
								
								<!--<li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-hover="dropdown">Master Menu <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
										<li><a href="add_test2question.php">Test2 -Question</a></li>
										<li><a href="cd_test2question_menu.php">Update Test2 -Question</a></li>
										<li><a href="add_test1question.php">Add Test1 -Question</a></li>
										<li><a href="cd_test1question_menu.php">Update Test1 -Question</a></li>
										<li><a href="user_registration.php">User Registration</a></li>
										<li><a href="reset_pws.php">Reset Password</a></li>
                                    </ul>
									
                                </li>
								
                               
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-hover="dropdown">Exam Mgt.<b class="caret"></b></a>
									<ul class="dropdown-menu">
											<li><a href="add_exam.php">Add Exam</a></li>
											<li><a href="cd_exammenu.php">Change or Disable Exam</a></li>
										  
									</ul>
								</li>
								
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-hover="dropdown">Course Mgt.<b class="caret"></b></a>
									<ul class="dropdown-menu">
											<li><a href="add_course.php">Add Course</a></li>
											<li><a href="cd_coursemenu.php">Change or Disable Course</a></li>
											<li><a href="add_course_level.php">Add Course Level</a></li>
											<li><a href="cd_courselevelmenu.php">Change or Disable Course Level</a></li>
											<li><a href="add_course_type.php">Add Course Type</a></li>
											<li><a href="cd_coursetypemenu.php">Change or Disable Course Type</a></li>
										  
									</ul>
								</li>
								
								<!--<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-hover="dropdown">Hotel Mgt.<b class="caret"></b></a>
									<ul class="dropdown-menu">
											<li><a href="add_hotel.php">Add Hotel</a></li>
											<li><a href="cd_hotelmenu.php">Change or Disable Hotels</a></li>
										    <li><a href="re_hotelmenu.php">Restore Hotels</a></li>
									</ul>
								</li>

								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-hover="dropdown">Orders.<b class="caret"></b></a>
									<ul class="dropdown-menu">
											<li><a href="pending_orders.php">Pending Orders</a></li>
											<li><a href="approve_orders.php">Approve Order</a></li>
										    <li><a href="cancel_orders.php">Canceled Order</a></li>
									</ul>
								</li>
								
								<li><a href="client_detail.php">Clients Details</a></li>
								
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-hover="dropdown">Comments and Rating<b class="caret"></b></a>
									<ul class="dropdown-menu">
											<li><a href="pending_comment.php">Pending Comments and Rating</a></li>
											<li><a href="approve_comment.php">Approve Comments and Rating</a></li>
										    <li><a href="canceled_comment.php">Canceled Comments and Rating</a></li>
									</ul>
								</li>-->
								
                            </ul>
							<ul class="nav navbar-nav navbar-right">
			
							  <li><a><span class="glyphicon glyphicon-user"></span>  <?php echo $ses_user;?></a></li>
							  <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Log Out</a></li>
							
							</ul>
                        </div><!-- /.navbar-collapse -->
                    </div>
                </div>
            </div><!-- /.container -->
        </nav>
</html>