<?php
/**
 * Created by PhpStorm.
 * User: Matthew
 * Date: 11/1/2019
 * Time: 2:51 PM
 */
get_header() ?>
    <section class="blog-page-section">
        <div class="container">
            <div class="row">
                <?php $custom_class = (get_theme_mod('blog_sidebar', 'right') == 'left') ? "9" : ((get_theme_mod('blog_sidebar', 'right') == 'right') ? "9" : "12");
                if (get_theme_mod('blog_sidebar', 'right') == "left") { ?>
                    <div class="col-lg-3 col-md-3 col-xs-12">
                        <?php get_sidebar(); ?>
                    </div>
                <?php } ?>
                <div class="col-lg-<?php echo esc_attr($custom_class); ?> col-md-<?php echo esc_attr($custom_class); ?> col-xs-12">
                    <?php
                    // Set the Current Author Variable $curauth
                    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
                    ?>

                    <div class="author-profile-card">
                        <?php if ($curauth->first_name) {
                            ?><h2><?php echo $curauth->first_name . " " . $curauth->last_name; ?></h2>
                        <?php } else {
                            ?><h2><?php echo $curauth->nickname; ?></h2> <?php
                        }
                        ?>
                        <div class="author-photo">
                            <?php echo get_avatar($curauth->user_email, '90 '); ?>
                        </div>
                        <p>
                            <strong>Email:</strong><?php echo " " . $curauth->user_email; ?><br/>
                            <br/>
                            <strong>Bio:</strong> <?php echo " " . $curauth->user_description; ?></p>
                    </div>
                </div>
                <?php if (get_theme_mod('blog_sidebar', 'right') == "right") { ?>
                    <div class="col-lg-3 col-md-3 col-xs-12">
                        <?php get_sidebar(); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php get_footer();

