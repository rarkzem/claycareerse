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

<div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Topic
        <small>by
          <a href="#">Start Bootstrap</a>
        </small>
      </h1>

      <ol class="breadcrumb" style="margin-top: 20px">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="index.html">Forums</a>
        </li>
		<li class="breadcrumb-item active">Topic</li>
      </ol>

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="
			<?php 
				echo base_url('uploads/images/');
				foreach($topic as $t){
				echo $t['forum_pic'];
				}
			?>
			" alt="">
			<h1 class="mt-4 mb-3">
			<?php 
			foreach($topic as $t)
			{
			echo $t['forum_title'];
			echo '&nbsp;';
			echo '<small>'.$t['forum_subtitle'].'</small>';
			}
			?>
		  </h1>	
          <hr>

          <!-- Date/Time -->
          <p>Posted on January 1, 2017 at 12:00 PM</p>

          <hr>

          <!-- Post Content -->
          <?php 
				foreach($topic as $t){
				echo $t['forum_description'];
				}
		  ?>
			
			<hr>
			

          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>

			
			<?php
			foreach($comments as $c)
			{
				echo'<div class="media mb-4">
				<img class="d-flex mr-3 rounded-circle" style="height:50px;width:50px;" src="';
				echo base_url('uploads/images/');echo $c['user_pic'];
				echo '" alt="">
				<div class="media-body">
				  <h5 class="mt-0">';
				echo $c['username'];
				echo '</h5>';
				 echo $c['comment'];
				echo'</div>
			  </div>';
			}
			
			
			?>
          
          

          

        </div>
      </div>
      <!-- /.row -->

    </div>