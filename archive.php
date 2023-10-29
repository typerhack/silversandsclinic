<?php
// Include the header
get_header();
?>

<main id="main-content" class="site-main">

    <?php
    // Display the archive title and description
    the_archive_title('<h1 class="archive-title">', '</h1>');
    the_archive_description('<div class="archive-description">', '</div>');
    ?>

    <?php
    // Start the WordPress loop
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="entry-header">
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="entry-meta">
                        <span class="posted-on">Posted on <?php the_date(); ?></span>
                        <span class="byline"> by <?php the_author(); ?></span>
                    </div><!-- .entry-meta -->
                </header><!-- .entry-header -->

                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                </div><!-- .entry-summary -->

            </article><!-- #post-## -->

        <?php
            // End of the loop
        endwhile;

        // Display pagination
        the_posts_pagination();

    else :
        echo '<p>No posts found.</p>';
    endif;
    ?>

</main><!-- #main-content -->

<?php
// Include the footer
get_footer();
?>
