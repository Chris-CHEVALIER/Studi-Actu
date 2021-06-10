<?php

require("./header.php");
$manager = new ArticlesManager();

if ($_POST) {
    $article = new Article($_POST);
    $manager->create($article);

    echo "<script>window.location.href='./index.php'</script>";
}
?>

<div class="container mt-2">
    <h3>Publier l'article</h3>
    <form method="post">
        <label for="form-label">Titre</label>
        <input type="text" name="title" id="title" class="form-control">
        <label for="form-label">Contenu</label>
        <textarea name="content" id="content" class="form-control"></textarea>
        <input type="submit" value="Publier" class="btn btn-warning mt-2">
    </form>
</div>