<?php
    require("./header.php");
    $manager = new ArticlesManager();
    $article = $manager->getById($_GET["id"]);
?>
    <div class="container mt-2">
        <h3><?= $article->getTitle() ?></h3>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <p class="card-text"><?= $article->getContent() ?>...</p>
                <a href="./updateArticle.php?id=<?= $article->getId() ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                <a href="./deleteArticle.php?id=<?= $article->getId() ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
            </div>
        </div>
    </div>
</body>
</html>