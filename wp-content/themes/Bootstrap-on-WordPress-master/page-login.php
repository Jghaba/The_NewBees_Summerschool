<?php
function get_p_style(){
  return 'custom-login-style';
}
?>

<head>
    <style>
        h2 {
            color:orange;
            size: 45 px;
        }

        .content{
            text-align:center;
        }
    </style>
</head>

<body>
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

<?php
    if(is_user_logged_in()){
        $user=wp_get_current_user();
        $roles = $user->roles;

        if((in_array("company", $roles))||(in_array('employee', $roles))){
            wp_redirect(home_url('my-account-2'));
            exit();
        }else{
            wp_redirect(home_url());
            exit();
        }
    };
?>


<?php BsWp::get_template_parts( array( 
	'parts/shared/html-header', 
    
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



<?php BsWp::get_template_parts( array( 
	'parts/shared/footer',
	'parts/shared/html-footer' 
) ); ?>


</body>