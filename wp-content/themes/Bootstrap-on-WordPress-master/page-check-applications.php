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
    return 'custom-page-check-applications';
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

    $user=wp_get_current_user();
    $posts = get_posts(array(
        'posts_per_page'	=> -1,
        'post_type'		=> 'employee_request',
        'meta_key'		=> 'company',
        'meta_value'    => $user->ID,
    ));
    echo('<div id=application-list>');
    echo '<ul>';
    foreach ( $posts as $post ) {
        echo '<li>'.get_user_by("ID", get_field("employee", $post->ID))->user_login.'</li>'; //gaseste id-ul angajatului care a trimis cererea, si apoi arata numele sau
        echo get_user_by("ID", get_field("employee", $post->ID))->ID;
        echo '<a href=./?request_id='.$post->ID.'> acceptati </a>';
    }
    echo '</ul>';
    echo('</div>');
    if (isset($_GET['request_id'])) {
        $request_id=(int)$_GET['request_id'];
        var_dump($request_id);
        var_dump((int)get_field('employee', $request_id));

        $employee_list=(array)(get_field("company_employees", "user_".$user->ID));
        array_push($employee_list, (int)get_field("employee", $request_id));
        var_dump($employee_list);

        $is_updated = update_field('company_employees', $employee_list, "user_".$user->ID);
        update_field("employee_companies", $user->ID, "user_".(int)get_field('employee', $request_id));
        wp_delete_post($request_id);
        echo($user->ID);
        var_dump($is_updated);
        echo("<br>");
/*
        $employee_list=get_post_meta($user->ID)["company_employees"];
        var_dump($employee_list); echo("<br> <br>");
        array_push($employee_list, (int)get_field("employee", $request_id)); //append new employee to list of employees 
        var_dump($employee_list);

        echo("<br>");
        update_post_meta($user->ID, "company_employees", (int)get_field("employee", $request_id)); //update employee list with new employee
        update_post_meta($user->ID, "_company-employees", (int)get_field("employee", $request_id));
        var_dump(get_post_meta($user->ID));
        echo("<br><br>\n"); */
        var_dump(get_field("company_employees","user_".$user->ID));
        
    }
?>

<?php BsWp::get_template_parts( array( 
	'parts/shared/footer',
	'parts/shared/html-footer' 
) ); ?>
