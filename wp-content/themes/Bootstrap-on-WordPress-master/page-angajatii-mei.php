<?php
    $user = wp_get_current_user();
    $roles = $user->roles;
    if(!(in_array("company", $roles))){
        echo("Aceasta pagina este rezervata doar companiilor. Daca sunteti companie, va trebui sa va relogati.");
        die;
    }
?>


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
    //codul de mai jos este practic identic cu cel de la page-societatile-mele. asta pentru ca am dat practic copy-paste de acolo si am schimbat cateva chestii.
    $id=get_current_user_id();
    $employees=get_field('company_employees','user_'.$id); 
    echo("<ul>"); 
    foreach ($employees as &$value) {
        $name=get_user_by('id', $value); //obtinem utilizatorul cu id-ul dat
        echo("<li>".$name->nickname."</li>"); 

    }
    echo("</ul");
?>


<?php BsWp::get_template_parts( array( 
	'parts/shared/footer',
	'parts/shared/html-footer' 
) ); ?>
