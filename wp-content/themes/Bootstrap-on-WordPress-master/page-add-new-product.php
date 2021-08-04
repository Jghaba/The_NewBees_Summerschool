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
$url = home_url('add-product');
?>

<form action="<?= $url ?>" method="post" >
  <div class="form-group">
    <label>Product Name: </label>
    <input class="form-control" name="product_name" >
  </div>

   <div class="form-group">
	  <label>Regular Price</label>
	  <input type="text" class="form-control" name="regular_price">
  </div>

  <div class="form-group">
	<label>Stock Quantity: </label>
	<input type="text" class="form-control" name="product_stock">
  </div>

  <div class="form-group">
	  <label>Weight: </label>
	  <input type="text" class="form-control" name="product_weight">
  </div>

  <div class="form-group">
	  <label>Add Images Here: </label>
	  <input type="file" class="form-control" name="product_images" id="product_images" multiple=true accept="image/*">
  </div>
	
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
  
</form> 


<?php BsWp::get_template_parts( array( 
	'parts/shared/footer',
	'parts/shared/html-footer' 
) ); ?>
