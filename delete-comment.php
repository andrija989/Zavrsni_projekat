<?php
   $servername = "127.0.0.1";
   $username = "root";
   $password = "vivify";
   $dbname = "blog";

   try {
       $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }
   catch(PDOException $e)
   {
       echo $e->getMessage();
   }
    $id = $_GET['id'];
    $post_id = $_GET['post_id'];
        $sqlDelete = "DELETE FROM comments WHERE id = $id;";
        $statementDelete = $connection->prepare($sqlDelete);
        $statementDelete->execute();
        $statementDelete->setFetchMode(PDO::FETCH_ASSOC);
    header("Location: http://localhost:8080/single-post.php?post_id=$post_id");
?>