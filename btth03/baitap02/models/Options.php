<?php

namespace models;

class Options
{
    private $id;
    private $question_id;
    private $option;
    private $is_correct;
    private $created_at;
    private $updated_at;

    /**
     * @param $id
     * @param $question_id
     * @param $option
     * @param $is_correct
     * @param $created_at
     * @param $updated_at
     */
    public function __construct($id, $question_id, $option, $is_correct, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->question_id = $question_id;
        $this->option = $option;
        $this->is_correct = $is_correct;
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
    public function getQuestionId()
    {
        return $this->question_id;
    }

    /**
     * @param mixed $question_id
     */
    public function setQuestionId($question_id): void
    {
        $this->question_id = $question_id;
    }

    /**
     * @return mixed
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * @param mixed $option
     */
    public function setOption($option): void
    {
        $this->option = $option;
    }

    /**
     * @return mixed
     */
    public function getIsCorrect()
    {
        return $this->is_correct;
    }

    /**
     * @param mixed $is_correct
     */
    public function setIsCorrect($is_correct): void
    {
        $this->is_correct = $is_correct;
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