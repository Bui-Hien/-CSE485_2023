<?php

namespace models;

class Quizzes
{
    private $id;
    private $lesson_id;
    private $title;
    private $created_at;
    private $updated_at;

    /**
     * @param $id
     * @param $lesson_id
     * @param $title
     * @param $created_at
     * @param $updated_at
     */
    public function __construct($id, $lesson_id, $title, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->lesson_id = $lesson_id;
        $this->title = $title;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getLessonId()
    {
        return $this->lesson_id;
    }

    /**
     * @param mixed $lesson_id
     */
    public function setLessonId($lesson_id): void
    {
        $this->lesson_id = $lesson_id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at): void
    {
        $this->updated_at = $updated_at;
    }


}