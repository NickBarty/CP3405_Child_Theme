<?php
/**
 * The template for displaying blog
 * template Name: Student List
 * @package job-portal
 */
get_header(); ?>
<!--featured job section start-->
<?php if(!get_theme_mod('front_page_featured_jobs_switch',false)):
 $number = get_theme_mod('front_page_featured_jobs_post_limit',4);
 $category_list = get_theme_mod('front_page_featured_jobs_post_category','');
$job_portal_category_r = new WP_Query( apply_filters( 'front_page_featured_jobs_posts_args', array( 'posts_per_page' => $number,'category__in' => $category_list, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );    ?>
<section class="featured-jobs">
    <div class="container">
        <div class="row">
            <div class="featured-jobs-title">
                <h2 class="featured-jobs-main-title">Students</h2>
            </div>
        </div>
    </div>
    <a href="<?php echo get_author_posts_url($user->ID); ?>"><?php $user->display_name; ?></a>
    <div class="container names">
        <?php

        $args = array(
            'role'    => 'subscriber',
            'orderby' => 'user_nicename',
            'order'   => 'ASC'
        );
        $users = get_users( $args );


        echo '<ul>';
        foreach ( $users as $user ) {
            echo '<li>' . '</li>';
            echo '<a class="student_box" href=" ' . get_author_posts_url($user->ID) . ' "><h4 class="student_name">' . esc_html( $user->display_name ) . " " . "</h4><h5 class=\"student_link\">  (" . esc_html( $user->user_email ) . ")" . '</h5></a>';
        }
        echo '</ul>';

        ?>
    </div>
</section>
<!--featured job section end-->
<?php endif;

if(!get_theme_mod('front_page_latest_blog_switch',false)): 
$category_list = get_theme_mod('front_page_latest_blog_category','');
$job_portal_latest_post = new WP_Query( apply_filters( 'front_page_featured_jobs_posts_args', array( 'posts_per_page' => 3,'category__in' => $category_list, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );    ?>
<!--latest blog-post section start-->
<section class=" featured-jobs latest-blog-post">
    <div class="container">
        <div class="row">
            <div class="featured-jobs-title">
                <h2 class="featured-jobs-main-title"><?php echo esc_html(get_theme_mod('front_page_latest_blog_title',esc_html__('Latest Blog Post','job-portal'))); ?></h2>
                <?php if(get_theme_mod('front_page_latest_blog_subtitle','')!=''): ?>
                    <h6 class="latest-blog-sub-title"><?php echo esc_html(get_theme_mod('front_page_latest_blog_subtitle')); ?></h6>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($job_portal_latest_post->have_posts()) : ?>
        <div class="row">
            <?php while ( $job_portal_latest_post->have_posts() ) : $job_portal_latest_post->the_post(); ?> 
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="blog-post-item">
                    <?php if(!get_theme_mod('front_page_latest_blog_image_switch',false) && has_post_thumbnail()): ?>                                
                        <div class="blog-post-image">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                        </div>
                    <?php endif; ?>
                    <div class="blog-post-title">
                        <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    </div>
                    <div class="blog-post-text">
                        <?php the_excerpt(); ?>
                    </div>                    
                </div>
            </div>            
            <?php endwhile;?> 
        </div>
    <?php endif;?> 
    </div>
</section>
<!--latest blog-post section end-->
<?php endif; 

get_footer();