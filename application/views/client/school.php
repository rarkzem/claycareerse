	<!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?php echo base_url()?>claycareer">ClayCareer</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
           
			<li class="nav-item">
              <a class="nav-link" href="<?php echo base_url()?>claycareer/career"><i class="fa fa-mortar-board"></i>&nbsp;Career&nbsp;</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url()?>claycareer/news"><i class="fa fa-newspaper-o"></i>&nbsp;News&nbsp;</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="<?php echo base_url()?>claycareer/forums"><i class="fa fa-users"></i>&nbsp;Forums&nbsp;</a>
            </li>
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle"></i>
                User
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="<?php echo base_url()?>claycareer/profile"><i class="fa fa-user"></i>&nbsp;&nbsp;Profile&nbsp;</a>
                <a class="dropdown-item" href="<?php echo base_url()?>claycareer/logout"><i class="fa fa-sign-out"></i>&nbsp;Logout&nbsp;</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Institute
        <small>Subheading</small>
      </h1>

      <ol class="breadcrumb" style="margin-top: 20px">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="index.html">Career</a>
        </li>
		<li class="breadcrumb-item">
          <a href="index.html">Course</a>
        </li>
		<li class="breadcrumb-item active">Institute</li>
      </ol>

		<div class="row">
			<h1 class="justify-content-center mb-4" style="margin: 15px;">
			<?php 
			foreach($school as $s)
			{
			echo $s['school_name'];
			}
			?>
			
			</h1>
		</div>
      <!-- Portfolio Item Row -->
      <div class="row">

        <div class="col-md-8">
          <img class="img-fluid" src="
				<?php 
				echo base_url('uploads/images/');
				foreach($school as $s){
				echo $s['school_pic'];
				}
			?>" alt="">
        </div>

        <div class="col-md-4">
          <h3 class="my-3">About</h3>
          <p><?php 
				foreach($school as $s){
				echo $s['school_description'];
				}
			?></p>
          <h3 class="my-3">Contact Details</h3>
          <p>
            <b>Location:</b>&nbsp;
			  <?php 
				foreach($school as $s){
				echo $s['school_location'];
				}
			?>
          </p>
          <p>
            <b>Email:</b>&nbsp;
            <a href="mailto:<?php 
				foreach($school as $s){
				echo $s['school_email'];
				}
			?>">
				<?php 
				foreach($school as $s){
				echo $s['school_email'];
				}
			?>
            </a>
          </p>
          <p>
            <b>Phone:</b>&nbsp;
			  <?php 
				foreach($school as $s){
				echo $s['school_contact'];
				}
			?>
          </p>
		  <p>
            <b>Website:</b>&nbsp;
			  <a href="">
				<?php 
				foreach($school as $s){
				echo $s['school_website'];
				}
			?>
            </a>
          </p>
        </div>

      </div>
      <!-- /.row -->

      <!-- /.row -->

    </div>