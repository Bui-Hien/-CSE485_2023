<?php

namespace models;

class Materials
{
    private $id;
    private $lesson_id;
    private $title;
    private $file_path;
    private $created_at;
    private $updated_at;

    // Getter for id
    public function getId()
    {
        return $this->id;
    }

    // Setter for id
    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter for lesson_id
    public function getLessonId()
    {
        return $this->lesson_id;
    }

    // Setter for lesson_id
    public function setLessonId($lesson_id)
    {
        $this->lesson_id = $lesson_id;
    }

    // Getter for title
    public function getTitle()
    {
        return $this->title;
    }

    // Setter for title
    public function setTitle($title)
    {
        $this->title = $title;
    }

    // Getter for file_path
    public function getFilePath()
    {
        return $this->file_path;
    }

    // Setter for file_path
    public function setFilePath($file_path)
    {
        $this->file_path = $file_path;
    }

    // Getter for created_at
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    // Setter for created_at
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    // Getter for updated_at
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    // Setter for updated_at
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }
}
