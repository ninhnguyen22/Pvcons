<?php

namespace App\Models;

class PostEntity
{
    public $id;
    public $title;
    public $description;
    public $userId;
    public $createdAt;
    public $updatedAt;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt($updateAt)
    {
        $this->updatedAt = $updateAt;
    }
}
