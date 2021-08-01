<?php if(isset($_POST['submit_post'] && isset($_POST['wp_nonce_field']) && 
wp_verify_nonce($_POST['wp_nonce_field'], 'wp_nonce'))){
   // I check if the title is not empty before saving the product.
   if ( trim( $_POST['product_name'] ) === '' ) {
      $postTitleError = 'Adaugati nume';
   } else {
      
      // Informations to save for this product.
      $post_information = array(
         'product_name' => wp_strip_all_tags( $_POST['product_name'] ),
         'post_type' => 'product',
      );
      wp_insert_post( $post_information, $wp_error );
   }
}
?>