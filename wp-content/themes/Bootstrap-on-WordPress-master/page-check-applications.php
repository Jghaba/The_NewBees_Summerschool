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

<?php BsWp::get_template_parts( array( 
	'parts/shared/footer',
	'parts/shared/html-footer' 
) ); ?>


<?php

    $user=wp_get_current_user();
    echo($user->id);
    $posts = get_posts(array(
        'posts_per_page'	=> -1,
        'post_type'		=> 'employee_request',
        'meta_key'		=> 'company',
        'meta_value'    => $user->id,
    ));
    echo var_dump($posts);

    echo '<ul>';
    foreach ( $posts as $post ) {
        echo '<li>'.get_user_by("ID", get_field("employee", $post->ID))->user_login.'</li>'; //gaseste id-ul angajatului care a trimis cererea, si apoi arata numele sau
        echo get_user_by("ID", get_field("employee", $post->ID))->id;
        echo '<a href=./?request_id='.$post->ID.'> acceptati </a>';
    }
    echo '</ul>';

    if (isset($_GET['request_id'])) {
        $request_id=(int)$_GET['request_id'];
        var_dump($request_id);
        var_dump(get_field('employee', $request_id));
        $is_updated = update_field('company_employees', get_field("employee", $request_id), "user_".$user->ID);
        echo($user->ID);
        var_dump($is_updated);
        
    }
?>