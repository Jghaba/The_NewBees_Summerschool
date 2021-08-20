<style>
				/* Dropdown Button */
	.dropbtn {
	background-color: #04AA6D;
	color: white;
	padding: 16px;
	font-size: 16px;
	border: none;
	}

	/* The container <div> - needed to position the dropdown content */
	.dropdown {
	position: relative;
	display: inline-block;
	}

	/* Dropdown Content (Hidden by Default) */
	.dropdown-content {
	display: none;
	position: absolute;
	background-color: #f1f1f1;
	min-width: 160px;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 1;
	}

	/* Links inside the dropdown */
	.dropdown-content a {
	color: black;
	padding: 12px 16px;
	text-decoration: none;
	display: block;
	}

	/* Change color of dropdown links on hover */

	/*.dropdown-content a:hover {background-color: #ddd;}

	/* Show the dropdown menu on hover */
	.dropdown:hover .dropdown-content {display: block;}

	/* Change the background color of the dropdown button when the dropdown content is shown */
	.dropdown:hover .dropbtn {background-color: #3e8e41;}  
	.background_unseen{
		background-color:blue;
	}
</style>
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
			<?php
			$notifications=get_posts([
    		'post_type'=>'notification',
			]); 
			?>
			<div class="dropdown">
  			<button type="image" src="src="https://img.icons8.com/material-rounded/24/000000/appointment-reminders.png" class="dropbtn"></button>
  			<div class="dropdown-content">
				
			<?php
				foreach($notifications as &$notification){
					if(get_field('seen', $notification->ID)==0){
					echo('<div class="background_unseen" id="div'.$notification->ID.'">');
					}else echo('<div id="div'.$notification->ID.'">');
					echo "<h4 onmouseover='mark_as_seen(".$notification->ID.");refresh_element(".$notification->ID.")'>".$notification->post_title."</h4>";
					echo $notification->post_content."</a>";
					echo('</div>');
				}
			?>
			</div>
			</div>


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


