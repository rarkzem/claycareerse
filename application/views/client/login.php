	<!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?php echo base_url()?>claycareer">ClayCareer</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item" style="margin: 5px">
			  <a class="btn btn-info btn-outline-info" href="<?php echo base_url()?>claycareer/login"><i class="fa fa-sign-in"></i>&nbsp;Sign In</a>
            </li>
			<li class="nav-item" style="margin: 5px">
			  <a class="btn btn-info btn-outline-info" href="<?php echo base_url()?>claycareer/signup"><i class="fa fa-user"></i>&nbsp;Sign Up</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

	<!-- Adjustment Div !-->
	<div style="margin-top:25px">
	</div>

	<!-- Page Content -->
    <div class="container">

   	  <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url()?>claycareer">Home</a>
        </li>
        <li class="breadcrumb-item active">Login</li>
      </ol>

      <div class="row">

        <!-- Sidebar Widgets Column -->
        <div class="col-md-5">

          <!-- Search Widget -->
          <div class="card mb-4">
            <h5 class="card-header">Login</h5>
            <div class="card-body">
			  <form id="loginform" class="form-horizontal" role="form" action="<?php echo base_url()?>claycareer/validatelogin" method="post">
			    	<div style="float:right; font-size: 80%; position: relative; top:-10px; font-weight: bold">
						<a href="#">Forgot password?</a>
					</div>
					<div class="form-group">
							<div class="row">
								<label for="email" class="col control-label"><h6>Email</h6></label>
							</div>
							<div class="col">
								<input type="text" class="form-control" name="email" placeholder="Email">
							</div>
                    </div>
						
					<div class="form-group">
							<div class="row">
								<label for="password" class="col control-label"><h6>Password</h6></label>
							</div>
							<div class="col">
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
                    </div>
										
						<div class="input-group">
                        	<div class="checkbox">
                            <label>
                            	<input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                            </label>
                            </div>
                       	</div>

						
                     	<div class="form-group">
                        	<!-- Button -->
							<div class="col-sm-12 controls">
								<input type="submit" value="Login" class="btn btn-success btn-lg btn-block">							
							</div>
                        </div>

						<div class="form-group">
                        	<div class="col-md-12 control">
                            	<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%; font-weight: bold" >
                                	Don't have an account! 
                                    <a href="<?php echo base_url()?>claycareer/signup">
                                   		Sign Up Here
                                    </a>
                                </div>
                            </div>
                        </div>
			</form> 
            </div>
          </div>
      </div>
		 </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

	

