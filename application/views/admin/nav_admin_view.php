<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">
			<img src="../../bootstrap/img/logo_sm.jpg">
		  </a>
          <div class="nav-collapse collapse">
            <ul class="nav">
			<?php
				foreach($links as $l){
					echo "<li><a href='" .$l['url'] . "'>". $l['label'] . "</a></li>";
				}
			
			?>
            </ul>
            <form class="navbar-form pull-right">
				<ul>
					<li><a class="button" href="<?php echo base_url(); ?>index.php/login/logout" id="logoutClicked"><span>Logout</span></a></li>
				</ul>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<div class="container"></div>
<div class="container"></div>
<div class="container"></div>