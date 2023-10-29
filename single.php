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
                    <div class="entry-meta">
                        <span class="posted-on">Posted on <?php the_date(); ?></span>
                        <span class="byline"> by <?php the_author(); ?></span>
                    </div><!-- .entry-meta -->
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <?php
                    the_content();

                    // Link pages when post uses <!--nextpage--> quicktag
                    wp_link_pages( array(
                        'before'      => '<div class="page-links">' . __( 'Pages:', 'silversandsclinic' ),
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                    ) );
                    ?>
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                    <?php
                    // Display post categories and tags
                    echo '<div class="post-categories">Categories: ' . get_the_category_list(', ') . '</div>';
                    echo '<div class="post-tags">Tags: ' . get_the_tag_list('', ', ') . '</div>';
                    ?>
                </footer><!-- .entry-footer -->

            </article><!-- #post-## -->

        <?php
            // End of the loop
        endwhile;
    endif;
    ?>

</main><!-- #main-content -->

<?php
// Include the footer
get_footer();
?>
