<?php

namespace model;

use PDO;
use PDOException;
use model\Db;

class TasksModel
{

    private $table = 'tbl_tasks';
    private $db;

    public function __construct()
    {
        $this->db = DB::connectDB();

    }

    public function selectAllTasks()
    {
        try {
            $model = $this->db->prepare('SELECT * FROM ' . $this->table);
            $model->execute();
            return $model->fetchAll();
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function deleteAllTasks()
    {
        try {
            $model = $this->db->prepare('DELETE FROM ' . $this->table);
            $model->execute();
            return 'Tasks were deleted';
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function createTask($content)
    {
        try {
            $model = $this->db->prepare('INSERT INTO ' . $this->table . ' (task_content) VALUES (:content)');
            $model->bindValue(':content', $content, PDO::PARAM_STR);
            $model->execute();
            $id = $this->db->lastInsertId();
            return $id;
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function selectById($id)
    {
        try {
            $model = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE id = :id');
            $model->bindValue(':id', $id, PDO::PARAM_INT);
            $model->execute();
            return $model->fetch();
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function deleteTask($id)
    {
        try {
            $model = $this->db->prepare('DELETE FROM ' . $this->table . ' WHERE id = :id');
            $model->bindValue(':id', $id, PDO::PARAM_INT);
            $model->execute();
            return 'Row was deleted';
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
        return;
    }
}
