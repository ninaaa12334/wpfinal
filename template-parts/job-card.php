<div class="col-md-4 mb-4">
    <div class="card h-100">
        <?php if (has_post_thumbnail()) : ?>
            <img src="<?php the_post_thumbnail_url('job-thumbnail'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
        <?php endif; ?>
        <div class="card-body">
            <h5 class="card-title"><?php the_title(); ?></h5>
            <p class="card-text"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn btn-primary">View Job</a>
            <a href="<?php echo site_url('/?page_id=23&job_id=' . get_the_ID()); ?>" class="btn btn-success mt-2">Apply Now</a>
        </div>
    </div>
</div>
