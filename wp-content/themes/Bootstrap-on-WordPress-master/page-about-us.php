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
    background-color:blue;
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
*/



$notifications=get_posts([
    'post_type'=>'notification',
]); ?>

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


the_post();
?>



</div>
</div> 



<?php /*


<?php
  $notif_id=$_POST['notif_id'];
  var_dump($notif_id);
  update_field("seen", 1, $_POST['notif_id']);?>
<script>
    function refresh_element(element_id){
      document.getElementById("div"+element_id).removeAttribute("class");
    };
</script>*/ ?>
<div class="alert alert-info">
  <h5><?=get_the_title()?></h5>
  <a><?=get_the_content()?><a>
</div>​



<?php BsWp::get_template_parts( array( 
	'parts/shared/footer',
	'parts/shared/html-footer' 
) );
?>

</html>