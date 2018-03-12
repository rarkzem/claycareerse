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
              <a class="nav-link" href="services.html"><i class="fa fa-mortar-board"></i>&nbsp;Career&nbsp;</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html"><i class="fa fa-newspaper-o"></i>&nbsp;News&nbsp;</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="contact.html"><i class="fa fa-users"></i>&nbsp;Forums&nbsp;</a>
            </li>
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                User
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="portfolio-1-col.html">Profile</a>
                <a class="dropdown-item" href="portfolio-2-col.html">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

		<!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">News
        <small>Subheading</small>
      </h1>

      <ol class="breadcrumb" style="margin-top: 20px">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">News - All</li>
      </ol>

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
			<!-- Blog Post -->
			<?php
			  foreach($users as $u)
			  {
				echo '<div class="card mb-4">
				<img class="card-img-top" src="';
		        echo base_url('uploads/images/');echo $u['news_pic']; 
				echo '" alt="Card image cap">
				<div class="card-body">
				  <h2 class="card-title">';
				  echo $u['news_title'];
				  echo '</h2>
				  <p class="card-text">';
				  echo $u['news_heading'];
				  echo '</p>
				  <a href="';
				  echo base_url().'claycareer/article/';
				  echo $u['news_id']; 
				  echo '"class="btn btn-primary">Read More &rarr;</a>
				</div>
				<div class="card-footer text-muted">';
				echo 'Posted on January 1, 2017 by';
				echo '</div>
			  	</div>';  
			  }
		   	  echo $links;
		   ?>
		</div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card mb-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
				<form id="loginform" class="form-horizontal" role="form" action="<?php echo base_url()?>claycareer/news" method="post">
				  <div class="input-group">
					<input type="text" class="form-control" name="search" placeholder="Search for...">
					<span class="input-group-btn">
					  <input type="submit" value="Go" class="btn btn-secondary">
					</span>
				  </div>
				</form>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="<?php echo base_url()?>claycareer/filternews/blog">Blog</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url()?>claycareer/filternews/education">Education</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url()?>claycareer/filternews/events">Events</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="<?php echo base_url()?>claycareer/filternews/hirings">Hirings</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url()?>claycareer/filternews/interviews">Interviews</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url()?>claycareer/filternews/trends">Trends</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>