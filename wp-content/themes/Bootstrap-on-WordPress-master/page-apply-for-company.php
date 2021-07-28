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

$current_user=wp_get_current_user();

$args = array(
    'role'    => 'company',
    'orderby' => 'user_nicename',
    'order'   => 'ASC'
);
$users = get_users( $args );

echo '<ul>';
foreach ( $users as $user ) {
    echo '<li>' . esc_html( $user->display_name ) . '[' . esc_html( $user->user_email ) . ']</li>';
    echo ("<a onclick='create_request(".$user->id.",".$current_user->id.")' >Apasati aici pentru a aplica</a>");
}
echo '</ul>';
// ok deci va tb sa creez un table in baza de date cu cererea de angajare, si id-urile angajatuui si companiei

?>

<script>
	//var apply_links =Array.from(document.getElementsByClassName('apply_link')); //metoda getElementsByClassName da inapoi un obiect numit HTMLCollection. Pentru forEach, am nevoie de array. 
	
	
	//asadar, folosesc metoda asta pentru ca apply_links sa fie un array de obiecte, si sa le pot itera prin forEach
	//ca apoi sa adaug pentru fiecare element un EventListener, ca sa apeleze la functia jQuery din site.js, care sa apeleze functia din functions.php
	//ca apoi ea sa creeze custom field-ul
	//pe care il primeste apoi compania, ca sa accepte cererea angajatului
	//vreau doar sa spun ca asta e cel mai mare bodge pe care l-am programat la viata mea pana acum, si sansele sunt foarte mari sa nu mearga, si sa o iau iar de la 0

	//ceva imi spune ca era mai usor doar sa invat SQL
	//apply_links.forEach(item =>{
	//	item.addEventListener("click", alert("Salut!"));
	//});
</script>

<?php BsWp::get_template_parts( array( 
	'parts/shared/footer',
	'parts/shared/html-footer' 
) ); ?>
