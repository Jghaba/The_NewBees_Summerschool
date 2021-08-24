<?php
  get_header(); ?>
  <div id="primary" class="content-area">
      <main id="main" class="site-main" role="main">
          <ul class="products">
              <?php
              $args = array(
                  'post_type' => 'product',
                  'posts_per_page' => 12,
              );
              $loop = new WP_Query( $args );
              if ($loop->have_posts()) {
                  while ($loop->have_posts()) : $loop->the_post();
                      ?>
                      <div id="product-image1">
                          <a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>"
                            title="<?php echo esc_attr( $product->get_title() ); ?>">
                              <?php echo $product->get_image(); ?>
                          </a>
                      </div>
                      <div id="product-description-container">
                          <ul>
                              <a href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>"
                                title="<?php echo esc_attr( $product->get_title() ); ?>">
                                  <li><h4><?php echo $product->get_title(); ?></h4></li>
                              </a>
                              <li><?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt )?></li>
                              <li><h2><?php echo $product->get_price_html(); ?> </h2></li>
                              <?php
                              echo apply_filters(
                                  'woocommerce_loop_add_to_cart_link',
                                  sprintf(
                                      '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button %s product_type_%s">%s</a>',
                                      esc_url( $product->add_to_cart_url() ),
                                      esc_attr( $product->get_id() ),
                                      esc_attr( $product->get_sku() ),
                                      $product->is_purchasable() ? 'add_to_cart_button' : '',
                                      esc_attr( $product->product_type ),
                                      esc_html( $product->add_to_cart_text() )
                                  ),
                                  $product
                              );?>
                          </ul>
                      </div>                     <?php endwhile;
              } else {
                  echo __( ' o products found' );
              }
              wp_reset_postdata();
              ?>
          </ul>
          <!--/.products-->         </main>
      <!-- #main -->
  </div><!-- #primary --> <?php
  do_action( 'storefront_sidebar' );
  get_footer();             