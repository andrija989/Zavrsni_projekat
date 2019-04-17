<html>
    <aside class="col-sm-3 ml-sm-auto blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <?php
        $sqlside ="SELECT * FROM posts ORDER BY created_at DESC LIMIT 5;";
        $statement = $connection->prepare($sqlside);

        $statement->execute();

        $statement->setFetchMode(PDO::FETCH_ASSOC);

        $posts = $statement->fetchAll(); 

        ?>
        <h3>Last 5 posts: </h3>
        <?php
        $i=0;
        foreach ($posts as $post) {
        $i++
        ?> 
        
        <a class="sidebar-5-links" href="single-post.php?post_id=<?php echo($post['id']) ?>"><?php echo($i . " - ") ?><?php  echo($post['title']) ?></a>
                

        <?php 
        }
        ?>
    </aside><!-- /.blog-sidebar -->
</html>