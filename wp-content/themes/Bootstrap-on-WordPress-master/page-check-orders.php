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
	return 'custom-check-orders';
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

    $orders = wc_get_orders(array(
        'posts_per_page'	=> -1,
        'post_type'		=> 'shop_order',
		'meta_key'		=> 'order_owner',
        'meta_value'    => $user->id,       
    ));
    echo('<div id=check-orders>');
	echo("<ul>");
    foreach($orders as &$order){
        echo '<li>Order #'.$order->get_id().'| '.$order->get_billing_first_name().' '.$order->get_billing_last_name().'| Amount: '.($order->get_total()+0).$order->get_currency().' | Status: '.$order->get_status().'</li>';
    }
    echo("</ul>");
	echo('</div>');
?>

<?php BsWp::get_template_parts( array( 
	'parts/shared/footer',
	'parts/shared/html-footer' 
) ); ?>
