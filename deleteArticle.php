<?php 
    require("./header.php");

    $manager = new ArticlesManager();
    $manager->delete($_GET["id"]);
?>

<script>window.location.href="./index.php"</script>