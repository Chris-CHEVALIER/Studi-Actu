<?php

class CommentsManager extends BaseManager {
    // Méthodes
    public function create(Comment $comment) {
        $req = $this->pdo->prepare("INSERT INTO `comment` (content, article_id) VALUES (:content, :article_id)");

        $req->bindValue(":content", $comment->getContent(), PDO::PARAM_STR);
        $req->bindValue(":article_id", $comment->getArticle_id(), PDO::PARAM_INT);
        $req->execute();
    }

    public function update(Comment $comment) {
        $req = $this->pdo->prepare("UPDATE `comment` SET content = :content WHERE id = :id");

        $req->bindValue(":content", $comment->getContent(), PDO::PARAM_STR);
        $req->bindValue(":id", $comment->getId(), PDO::PARAM_INT);
        $req->execute();
    }

    public function delete(int $id) {
        $req = $this->pdo->prepare("DELETE FROM `comment` WHERE id = :id");

        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
    }

    public function getById(int $id)  {
        $req = $this->pdo->prepare("SELECT * FROM `comment` WHERE id = :id");
        
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();

        return new Comment($data);
    }

    public function getAllByArticleId(int $articleId)  {
        $req = $this->pdo->prepare("SELECT * FROM `comment` WHERE article_id = :article_id ORDER BY id DESC");
        $req->bindParam(":article_id", $articleId, PDO::PARAM_INT);

        $req->execute();
        $datas = $req->fetchAll();

        $comments = array();
        foreach ($datas as $data) {
            $comments[] = new Comment($data);
        }
        return $comments;
    }
}