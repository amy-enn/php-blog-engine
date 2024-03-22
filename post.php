<?php
require __DIR__ . '/vendor/autoload.php';
$parsedown = new Parsedown();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cleo's Blog - Post</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- little link back to index page -->
    <a href="index.php">↜ Index</a>

    <?php
    // get the post name from the query string
    $postName = $_GET['name'] ?? 'default-post';

    // load/parse the markdown
    $postPath = "posts/$postName.md";
    if (file_exists($postPath)) {
        $content = file_get_contents($postPath);
        // echo within the body tag
        echo $parsedown->text($content);
    } else {
        echo "Post not found.";
    }
    ?>

</body>

</html>