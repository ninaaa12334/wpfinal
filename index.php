<?php get_header(); ?>

<div class="container py-5">
    <h1 class="text-center mb-4">Job Listings</h1>

    <div class="row">
        <?php
       
        $args = array(
            'post_type' => 'job',
            'posts_per_page' => 6,
        );
        $job_query = new WP_Query($args);
        if ($job_query->have_posts()) :
            while ($job_query->have_posts()) : $job_query->the_post();
        ?>
        <div class="col-md-4 mb-4">
            <div class="job-card">
            
                <?php if (has_post_thumbnail()) : ?>
                    <div class="job-image mb-3">
                        <?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
                    </div>
                <?php endif; ?>

                <h2 class="job-title"><?php the_title(); ?></h2>

                <p><strong>Company:</strong> 
                    <?php 
                    $company_name = get_field('company_name'); 
                    echo $company_name ? $company_name : 'Not Provided'; 
                    ?>
                </p>
                <p><strong>Location:</strong> 
                    <?php 
                    $job_location = get_field('job_location'); 
                    echo $job_location ? $job_location : 'Not Provided'; 
                    ?>
                </p>
          
                <a href="<?php the_permalink(); ?>" class="btn btn-primary">View Job</a>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); ?>
        <?php else : ?>
            <p>No jobs found</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>



