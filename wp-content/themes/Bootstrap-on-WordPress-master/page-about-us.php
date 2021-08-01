<?php 

$_pf = new WC_Product_Factory();

$product =$_pf -> get_product(get_post(60));
var_dump($product);
?>
 
<input type="image">