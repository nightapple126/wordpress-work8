<?php
/**
* Template part for displaying front page introduction.
*
* @package Adore Business
*/

// Get the content type.
$about_content_type = get_theme_mod( 'adore_business_about_enable', 'disable' );

if ( 'disable' === $about_content_type ) {
	return;
}

$content_ids    = array();
	$content_ids[] = get_theme_mod( 'adore_business_about_page' );
	$args = array(
		'post_type'           => $about_content_type,
		'post__in'            => array_filter( $content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 1 ),
		'ignore_sticky_posts' => true,
	);

$query = new WP_Query( $args );
if ( $query->have_posts() ) {

	$about_subtitle = get_theme_mod( 'adore_business_about_sub_title', __( 'About Us', 'adore-business' ) );
	$about_button	= get_theme_mod( 'adore_business_about_button_label', __( 'Explore More', 'adore-business' ) );
	?>
	<div id="about-us-section" class="paddingt-b about-mask-1 about-image-right">
		<div class="wrapper">
			<?php
			while( $query->have_posts() ): 
				$query->the_post();
				?>
				<article>
					<div class="about-us-wrapper">
						<div class="entry-container">
							<div class="section-header">
								<p class="section-subtitle"><?php echo esc_html( $about_subtitle ); ?></p>
								<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							</div>
							<div class="entry-content">
								<p><?php echo wp_kses_post(wp_trim_words( get_the_content(), 50 ) ); ?></p>
							</div>
							<?php if ( !empty( $about_button ) ): ?>
								<div class="read-more">
									<a href="<?php the_permalink(); ?>" class="btn"><?php echo esc_html( $about_button ); ?></a>
								</div>
							<?php endif; ?>
						</div>
						<div class="featured-image" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' ) ); ?>');"></div>
					</div>
				</article>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
	<?php } ?>