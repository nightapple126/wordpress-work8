<?php
/**
* Template part for displaying front page introduction.
*
* @package Adore Business
*/

// Get the content type.
$most_read_content_type = get_theme_mod( 'adore_business_most_read_enable', 'disable' );

if ( 'disable' === $most_read_content_type ) {
return;
}

$content_ids        = array();

if ( $most_read_content_type === 'post' ) {

    for ( $i = 1; $i <= 3; $i++ ) {
        $content_ids[] = get_theme_mod( 'adore_business_most_read_post_' . $i );
    }

    $args = array(
        'post_type'           => $most_read_content_type,
        'post__in'            => array_filter( $content_ids ),
        'orderby'             => 'post__in',
        'posts_per_page'      => absint( 3 ),
        'ignore_sticky_posts' => true,
    );

} else {
    $cat_content_id = get_theme_mod( 'adore_business_most_read_category' );
    $args           = array(
        'cat'            => $cat_content_id,
        'posts_per_page' => absint( 3 ),
    );
}

$query = new WP_Query( $args );
if ( $query->have_posts() ) {

$section_title  = get_theme_mod( 'adore_business_most_read_title', __('Most Read Posts', 'adore-business') );
$subtitle       = get_theme_mod( 'adore_business_most_read_subtitle', __('Incredibly', 'adore-business') );
$col_layout     = get_theme_mod( 'adore_business_most_read_column_layout', 'col-3' );
?>

<div id="most-read-section" class="paddingt-b same">
    <div class="wrapper">
        <?php if ( !empty( $subtitle || $section_title ) ) { ?>
            <div class="section-header">
                <p class="section-subtitle"><?php echo esc_html( $subtitle ); ?></p>
                <h2 class="section-title"><?php echo esc_html( $section_title ); ?></h2>
            </div>
        <?php } ?>
        <div class="col-3">
            <?php 
            while ( $query->have_posts() ) :
                $query->the_post();
                ?>
                <article>
                    <div class="featured-image" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' ) ); ?>');">
                    </div>
                    <div class="entry-container">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>" tabindex="0"><?php the_title(); ?></a></h2>
                        </header>
                        <div class="entry-content">
                            <p><?php echo wp_kses_post(wp_trim_words( get_the_content(), 10 ) ); ?></p>
                        </div>
                        <div class="entry-meta">
                            <?php
                            adore_business_posted_on();
                            adore_business_post_author(); 
                            ?>
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