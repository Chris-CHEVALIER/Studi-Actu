<?php

class ArticlesManager {
    // Attributs 
    private $pdo;

    // Méthode
    public function __construct() {
        $host = "localhost";
        $dbName = "actus";
        $dbUsername = "root";
        $dbPassword = "root";
        try {
            $this->setPdo(new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword));
        }
        catch(\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Get the value of pdo
     */ 
    public function getPdo() {
        return $this->pdo;
    }

    /**
     * Set the value of pdo
     *
     * @return  self
     */ 
    public function setPdo($pdo) {
        $this->pdo = $pdo;
        return $this;
    }

    public function create(Article $article) {
        $req = $this->pdo->prepare("INSERT INTO `article` (title, content) VALUES (:title, :content)");

        $req->bindValue(":title", $article->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $article->getContent(), PDO::PARAM_STR);
        $req->execute();
    }

    public function update(Article $article) {
        $req = $this->pdo->prepare("UPDATE `article` SET title = :title, content = :content WHERE id = :id");

        $req->bindValue(":title", $article->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":content", $article->getContent(), PDO::PARAM_STR);
        $req->bindValue(":id", $article->getId(), PDO::PARAM_INT);
        $req->execute();
    }

    public function delete(int $id) {
        $req = $this->pdo->prepare("DELETE FROM `article` WHERE id = :id");

        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }

    public function getById(int $id)  {
        $sql = "SELECT * FROM `article` WHERE id = $id";
        $req = $this->pdo->query($sql);

        /*$req->bindValue(":id", $id, PDO::PARAM_INT);*/
        $data = $req->fetch();

        return new Article($data);
    }

    public function getAll()  {
        $req = $this->pdo->query("SELECT * FROM article ORDER BY id DESC");
        $articles = array();
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = new Article($data);
        }
        return $articles;
    }
}