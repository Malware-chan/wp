<!DOCTYPE html>
<html lang="en">
<head>
    <?php wp_head(); /* wp_head() will search for -> functions.php */ ?>
</head>
<body>
    <h1>Universite</h1>

    <!-- 
        <html> and <body> are closed in the footer
        index.php ::: get_header() -> body content in index.php -> get footer()

        Breaking the end of the header and beggining of the footer makes the top WordPress bar to appear
    -->