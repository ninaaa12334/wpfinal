<?php
/* Template Name: Job Submission */
get_header();
?>

<div class="container my-5">
    <h2>Apply for a Job</h2>

    <?php
    if (isset($_GET['job'])) {
        $job_id = intval($_GET['job']);
        $job_post = get_post($job_id);

        if ($job_post && $job_post->post_type === 'job') {
            echo '<h4 class="mt-3 mb-4">Position: ' . esc_html($job_post->post_title) . '</h4>';
        } else {
            echo '<p>Invalid job selected.</p>';
        }
    }
    ?>

    <form method="post" action="">
        <div class="mb-3">
            <label for="name" class="form-label">First Name</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>

        <div class="mb-3">
            <label for="surname" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="surname" id="surname" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Cover Letter / Message</label>
            <textarea class="form-control" name="message" id="message" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Application</button>
    </form>
</div>

<?php get_footer(); ?>

