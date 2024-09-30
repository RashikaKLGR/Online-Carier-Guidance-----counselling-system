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
                            <a class="navbar-brand" href="home.php">MIS</a>
                        </div>
                        <div class="collapse navbar-collapse main-navbar-collapse">
                            <ul class="nav navbar-nav">
                                
								<li><a href="home.php">Home</a></li>
								<?php
								if($ses_ulevel=="VP"){
								?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-hover="dropdown">Master Menu <b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="user_registration.php">User Registration</a></li>
											<li><a href="reset_pws.php">Reset Password</a></li>
										</ul>
										
									</li>
								<?php
								}
								?>
								
								<?php
								if($ses_ulevel=="Carrer Guide Officer"){
								?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-hover="dropdown">Appoinment <b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="appoinment_upcoming.php">Upcoming Appoinment</a></li>
											<li><a href="appoinment_pending.php">Pending Appoinment</a></li>
											<li><a href="appoinment_approve.php">Approve Appoinment</a></li>
										</ul>
										
									</li>
								<?php
								}
								?>
								
								
								<li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-hover="dropdown">Request Courses <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
										<li><a href="requestcourse_list.php">Students pending registration</a></li>
										<?php
										if($ses_ulevel=="VP"){
										?>
											<li><a href="inform_course.php">Schedule Interview/appitude Test</a></li>
										<?php
										}
										?>
										<li><a href="requestcoursehistory_list.php">Students notified of registration</a></li>
										<li><a href="requestcourseregisterpending_list.php">Not eligible or registration not verified.</a></li>
                                    </ul>
									
                                </li>
								
								<?php
								if($ses_ulevel=="Carrer Guide Officer"){
								?>
								<li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-hover="dropdown">Training Point <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
										<li><a href="pending_trainingpoint_list.php">Pending Training Point</a></li>
										<li><a href="approve_trainigpoint.php">Approve Training Point</a></li>
                                    </ul>
									
                                </li>
								<?php
								}
								?>
								
								<?php
								if($ses_ulevel=="Carrer Guide Officer"){
								?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-hover="dropdown">Business Loan Programme <b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="businessloan_pending.php">Pending Business Loan Programme</a></li>
											<li><a href="businessloan_approve.php">Approve Business Loan Programme</a></li>
										</ul>
										
									</li>
								<?php
								}
								?>
								
								<li><a href="test_details.php">Test Details</a></li>
								
								<li><a href="student_list.php">Student Info</a></li>
								
								<?php
								if($ses_ulevel=="Carrer Guide Officer"){
								?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-hover="dropdown">career Interest Test Mgt <b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="add_test1questionmgt.php">Test1 Question Management</a></li>
											<li><a href="add_test1question.php">Add Test1 Category</a></li>
											<li><a href="cd_test1question_menu.php">Update Test1 Category</a></li>
											
										</ul>
										
									</li>
									
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-hover="dropdown">Career Key Test Mgt <b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="add_test2question.php">Test2 -Question</a></li>
											<li><a href="cd_test2question_menu.php">Update Test2 -Question</a></li>
											
										</ul>
										
									</li>
								<?php
								}
								?>
								
								<?php
								if($ses_ulevel=="VP"){
								?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-hover="dropdown">Exam Mgt.<b class="caret"></b></a>
										<ul class="dropdown-menu">
												<li><a href="add_exam.php">Add Exam</a></li>
												<li><a href="cd_exammenu.php">Change or Disable Exam</a></li>
											  
										</ul>
									</li>
								<?php
								}
								?>
								
								<?php
								if($ses_ulevel=="VP" ||	$ses_ulevel=="Carrer Guide Officer"){							
								?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-hover="dropdown">Course Mgt.<b class="caret"></b></a>
										<ul class="dropdown-menu">
												<?php
												if($ses_ulevel=="VP"){
												?>
													<li><a href="add_batchupdate.php">Batch Update</a></li>
													<li><a href="add_course.php">Add Course</a></li>
													<li><a href="cd_coursemenu.php">Change or Disable Course</a></li>
													<li><a href="add_course_level.php">Add Course Level</a></li>
													<li><a href="cd_courselevelmenu.php">Change or Disable Course Level</a></li>
													<li><a href="add_course_type.php">Add Course Type</a></li>
													<li><a href="cd_coursetypemenu.php">Change or Disable Course Type</a></li>
												<?php
												}
												?>
												<?php
												if($ses_ulevel=="Carrer Guide Officer"){
												?>
													<li><a href="add_careerpath.php">Add Career Path</a></li>
												<?php
												}
												?>
										</ul>
									</li>
								<?php
								}
								?>
								<!--<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-hover="dropdown">Courses<b class="caret"></b></a>
										<ul class="dropdown-menu">
												<li><a href="view_courselist.php">All Courses</a></li>
												
												<li><a href="">Opened batches</a></li>
												
										</ul>
								</li>-->
								
								<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-hover="dropdown">Reports<b class="caret"></b></a>
										<ul class="dropdown-menu">
												<li><a href="tcpdf/reports/registerd_student.php">Registered Student</a></li>
												<?php
												if($ses_ulevel=="VP"){
												?>
													<li><a href="report_interviewshedule.php">Interview Shedule</a></li>
												<?php
												}
												?>
												<?php
												if($ses_ulevel=="Carrer Guide Officer"){
												?>
													<li><a href="report_ojt.php">OJT Placement</a></li>
												<?php
												}
												?>
												<li><a href="tcpdf/reports/training.php">Training</a></li>
										</ul>
								</li>
								
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