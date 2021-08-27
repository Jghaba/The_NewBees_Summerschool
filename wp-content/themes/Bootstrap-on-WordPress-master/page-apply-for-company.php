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

function get_p_style() {
	return 'custom-apply-for-comp';
}
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

$current_user=wp_get_current_user();

$args = array(
    'role'    => 'company',
    'orderby' => 'user_nicename',
    'order'   => 'ASC'
);
$users = get_users( $args );
echo('<div id= company-list>');
echo '<ul>';
foreach ( $users as $user ) {
    echo '<li>' . esc_html( $user->display_name ) . '[' . esc_html( $user->user_email ) . ']</li>';
    echo ("<button onclick='create_request($user->ID, $current_user->ID)' >Aplicati</button>");
}
echo '</ul>';
echo '</div>';
?>

<?php BsWp::get_template_parts( array( 
	'parts/shared/footer',
	'parts/shared/html-footer' 
) ); ?>

<?php
	if(isset($_POST['employee'])&&isset($_POST['company'])){
		$post_id = wp_insert_post([
			'post_type' => "employee_request",
			'post_status' => "publish",
		]);
		update_post_meta($post_id, 'employee', $_POST['employee']);
		update_post_meta($post_id, 'company', $_POST['company']);
	}
?>