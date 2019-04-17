<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "vivify";
    $dbname = "blog";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }

    $id = $_POST['id'];
    if(!empty($_POST['author']) && !empty($_POST['comment'])) {
        $author = $_POST['author'];
        $comment = $_POST['comment'];
        $sqlInsert = "INSERT INTO comments (author, text, post_id) VALUES ('{$author}', '{$comment}', {$id});";
        $statementInsert = $connection->prepare($sqlInsert);
        $statementInsert->execute();
        $statementInsert->setFetchMode(PDO::FETCH_ASSOC);
    
        header("Location: http://localhost:8080/single-post.php?post_id=$id");
    } else {
        header("Location: http://localhost:8080/single-post.php?post_id=$id&error=1");
    }
?>

            