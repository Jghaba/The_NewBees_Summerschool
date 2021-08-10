<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container-fluid">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNav" aria-controls="primaryNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="primaryNav">
			<?php
			wp_nav_menu( array(
				'menu'          	=> 'header-menu',
				'menu_class'        => 'header-menu',
				'items_wrap'        => '<ul class="%2$s">%3$s</ul>',
				'container_class'   => 'header-menu-container',
				'theme_location'	=> 'primary',
				'depth'         	=> 2,
				'container'			=> false,
				'menu_class'    	=> 'navbar-nav me-auto',
				'fallback_cb'   	=> '__return_false',
				'walker'         	=> new bootstrap_5_wp_nav_menu_walker()
			));
			?>
			<?php get_search_form(); ?>
		</div>
	</div>

</nav>


<div id="navbar">
  <a href="../index.php">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <?php
	if(is_user_logged_in()){
		echo("<a href='http://localhost/my-account-2/' style='float:right'> Your Account </a>");
	}else{
		echo("<div style='float:right'><a href='http://localhost/login/'>Login</a>/<a href='http://localhost/register/'>Register</a></div>\n");
	}
  ?>
  <br/>
</div> 
