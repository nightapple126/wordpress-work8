<?php
/**
* Template part for displaying front page introduction.
*
* @package Adore Business
*/

// Get the content type.
$recent_works_content_type = get_theme_mod( 'adore_business_recent_works_enable', 'disable' );
if ( 'disable' === $recent_works_content_type ) {
return;
}

$content_ids        = array();

for ( $i = 1; $i <= 5; $i++ ) {
    $content_ids[] = get_theme_mod( 'adore_business_recent_works_post_' . $i );
}

$args = array(
    'post_type'           => $recent_works_content_type,
    'post__in'            => array_filter( $content_ids ),
    'orderby'             => 'post__in',
    'posts_per_page'      => absint( 5 ),
    'ignore_sticky_posts' => true,
);

$query = new WP_Query( $args );
if ( $query->have_posts() ) {

$section_title      = get_theme_mod( 'adore_business_recent_works_title', __('What We Do', 'adore-business') );
$section_subtitle   = get_theme_mod( 'adore_business_recent_works_subtitle', __('Recent Works', 'adore-business') );
?>

<div id="recent-work-section" class="paddingt-b">
    <div class="wrapper">
        <?php if ( !empty( $section_title || $section_subtitle ) ): ?>
            <div class="section-header">
                <p class="section-subtitle"><?php echo esc_html( $section_subtitle ); ?></p>
                <h2 class="section-title"><?php echo esc_html( $section_title ); ?></h2>
            </div>
        <?php endif; ?>
        <div class="recent-work-slider" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows":true, "autoplay": true, "draggable": true, "fade": false }'>
            <?php 
            while ( $query->have_posts() ) :
                $query->the_post();
                ?>
                <article>
                    <div class="entry-container">
                        <div class="featured-image" style=" background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' ) ); ?>');"></div>
                        <div class="entry-content">
                            <h2 class="entry-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <span class="cat-links">
                                <?php the_category( '', '', get_the_ID() ); ?>
                            </span>
                        </div>
                    </div>
                </article>
                <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>

<?php } ?>