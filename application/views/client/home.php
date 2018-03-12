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

	<header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('<?php echo base_url('uploads/images/'); echo $carousel[0]['news_pic'];?>')">
            <!--<div class="carousel-caption d-none d-md-block">
              <h3>First Slide</h3>
              <p>This is a description for the first slide.</p>
            </div> -->
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('<?php echo base_url('uploads/images/'); echo $carousel[1]['news_pic'];?>')">
            <!--<div class="carousel-caption d-none d-md-block">
              <h3>First Slide</h3>
              <p>This is a description for the first slide.</p>
            </div> -->
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('<?php echo base_url('uploads/images/'); echo $carousel[2]['news_pic'];?>')">
            <!--<div class="carousel-caption d-none d-md-block">
              <h3>First Slide</h3>
              <p>This is a description for the first slide.</p>
            </div> -->
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>	

	<div class="container">

		<!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Home
        <small>| Welcome to ClayCareer</small>
      </h1>	
		
	  <ol class="breadcrumb" style="margin-top: 20px">
       <li class="breadcrumb-item active">Home</li>
      </ol>
		
      <h2 class="my-4">Trending Topics</h2>

      <!-- Marketing Icons Section -->
      <div class="row">
		<?php
		foreach($trending as $t)
		{
		echo '<div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">'.$t['forum_title'].'</h4>
            <div class="card-body">
              <p class="card-text">'.$t['forum_description'].'</p>
            </div>
            <div class="card-footer">
              <a href="';
			echo base_url('claycareer/topic/');
			echo $t['forum_id'];
			echo'" class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>';	
		}
		?>
        
      </div>
      <!-- /.row -->

      <!-- Portfolio Section -->
      <h2>Featured News</h2>

      <div class="row">
		  
		  
		<?php
		foreach($featured as $f){
			echo '<div class="col-lg-4 col-sm-6 portfolio-item">
			  <div class="card h-100">
				<a href="';
			echo base_url('claycareer/article/');
			echo $f['news_id'];	
			echo '"><img class="card-img-top" src="';
			echo base_url('uploads/images/');
			echo $f['news_pic'];
			echo '" alt=""></a>
				<div class="card-body">
				  <h4 class="card-title">
					<a href="';
			echo base_url('claycareer/article/');
			echo $f['news_id'];
			echo '">'.$f['news_title'].'</a>
				  </h4>
				  <p class="card-text">'.$f['news_description'].'</p>
				</div>
			  </div>
			</div>';  
		}
	    ?>
        
      </div>
      <!-- /.row -->

    </div>