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
      <h1 class="mt-4 mb-3">Forums
        <small>Subheading</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Forums</li>
      </ol>

	<form id="loginform" class="form-horizontal" role="form" action="<?php echo base_url()?>claycareer/forums" method="post">
		<div class="input-group" style="margin-bottom: 20px">
					<input type="text" class="form-control" name="search" placeholder="Search for...">
					<span class="input-group-btn">
					  <input type="submit" value="Go" class="btn btn-secondary">
					</span>
				  </div>
	</form>
	<hr />
	
	
	<?php
	if(count($users)==0)
			{
			echo '<div class="row justify-content-center" style="margin-bottom:40%">
					<h1> No results found </h1>	
				  </div>';	
			}
	$if3 = -1;
	foreach($users as $u)
	{
		$if3 = $if3+1;
		if($if3==0){
			echo '<div class="row">';
		}
		if($if3==3){
			echo '<div class="row">';
		}
		
		echo '<div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">';
		echo $u['forum_title'];
		echo '</h4>
            <div class="card-body">
              <p class="card-text">';
		echo $u['forum_subtitle'];
		echo '</p>
            </div>
            <div class="card-footer">
              <a href="';
		echo base_url().'claycareer/topic/';
					  echo $u['forum_id'];
		echo	 ' " class="btn btn-primary">Learn More</a>
            </div>
          </div>
        </div>';
		
		if($if3==2){
			echo '</div>';
		}
		if($if3==5){
			echo '</div>';
		}
	}
	if(count($users)<3)
	{
		echo '</div>';
	}
    elseif(count($users)>3)
	{
		if(count($users)!=6)
		{
			echo '</div>';	
		}
	}
	echo $links;
	?>
      

     

    </div>