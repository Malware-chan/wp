<?php
/* Home Page uses index.php -> also default for when single.php or page.php fails */

if ( have_posts() ) {

    echo '<ul>';
    while ( have_posts() ) {
        // the_post() keeps track of which post are we working with
        the_post(); 
        ?>
        <li><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></li>
        <?php
    }
    echo '</ul>';

}
?>