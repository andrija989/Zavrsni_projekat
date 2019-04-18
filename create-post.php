<?php
    include "db.php";

    if(!empty($_POST['title']) && !empty($_POST['post'] && !empty($_POST['author']))) {
        $title = $_POST['title'];
        $post = $_POST['post'];
        $author = $_POST['author'];
        $date = date('Y-m-d h:i:s');
        $sqlInsert = "INSERT INTO posts (title, body, author,created_at) VALUES ('{$title}', '{$post}', '{$author}','$date');";
        // var_dump($sqlInsert);
        $statementInsert = $connection->prepare($sqlInsert);
        $statementInsert->execute();
        $statementInsert->setFetchMode(PDO::FETCH_ASSOC);
    
        header("Location: http://localhost:8080/index.php");
    } else {
        header("Location: http://localhost:8080/create.php?&error=1");
    }
?>

            