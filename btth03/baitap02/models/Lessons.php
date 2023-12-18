<?php

namespace models;

class Lessons
{
    private $id;
    private $course_id;
    private $title;
    private $description;
    private $created_at;
    private $updated_at;

    //getter id
    public function getId() {
        return $this->id;
    }

    // Setter for id
    public function setId($id) {
        $this->id = $id;
    }

    // Getter for course_id
    public function getCourseId() {
        return $this->course_id;
    }

    // Setter for course_id
    public function setCourseId($course_id) {
        $this->course_id = $course_id;
    }

    // Getter for title
    public function getTitle() {
        return $this->title;
    }

    // Setter for title
    public function setTitle($title) {
        $this->title = $title;
    }

    // Getter for description
    public function getDescription() {
        return $this->description;
    }

    // Setter for description
    public function setDescription($description) {
        $this->description = $description;
    }

    // Getter for created_at
    public function getCreatedAt() {
        return $this->created_at;
    }

    // Setter for created_at
    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    // Getter for updated_at
    public function getUpdatedAt() {
        return $this->updated_at;
    }

    // Setter for updated_at
    public function setUpdatedAt($updated_at) {
        $this->updated_at = $updated_at;
    }

}