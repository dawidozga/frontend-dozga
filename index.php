<?php

/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package frontend-dozga
 */

get_header();

?>

<div class="container">

    <?php

    while (have_posts()) : the_post();

        the_content();

    endwhile;

    ?>

</div><!-- .container -->

<?php

get_footer();
