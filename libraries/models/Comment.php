<?php

require_once('libraries/models/Model.php');

class Comment extends Model
{

    /**
     * Retourne la liste des commentaires d'un  article
     *
     * @param integer $article_id
     * @return array
     */
    public function findAllWithArticle(int $article_id): array
    {
        $query = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
        $query->execute(['article_id' => $article_id]);
        $commentaires = $query->fetchAll();

        return $commentaires;
    }

    /**
     * Retourne un commentaire
     *
     * @param integer $id
     * @return void
     */
    public function find(int $id)
    {
        $query = $this->pdo->prepare('SELECT * FROM comments WHERE id = :id');
        $query->execute(['id' => $id]);
        $commentaire = $query->fetch();
        return $commentaire;
    }

    /**
     * Insère un commentaire dans labase de données
     *
     * @param string $author
     * @param string $content
     * @param integer $article_id
     * @return void
     */
    public function insert(string $author, string $content, int $article_id): void
    {
        $query = $this->pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
        $query->execute(compact('author', 'content', 'article_id'));
    }

    /**
     * Supprime un commentaire de la base de données
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        $query = $this->pdo->prepare('DELETE FROM comments WHERE id = :id');
        $query->execute(['id' => $id]);
    }
}
