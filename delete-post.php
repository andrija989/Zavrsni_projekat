<?php
   include "db.php";
?>

<?php
    $id = $_GET['id'];
        $sqlDel = "DELETE FROM posts WHERE id = $id;";
        $statementDelete = $connection->prepare($sqlDel);
        $statementDelete->execute();
        $statementDelete->setFetchMode(PDO::FETCH_ASSOC);
    
    header("Location: http://localhost:8080/index.php");
    
?>