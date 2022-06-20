<?php
/**
* Template part for displaying front page introduction.
*
* @package Adore Business
*/

// Get the content type.
$services_content_type = get_theme_mod( 'adore_business_services_enable', 'disable' );

if ( 'disable' === $services_content_type ) {
return;
}

$content_ids    = array();
for ( $i = 1; $i <= 3; $i++ ) {
    $content_ids[] = get_theme_mod( 'adore_business_services_post_' . $i );
}

$args = array(
    'post_type'           => $services_content_type,
    'post__in'            => array_filter( $content_ids ),
    'orderby'             => 'post__in',
    'posts_per_page'      => absint( 3 ),
    'ignore_sticky_posts' => true,
);

$query = new WP_Query( $args );
if ( $query->have_posts() ) {

$section_title      = get_theme_mod( 'adore_business_services_title', __('What We Provide', 'adore-business') );
$section_subtitle   = get_theme_mod( 'adore_business_services_subtitle', __('Our Services', 'adore-business') );
?>

<div id="services-section" class="paddingt-b style-1 services-box-2">
    <div class="wrapper">
        <?php if ( !empty( $section_subtitle || $section_title ) ): ?>
            <div class="section-header">
                <p class="section-subtitle"><?php echo esc_html( $section_subtitle ); ?></p>
                <h2 class="section-title"><?php echo esc_html( $section_title ); ?></h2>
            </div>
        <?php endif; ?>
        <div class="section-content col-3">
            <?php 
            $i = 1;
            while ( $query->have_posts() ) :
                $query->the_post();
                $icon = !empty( get_theme_mod( 'adore_business_service_icon_' . $i ) ) ? get_theme_mod( 'adore_business_service_icon_' . $i ) : '';
                ?>
                <article>
                    <div class="entry-container">
                        <?php if ( !empty( $icon ) ): ?>
                            <div class="icon">
                                <i class="fa <?php echo esc_html( $icon ); ?>"></i>
                            </div>
                        <?php endif; ?>
                        <div class="entry-content">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </header>
                            <p><?php echo wp_kses_post(wp_trim_words( get_the_content(), 15 ) ); ?></p>
                        </div>
                    </div>
                </article>
                <?php
                $i++;
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>

<?php } ?>