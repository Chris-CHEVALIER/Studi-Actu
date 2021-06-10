<?php require("./header.php") ?>
    <div class="container d-flex flex-wrap">
        <?php
            $manager = new ArticlesManager();
            $articles = $manager->getAll();

            foreach ($articles as $article): ?>
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $article->getTitle() ?></h5>
                        <p class="card-text"><?= substr($article->getContent(), 0, 120) ?>...</p>
                        <a href="./readArticle.php?id=<?= $article->getId() ?>" class="btn btn-link"><i class="fas fa-eye"></i> Lire plus...</a><br>
                        <a href="./updateArticle.php?id=<?= $article->getId() ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <a href="./deleteArticle.php?id=<?= $article->getId() ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                    </div>
                </div>
            <?php endforeach ?>
    </div>
</body>
</html>