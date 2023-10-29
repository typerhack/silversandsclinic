<?php
// Include the header
get_header();
?>

<main id="main-content" class="site-main">

    <?php
    // Start the WordPress loop
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php the_content(); ?>
                </div><!-- .entry-content -->

            </article><!-- #post-## -->

        <?php
            // End of the loop
        endwhile;
    else :
        echo '<p>No page found.</p>';
    endif;
    ?>

</main><!-- #main-content -->

<?php
// Include the footer
get_footer();
?>
