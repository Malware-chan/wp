<?php
/* index.php -> present in the main page, also default for when single.php or page.php fails */

if ( have_posts() ) {

    while ( have_posts() ) {
        the_post(); 
        the_title();
        the_content();
        the_permalink()
    }

}
?>