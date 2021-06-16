<?php 
    require("./header.php");

    $manager = new CommentsManager();
    $comment = $manager->getById($_GET["id"]);
    $articleId = $comment->getArticle_id();
    $manager->delete($_GET["id"]);
?>

<script>window.location.href="./readArticle.php?id=<?= $articleId ?>"</script>