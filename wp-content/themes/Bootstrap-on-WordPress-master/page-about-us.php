<html>
    <head>
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
    background-color: pink;
}
        </style>
    </head>
<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * Please see /external/bootsrap-utilities.php for info on BsWp::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Bootstrap 5.0.1
 * @autor 		Babobski
 */
?>
<?php BsWp::get_template_parts( array( 
	'parts/shared/html-header', 
	'parts/shared/header' 
) ); ?>

<div class="content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<h2>
			<?php the_title(); ?>
		</h2>
		<?php the_content(); ?>
		<?php comments_template( '', true ); ?>

	<?php endwhile; ?>
</div>


<?php 
$_pf = new WC_Product_Factory();


/*
echo(wp_get_current_user()->id);

$order = wc_get_order(126);

var_dump($order->get_items());
*/

/*
$post=get_post(126);
var_dump($post->post_type);



$orders = get_posts(array(
    'posts_per_page'	=> -1,
    "post_type"		=> 'shop_order',
));

var_dump($orders);

$orders = wc_get_orders([
    'numberposts'    => -1, //tb sa folosesc functia de la ei
    'post_type'      => 'shop_order',
]);
var_dump($orders);
*/
$notifications=get_posts([
    'post_type'=>'notification',
]); ?>

<div class="dropdown">
  <input type="image" src="src="https://img.icons8.com/material-rounded/24/000000/appointment-reminders.png" class="dropbtn">
  <div class="dropdown-content">
 
<?php
foreach($notifications as &$notification){
    echo('<div class="'.((get_field('seen', $notification->id)==0 ?"background_unseen":"background_seen").'">'));
    echo "<a href=#><h4>".$notification->post_title."</h4>";
    echo $notification->post_content."</a>";
    echo('</div>');
}
?>
</div>
</div> 

<input type="image">


<?php BsWp::get_template_parts( array( 
	'parts/shared/footer',
	'parts/shared/html-footer' 
) ); ?>

</html>