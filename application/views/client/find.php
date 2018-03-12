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
      <h1 class="mt-4 mb-3">Career
        
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Career</li>
      </ol>

	<form id="loginform" class="form-horizontal" role="form" action="<?php echo base_url()?>claycareer/career" method="post">
		<div class="input-group" style="margin-bottom: 20px">
					<input type="text" class="form-control" name="search" placeholder="Search for...">
					<span class="input-group-btn">
					  <input type="submit" value="Go" class="btn btn-secondary">
					</span>
				  </div>
	</form>
	<hr />
      
		<?php
		if($nosearch==TRUE){
			echo '<div class="row justify-content-center" style="margin-bottom:40%">
					<h1><i class="fa fa-search "></i>&nbsp;Search Now! </h1>	
				  </div>';
		}
		else{
			if(count($users)==0)
			{
			echo '<div class="row justify-content-center" style="margin-bottom:40%">
					<h1>No results found</h1>
				 </div>';	
			}
			else
			{
				foreach($users as $u){
					echo '<div class="row">
						<div class="col-md-7">
						  <a href="';
					echo base_url().'claycareer/course/';
					  echo $u['course_id'];
					echo '">
						<img class="img-fluid rounded mb-3 mb-md-0" src="';
					echo base_url('uploads/images/');echo $u['course_pic']; 
					echo '" alt="">
						</a>
						</div>
						<div class="col-md-5">
						<h3>';
						echo $u['course_abbrv'];
						echo '</h3>
							  <p>';
						echo $u['course_description'];
						echo '</p>
							  <a class="btn btn-primary" href="';
						echo base_url().'claycareer/course/';
					  echo $u['course_id'];
						echo '">View Course
								<span class="glyphicon glyphicon-chevron-right"></span>
							  </a>
							</div>
						  </div>
						<hr>';
				}
				echo $links;
			}
		}
	
	
		?>

      

      

    </div>