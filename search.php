<?php
// Include the header
get_header();
?>

<main id="main-content" class="site-main">

    <?php
    if ( have_posts() ) :
        ?>

        <header class="page-header">
            <h1 class="page-title">
                <?php printf( esc_html__( 'Search Results for: %s', 'silversandsclinic' ), '<span>' . get_search_query() . '</span>' ); ?>
            </h1>
        </header><!-- .page-header -->

        <?php
        // Start the WordPress loop for search results
        while ( have_posts() ) : the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="entry-header">
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </header><!-- .entry-header -->

                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                </div><!-- .entry-summary -->

            </article><!-- #post-## -->

        <?php
        endwhile;

        // Display pagination for search results
        the_posts_pagination();

    else :
        ?>

        <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'silversandsclinic' ); ?></p>
        <?php get_search_form(); ?>

    <?php endif; ?>

</main><!-- #main-content -->

<?php
// Include the footer
get_footer();
?>
