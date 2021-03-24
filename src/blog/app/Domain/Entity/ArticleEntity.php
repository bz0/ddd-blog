<?php
    namespace App\Domain\Entity;

    class ArticleEntity implements ArticleInterface{
        private $id;
        private $title;
        private $body;

        public function __construct($id, $title, $body){
            $this->id = $id;
            $this->title = $title;
            $this->body = $body;
        }

        public function getId() :int{
            return $this->id;
        }

        public function getTitle() :string{
            return $this->title;
        }

        public function getBody() :string{
            return $this->body;
        }
    }