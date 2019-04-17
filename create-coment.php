<?php
    if($_POST){
    $author = $_POST['author'];
    $comment = $_POST['comment'];
    $id = $_POST['id'];
    $sqlInsert = "INSERT INTO comments (author, text, post_id) VALUES ({$author}, {$comment}, {$id})";
    $statementInsert = $connection->prepare($sqlInsert);
    $statementInsert->execute();
    $statementInsert->setFetchMode(PDO::FETCH_ASSOC);
}
?>
/*Forma za dodavalje novih komentara
            <form method="POST" action="create-comment.php" >
                <input name="author" type="text" placeholder="Author" style="display:block; margin-bottom:1rem; padding:0.5rem"/>
                <textarea name="comment" rows="5" cols="70" placeholder="Comment" style="display:block; margin-bottom:1rem"></textarea>
                <input type="hidden" value="$_GET['post_id']" name="id"/>
                <input class="btn btn-default" type="submit" value="Submit">
            </form>