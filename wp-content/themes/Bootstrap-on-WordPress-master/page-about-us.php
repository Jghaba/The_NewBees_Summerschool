<?php /*
$_pf = new WC_Product_Factory();

$product =$_pf -> get_product(get_post(60));
var_dump($product); */

/*
echo(wp_get_current_user()->id);

$order = wc_get_order(126);

var_dump($order->get_items());
*/


$post=get_post(126);
var_dump($post->post_type);



$orders = get_posts(array(
    'posts_per_page'	=> -1,
    "post_type"		=> 'shop_order',
));

var_dump($orders);

$orders = wc_get_orders([
    'numberposts'    => -1,
    'post_type'      => 'shop_order',
]);
var_dump($orders);


?>
<input type="image">