<?php get_header();?>
<!-- Main Content -->
<div id="main-content">
    <?php
    // Check if it's the front page
    if (is_front_page()) :
        // Include the content of home.php
        get_template_part('home.php');
    else :
        // Display regular posts or pages
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_title('<h2>', '</h2>');
                the_content();
            endwhile;
        else :
            echo '<p>No content found</p>';
        endif;
    endif;
    ?>
</div>
<?php get_footer(); ?>
