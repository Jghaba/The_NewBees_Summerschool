<ul class="product-menu">
              <?php
              $products = get_posts(
                $args = array(
                  'post_type' => 'product',
                  'post_status' => 'publish',
                )
              );
              foreach($products as &$product){
                $wp_product= new WC_Product($product->ID);
                echo "<li>";
                echo '<img src="' . $wp_product->get_image() . '" alt="' . $product->post_title . '">';
                echo "<li>";
              }
              wp_reset_postdata();?>
              </ul>