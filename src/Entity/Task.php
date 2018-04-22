<?php
// src/Entity/search.php
namespace App\Entity;

class Task
{
    protected $task;

    public function getTask()
    {
        return $this->task;
    }

    public function setTask($task)
    {
        $this->task = $task;
    }

}