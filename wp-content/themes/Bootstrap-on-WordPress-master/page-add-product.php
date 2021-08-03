<html>
<body>

Welcome <?php echo $_POST["numele"]; ?><br>
<?php
   $_pf = new WC_Product_Factory();
   // $product_id=wp_insert_post([
      //  ''
    //])
        //mai intai, in functia wp_insert post, creezi produsul si adaugi chestiile care tin pe produse in WP (nume, id, etc)
        //dupa ce se termina, creezi un obiect $product care este produsul cu id-ul $product-id
        //si de acolo adaugi chestiile care tin de WooCommerce 
   $product_id=wp_insert_post([
      "post_title"=>$_POST["product_name"],
      "post_type"=>'product',
   ]);
   $user_id=wp_get_current_user()-> ID;
   update_field('owner', $user_id, $product_id);
   
   $product =$_pf -> get_product(get_post(60));

   $product->set_price((int)$_POST['regular_price']);
   if($product_id) echo("a mers").'<br><br><br>';

   var_dump($product);
?>

</body>
</html> 