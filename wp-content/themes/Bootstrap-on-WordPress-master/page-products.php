<ul class="product-menu">
              <?php
              $products = get_posts(
                $args = array(
                  'post_type' => 'product',
                  'post_status' => 'publish',
                  'paginate' => true,
                )
              );
              foreach($products as &$product){
                $wp_product= new WC_Product($product->ID);
                echo 
                '<li>
                  <a href="' . get_permalink() . $product->post_title. '">
                    <img src="' . $wp_product->get_image() . '" alt="' .$product->post_title . '">
                  </a>
                </li>';
              }
              wp_reset_postdata();?>
              </ul>