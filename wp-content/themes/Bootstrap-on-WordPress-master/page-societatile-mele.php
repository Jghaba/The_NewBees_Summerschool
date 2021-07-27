<?php
    $user = wp_get_current_user();
    $roles = $user->roles;
    if(!(in_array("employee", $roles))){
        echo("Aceasta pagina este rezervata doar angajatilor. Daca sunteti angajat, va trebui sa va relogati.");
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
    //segmentul acesta ia id-ul utilizatorului (angajatului), apoi vede la ce companii este angajat, apoi le printeaza una cate una intr-o liste neordonata
    $id=get_current_user_id();
    // echo($id);
    $employers=get_field('employee_companies','user_'.$id); //in cazul de fata, va scoate un array, fiecare angajat putand fi la mai multe companii
    //functia va contine id-urile companiilor
    if(count($employers)==0){
        echo("Se pare ca nu esti angajat la vreo companie. "."<a href='apply-for-company.php'> Apasati aici </a> pentru a aplica la prima companie.");
    }else{
    
    //echo(var_dump($employers));
    echo("<a href='../page-apply-for-company.php'> Apasati aici </a> pentru a aplica la prima companie.");
    echo("<ul>"); //tag-ul html pentru lista neordonata: https://www.w3schools.com/tags/tag_ul.asp
    foreach ($employers as &$value) {
        $name=get_user_by('id', $value); //obtinem utilizatorul cu id-ul dat
        echo("<li>".$name->nickname."</li>"); 

    }
    echo("</ul");
    }
?>


<?php BsWp::get_template_parts( array( 
	'parts/shared/footer',
	'parts/shared/html-footer' 
) ); ?>
