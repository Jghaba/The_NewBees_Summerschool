<html>
<body>

Welcome <?php echo $_POST["numele"]; ?><br>
<?php
   // $product_id=wp_insert_post([
      //  ''
    //])
        //mai intai, in functia wp_insert post, creezi produsul si adaugi chestiile care tin pe produse in WP (nume, id, etc)
        //dupa ce se termina, creezi un obiect $product care este produsul cu id-ul $product-id
        //si de acolo adaugi chestiile care tin de WooCommerce 
   $product_id=wp_insert_post([
      "post_title"=>$_POST["product_name"],
      "post_type"=>'product',
      "post_status"=>'publish',
   ]);
   $user_id=wp_get_current_user()-> ID;
   update_field('owner', $user_id, $product_id);
   
   $product = new WC_Product($product_id);
   var_dump((int)$_POST['product_stock']);
   $product->set_manage_stock(true);
   $product->set_sku((int)$_POST['product_stock']);
   $product->set_stock_quantity((int)$_POST['product_stock']);
   //$product->set_weight();
   if($product_id) echo("a mers").'<br><br><br>';

   var_dump($product);
?>

</body>
</html> 