<?php
/* Posts use single.php -> index.php if WordPress can't find this file */

if ( have_posts() ) {

    while ( have_posts() ) {
        the_post(); 
        the_content();
    }

}
?>