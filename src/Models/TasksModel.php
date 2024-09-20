<?php

namespace App\Models;

use PDO;

class TasksModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getTasks()
    {
        $query = $this->db->prepare('SELECT `id`,`task`,`completed`,`created` FROM `Tasks` ');
        $query->execute();
        return $query->fetchAll();
    }

    public function getTask($id)
    {
        $query = $this->db->prepare('SELECT `id`,`task`,`completed`,`created` FROM `Tasks` WHERE `id` = :id');
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public function completedTasks()
    {
        $query = $this->db->prepare('SELECT `id`,`task`,`completed`,`created` FROM `Tasks` WHERE `completed` = :id');
        $query->execute(['id' => 1]);
        return $query->fetchAll();
    }

    public function addTask($task)
    {
        $query = $this->db->prepare('INSERT INTO `Tasks` (`task`) VALUES (:task)');
        $query->execute(['task' => $task]);
    }

    public function completeTask(int $id)
    {
        $query = $this->db->prepare('UPDATE `Tasks` SET `completed` = 1 WHERE `id` = :id');
        $query->execute(['id' => $id]);
    }

    public function deleteTask(int $id)
    {
        $query = $this->db->prepare('DELETE FROM `Tasks` WHERE `id` = :id');
        $query->execute(['id' => $id]);
    }

    public function editTask(int $id, string $edit)
    {
        $query = $this->db->prepare('UPDATE `Tasks` SET `task` = :edit WHERE `id` = :id');
        $query->execute(['id' => $id, 'edit' => $edit]);
    }
}