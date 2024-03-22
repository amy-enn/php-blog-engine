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

    <div id="postContent">
        <?php
        // list and sort all markdown files
        $posts = glob('posts/*.md');
        usort($posts, function($a, $b) {
             // sort newest to oldest
            return strcmp($b, $a);
        });

        // get the current post name from the query string
        $postName = $_GET['name'] ?? 'default-post';
        $currentPostPath = "posts/$postName.md";

        // find the current post index
        $currentPostIndex = array_search($currentPostPath, $posts);

        // calculate next and previous posts
        $nextPostIndex = $currentPostIndex - 1;
        $prevPostIndex = $currentPostIndex + 1;

        // load the post and parse markdown
        if (file_exists($currentPostPath)) {
            $content = file_get_contents($currentPostPath);
            echo $parsedown->text($content);
        } else {
            echo "Post not found.";
        }
        ?>
    </div>

    <div id="navigation">
        <?php
        // display a previous post link (if it exists)
        if (isset($posts[$prevPostIndex])) {
            $prevPostName = basename($posts[$prevPostIndex], '.md');
            echo "<a href='post.php?name=$prevPostName'>⇐ Previous Post</a> ";
        }

        // display a next post link (if it exists)
        if (isset($posts[$nextPostIndex])) {
            $nextPostName = basename($posts[$nextPostIndex], '.md');
            echo "<a href='post.php?name=$nextPostName'>Next Post ⇒</a>";
        }
        ?>
    </div>

</body>
</html>
