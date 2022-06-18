<?php

namespace Models;

require_once('libraries/database.php');

abstract class Model
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = getPdo();
        $this->table = $this->getTableName(get_called_class());
    }

    private function getTableName(string $className): string
    {
        $tableName = str_replace('Models\\', '', $className);
        return strtolower($tableName) . 's';
    }

    /**
     * Retourne la liste des articles classés par date de création
     *
     * @return array
     */
    public function findAll(?string $order = ""): array
    {
        $sql = "SELECT * FROM $this->table";

        if ($order)
        {
            $sql .= " ORDER BY " . $order;
        }
        $resultats = $this->pdo->query($sql);
        // On fouille le résultat pour en extraire les données réelles
        $items = $resultats->fetchAll();

        return $items;
    }

    /**
     * Retourn un élément
     *
     * @param integer $id
     * @return void
     */
    public function find(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
        $query->execute(['id' => $id]);
        $item = $query->fetch();
        return $item;
    }

    /**
     * Supprime un élément de la base de données
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM $this->table WHERE id = :id");
        $query->execute(['id' => $id]);
    }
}
