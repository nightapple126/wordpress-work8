<?php
/**
* Template part for displaying front page introduction.
*
* @package Adore Business
*/

// Get the content type.
$team_content_type = get_theme_mod( 'adore_business_team_enable', 'disable' );

if ( 'disable' === $team_content_type ) {
    return;
}

$content_ids    = array();

for ( $i = 1; $i <= 3; $i++ ) {
    $content_ids[] = get_theme_mod( 'adore_business_team_page_' . $i );
}

$args = array(
    'post_type'           => $team_content_type,
    'post__in'            => array_filter( $content_ids ),
    'orderby'             => 'post__in',
    'posts_per_page'      => absint( 3 ),
    'ignore_sticky_posts' => true,
);

$query = new WP_Query( $args );
if ( $query->have_posts() ) {

    $section_title  = get_theme_mod( 'adore_business_team_title', __('Here is Our Awesome Team', 'adore-business') );
    $subtitle       = get_theme_mod( 'adore_business_team_sub_title', __('Our Members', 'adore-business') );
    ?>

    <div id="team-section" class="paddingt-b same image-style-1">
        <div class="wrapper">
            <?php if ( !empty( $subtitle || $section_title ) ): ?>
                <div class="section-header">
                    <p class="section-subtitle"><?php echo esc_html( $subtitle ); ?></p>
                    <h2 class="section-title"><?php echo esc_html( $section_title ); ?></h2>
                </div>
            <?php endif; ?>
            <div class="section-content col-3">
                <?php 
                $i = 1;
                while ( $query->have_posts() ) :
                    $query->the_post();
                    $position = get_theme_mod( 'adore_business_team_position_'.$i, '' );
                    ?>
                    <article>
                        <div class="entry-container">
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' ) ); ?>');"></div>
                            <div class="entry-content">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <?php if ( !empty( $position ) ) { ?>
                                        <span class="team-position"><?php echo esc_html( $position ) ;?></span>
                                    <?php } ?>
                                </header>
                                <div class="social-icons">
                                    <ul>
                                        <?php 
                                        $team_socials = ! empty( get_theme_mod( 'adore_business_team_social_link_' .$i ) ) ? explode( '|', get_theme_mod( 'adore_business_team_social_link_' .$i ) ) : array(); 
                                        foreach ( $team_socials as $team_social ) : 
                                            ?>
                                            <li>
                                                <a href="<?php echo esc_url( $team_social ); ?>">
                                                    <?php echo adore_business_get_icons_svg_by_url( $team_social ); ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
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