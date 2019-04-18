<?php
            
    $sqlComments =
    "SELECT * FROM comments WHERE comments.post_id = {$_GET['post_id']}";
    "SELECT * FROM comments JOIN users ON comments.user_id = users.id WHERE comments.post_id = {$_GET['post_id']}";

    $statement = $connection->prepare($sqlComments);
    $statement->execute();

    $statement->setFetchMode(PDO::FETCH_ASSOC);

    $comments = $statement->fetchAll();
        foreach ($comments as $comment) {
?>
    
<div class = "comment-div">
    <ul id="hide">
        <li  class="single-comment">
        <div>Posted by: <?php echo $comment['author'] ?></div>
            <div> comment: <?php echo $comment['text'] ?> </div>
            </li>
        
            <form method="GET" action="delete-comment.php" >
                <input class="btn btn-default" type="submit" value="Delete">
                <input type="hidden" value="<?php echo $comment['id']; ?>" name="id"/>
                <input type="hidden" value="<?php echo $comment['post_id']; ?>" name="post_id"/>
            </form>
</div>
<?php } ?>
</ul>
    <button id= "button" onclick="hideComment()">Hide comments</button>
<script>
var comments = document.getElementById('hide')
var button = document.getElementById('button')
function hideComment(){
    
    if(button.innerHTML == "Show Comments"){
        comments.classList.remove("hide")
        button.innerHTML = "Hide Comments"
    } else{
        comments.className = "hide"
        button.innerHTML = "Show Comments"
    }
}
</script>

