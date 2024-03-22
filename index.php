<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cleo's Blog - Index</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1 id="blogTitle">✿ Cleo's Blog ✿</h1>
    <div class="post-list">
        <?php
        // list out all markdown files
        $posts = glob('posts/*.md');

        // most recent posts listed first
        usort($posts, function ($a, $b) {
            return -strcmp($a, $b);
        });

        if ($posts) {
            echo "<ul>";
            foreach ($posts as $post) {
                $postName = basename($post, '.md');
                // each post
                echo "<li class='index-list-item'><a href='post.php?name=$postName'>✦ $postName</a></li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No posts found.</p>";
        }
        ?>
    </div>

    <div id="aboutCleo">
        <h3>About Cleo</h3>
        <img id="portrait" src="images/cleo.webp" alt="a portrait of cleo">
        <p>Cleo is a spirited tabby with emerald eyes and a curious nature, known for her adventurous escapades in the neighborhood. She's a social butterfly among her fellow feline friends and a beloved figure on her own website, where her daily antics and wisdom are shared with an adoring audience.</p>
    </div>
        
    </body>

</html>