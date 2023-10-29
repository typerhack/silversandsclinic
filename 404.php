<?php
// Include the header
get_header();
?>

<main id="main-content" class="site-main">

    <section class="error-404 not-found">
        <header class="page-header">
            <h1 class="page-title">Oops! That page can't be found.</h1>
        </header><!-- .page-header -->

        <div class="page-content">
            <p>It looks like nothing was found at this location. Maybe try a search or go back to the <a href="<?php echo home_url(); ?>">homepage</a>?</p>

            <?php get_search_form(); ?>
        </div><!-- .page-content -->
    </section><!-- .error-404 -->

</main><!-- #main-content -->

<?php
// Include the footer
get_footer();
?>
