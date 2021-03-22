<?php
    namespace App\Domain\Entity;

    class Article {
        private $id;
        private $title;
        private $body;

        public function __construct($id, $title, $body){
            $this->setId($id);
            $this->setTitle($title);
            $this->setBody($body);
        }

        public function getId(){
            return $this->id;
        }

        public function getTitle(){
            return $this->title;
        }

        public function getBody(){
            return $this->body;
        }

        public function setId(){
            return $this->id;
        }

        public function setTitle(){
            return $this->title;
        }

        public function setBody(){
            return $this->body;
        }
    }