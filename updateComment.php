<?php
    require("./header.php");

    $manager = new CommentsManager();
    $comment = $manager->getById($_GET["id"]);
    $articleId = $comment->getArticle_id();

    if ($_POST) {
        $comment->hydrate([
            "content" => $_POST["content"],
            "article_id" => $_GET["id"] 
        ]);
        $manager->update($comment);

        echo "<script>window.location.href='./readArticle.php?id={$articleId}'</script>";
    }
?>

    <div class="container mt-2">
        <h3>Modifier un Commentaire</h3>
        <form method="post">
            <textarea name="content" id="content" placeholder="Votre commentaire" class="form-control"><?= $comment->getContent() ?></textarea>
            <input type="submit" value="Modifier" class="btn btn-warning mt-2">
        </form>
    </div>
</body>
</html>