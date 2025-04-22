<?php get_header(); ?>

<div class="container py-5">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
    ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="job-card">
                <!-- Job Image -->
                <?php if (has_post_thumbnail()) : ?>
                    <div class="job-image mb-4">
                        <?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
                    </div>
                <?php endif; ?>

                <!-- Job Title -->
                <h2 class="job-title"><?php the_title(); ?></h2>

                <!-- Job Details -->
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
                <p><strong>Job Type:</strong> 
                    <?php 
                    $job_type = get_field('job_type'); 
                    echo $job_type ? $job_type : 'Not Provided'; 
                    ?>
                </p>
                <p><strong>Description:</strong> <?php the_content(); ?></p>

                
                <a href="http://localhost/wordpress/?page_id=23" class="btn btn-success">Apply Now</a>
            </div>
        </div>
    </div>
    <?php
        endwhile;
    endif;
    ?>
</div>

<?php get_footer(); ?>


<?php get_footer(); ?>
