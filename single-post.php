<?php
    include "db.php";
?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>
<?php include 'header.php'?>
<body>
<main role="main" class="container">

    <div class="row">
    <?php
        if (isset($_GET['post_id'])) {

        $sql = "SELECT id, title, body, author, created_at FROM posts WHERE posts.id = {$_GET['post_id']}";
        $statement = $connection->prepare($sql);

        $statement->execute();

        $statement->setFetchMode(PDO::FETCH_ASSOC);

        $singlePost = $statement->fetch(); 
        }

                    

    ?>
    <div class="blog-post">
        <h2 class="blog-post-title"><a href="single-post.php?post_id=<?php echo($singlePost['id']) ?>"><?php echo($singlePost['title']) ?></a></h2>
        <p class="blog-post-meta"><?php echo($singlePost['created_at']) ?> by <?php echo($singlePost['author']) ?></p>
        <p><?php echo($singlePost['body']) ?></p>
        <form class="deletePost" method="GET" action="delete-post.php" name="deletePostForm">
                <input class="btn btn-default" type="submit" value="Delete post" id="delete-post" >
                <input type="hidden" value="<?php echo $singlePost['id']; ?>" name="id" />
        </form>
        <script>
            document.getElementById('delete-post').addEventListener("click", function(event){
            event.preventDefault();
            if(window.confirm("Do you want to delete this post???")) {
                document.deletePostForm.submit();
            }
            });
        </script>

        
        <div class="comments">
            <h3>Insert Comment</h3>
            <?php
                $error = '';
                if ($_SERVER["REQUEST_METHOD"] === 'GET' && !empty($_GET['error'])) {
                    $error = 'All fields are required!';
                }
            ?>
            <form class="form" method="POST" action="create-comment.php" >
                <?php if (!empty($error)) {?>
                    <span class="alert alert-danger">
                        <?php echo $error; ?>
                    </span>
                <?php } ?>
                
                <input name="author" type="text" placeholder="Author"  style="display:block; margin-bottom:1rem; padding:0.5rem"/>
                <textarea name="comment" rows="5" cols="70" placeholder="Comment"  style="display:block; margin-bottom:1rem"></textarea>
                <input type="hidden" value="<?php echo $_GET['post_id']; ?>" name="id"/>
                <input class="btn btn-default" type="submit" value="Submit">
            </form>
            <h3 class="comment-list-headline">Comment list</h3>
            <?php
            include 'comments.php'
            ?>
                   
        </div>
    </div>  
        <?php include 'sidebar.php'?>

    </div><!-- /.row -->

</main><!-- /.container -->

<footer class="blog-footer">
   <?php include "footer.php" ?>
</footer>
</body>
</html>