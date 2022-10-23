<?php
/* Template Name: Home Template */
get_header();
?>

<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-9 text-center">
                <h1>Dream Jobs <i class="fa-solid fa-cloud"></i></h1>
                <h2>Search Latest Govt. & Private Sector Jobs</h2>
            </div>
        </div>
        <div class="row icon-boxes">
            <?php
            $args = array(
                'post_type' => 'jobs',
                'orderby'    => 'ID',
                'post_status' => 'publish',
                'order'    => 'DESC',
                'posts_per_page' => -1
            );
            $result = new WP_Query($args);
            if ($result->have_posts()) {
                while ($result->have_posts()) : $result->the_post();
            ?>
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon-box card text-white bg-dark mb-3">
                            <h4 class="title"><?php echo wp_trim_words(get_the_title(), 6, '...'); ?></h4>
                            <strong>
                                Posted on: <small><?php echo get_the_date('jS M, Y'); ?></small>
                            </strong>
                            <p class="description"><?php echo wp_trim_words(get_the_content(), 8, ' ...'); ?></p>
                            <div class="icon">
                                <a href="<?php echo get_the_permalink(); ?>" target="_blank">
                                    <button type="button" class="btn btn-outline-warning">Details</button>
                                </a>
                            </div>
                        </div>
                    </div>
            <?php endwhile;
            } else echo "Nothing Posted !!";
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>