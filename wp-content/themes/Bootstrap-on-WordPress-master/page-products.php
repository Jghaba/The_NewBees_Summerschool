<?php 
$products = get_posts(array( 'post_type'=> 'product'));

    if ( $products->have_posts() ) {
        echo '<ul>';
        while ( $products->have_posts() ) : $products->the_post(); {
            echo '<li>' .'<a href="< the_permalink(); ">< the_title(); </a>'. '</li>'; 
        }
        echo '</ul>';
    } else { echo 'no posts found';}
    
    wp_reset_postdata();
?>