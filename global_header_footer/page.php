<?php
get_header();
/* Pages use page.php -> index.php if WordPress can't find this file */

if ( have_posts() ) {

    while ( have_posts() ) {
        the_post(); 
        the_title();
        the_content();
    }

}


get_footer();
?>