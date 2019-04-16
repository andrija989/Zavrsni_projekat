<html>
<aside class="col-sm-3 ml-sm-auto blog-sidebar">
<div class="sidebar-module sidebar-module-inset">
    <?php
    $sqlside ="SELECT * FROM posts ORDER BY created_at DESC;";
    $statement = $connection->prepare($sqlside);

    $statement->execute();

    $statement->setFetchMode(PDO::FETCH_ASSOC);

    $posts = $statement->fetchAll(); 

    ?>
    <?php
    foreach ($posts as $post) {
?> 
                <a href="single-post.php?post_id=<?php echo($post['id']) ?>"><?php echo($post['title']) ?></a>
                

    <?php 
    }
    ?>
</aside><!-- /.blog-sidebar -->
</html>