<aside id="secondary" class="widget-area">

    <?php
    // Check if the sidebar has widgets
    if ( ! is_active_sidebar( 'main-sidebar' ) ) {
        return;
    }

    // Display the widgets
    dynamic_sidebar( 'main-sidebar' );
    ?>

</aside><!-- #secondary -->
