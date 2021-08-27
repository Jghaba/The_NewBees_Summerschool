<?php
    $user = wp_get_current_user();
    $roles = $user->roles;
    if(!(in_array("employee", $roles))){
        echo("Aceasta pagina este rezervata doar angajatilor. Daca sunteti angajat, va trebui sa va relogati.");
        die;
    }
?>
<html>

<head>
    <style>
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
function get_p_style(){
    return 'custom-societati';
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
    //segmentul acesta ia id-ul utilizatorului (angajatului), apoi vede la ce companii este angajat, apoi le printeaza una cate una intr-o lista neordonata
    $id=get_current_user_id();
    // echo($id);
    $employers=get_field('employee_companies','user_'.$id); //in cazul de fata, va scoate un array, fiecare angajat putand fi la mai multe companii
    //functia va contine id-urile companiilor
    if(empty($employers)||count($employers)==0){
        echo("Se pare ca nu esti angajat la vreo companie. ".'<a href="'.home_url('apply-for-company').'"> Apasati aici </a> pentru a aplica la prima companie.');
    }else{
    
    //echo(var_dump($employers));
    echo('<div id= spatiu>');
    echo('<a href="'.home_url('apply-for-company').'"> Apasati aici </a> pentru a aplica la prima companie.');
    echo('</div>'); 
    echo('<div id= societati-list>');
    echo("<ul>"); //tag-ul html pentru lista neordonata: https://www.w3schools.com/tags/tag_ul.asp
    foreach ($employers as $value) {
        $name=get_user_by('id', $value); //obtinem utilizatorul cu id-ul dat
        echo("<li><a class='btn btn-primary' data-bs-toggle='collapse' href='#multiCollapseExample".$value."' aria-expanded='false' aria-controls='multiCollapseExample1".$value."'>".$name->nickname."</a></li>"); 
        echo('<div style="display: inline-block" class="collapse multi-collapse" id="multiCollapseExample'.$value.'"><div class="card card-body">');
        $company_products=get_posts([
            'posts_per_page'=>-1,
            'post_type'=>'product',
            'meta_key'=>'owner',
            'meta_value'=>$value,  
        ]);
        foreach($company_products as $company_product){ 
            $product_url=get_permalink($company_product->ID);
            echo('<div style="display: inline-block">');
            echo('<a href="'.$product_url.'">'.$company_product->post_title.'</a><br>');
            echo('</div>');
        }
        echo("</div></div>");
    }
    echo("</ul");
    echo('</div>');
    }
?>

</html>
<?php BsWp::get_template_parts( array( 
	'parts/shared/footer',
	'parts/shared/html-footer' 
) ); ?>
