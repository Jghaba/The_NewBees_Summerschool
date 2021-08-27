<?php /* Template Name: PageWithoutSidebar */ ?>
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
    $orders=(array)(wc_get_orders(array(
        'post_type'=>'shop_order',
    )));
    foreach($orders as  $k=>$order){
      if($order instanceof Automattic\WooCommerce\Admin\Overrides\Order) continue;
      $order_couriers=(array)(get_field('order_courier', $order->get_id()));
      if(is_null($order_couriers)) unset($order[$k]); 
      else  if(!(in_array(wp_get_current_user()->ID, $order_couriers))) unset($order[$k]);
    };
    echo("<ul>");
    foreach($orders as &$order){
        $order_couriers=(array)(get_field('order_courier', $order->get_id()));
        if((in_array(wp_get_current_user()->ID, $order_couriers))){
            echo '<li>Order #'.$order->get_id().'| '.$order->get_billing_first_name().' '.$order->get_billing_last_name().'| Amount: '.($order->get_total()+0).$order->get_currency().' | Status: '.$order->get_status().'</li>';
            echo('<select class="form-select" aria-label="Default select example" id="status_order'.$order->get_id().'" onclick="change_status('.$order->get_id().')"><option selected value="selected">Open this select menu</option><option value="processing">Processing</option><option value="completed">Completed</option><option value="on_hold">On Hold</option><option value="refunded">Refunded</option></select>');    
        }
    }
    echo("</ul>");

?>
<script>
    function change_status(order_id){
        if(document.getElementById("status_order"+order_id).value!='selected'){
            jQuery.ajax({
                type: "POST",
                action: "mark_as_seen",
                data: {order_id:order_id, order_status:document.getElementById("status_order"+order_id).value},
            });
    }
}
</script>
<?php
    if(isset($_POST['order_id'])){
        $order=wc_get_order((int)$_POST['order_id']);
        $order->set_status($_POST['order_status']);
    }
?>
<?php BsWp::get_template_parts( array( 
	'parts/shared/footer',
	'parts/shared/html-footer' 
) ); ?>