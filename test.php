<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testing</title>
</head>
<body>

    <!-- Go to :: Setting > Site Title & Tagline -->
    <?php 
        /* Doesn't work outside /wp-content/themes */
        echo bloginfo('name');              // Site Title
        echo bloginfo('description');       // Tagline or description
    ?>

    
</body>
</html>