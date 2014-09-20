<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package assignement
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="col-sm-3 col-sm-offset-1 blog-sideba" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->

</div><!-- #row -->
