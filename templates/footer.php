<!-- footer.php -->
</div> <!-- Close the site-content div opened in header.php -->

<footer>
    <div class="container">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>

        <!-- Optional: Footer navigation, social links, etc. -->
    </div>
</footer>

<?php wp_footer(); ?> <!-- Essential: Loads WordPress scripts and additional scripts injected by plugins -->
</body>
</html>
