<?php

    require "crud.php";

    class Post extends Crud{
        public $id;
        public $title;
        public $picture;
        public $shares;
        public $comments;
        public $likes;
        public $liked;
        public $description;
        public $date_create;

        function __construct($newHost, $newUser, $newPassword, $newDatabase, $id = null){
            parent::__construct($newHost, $newUser, $newPassword, $newDatabase);
            $this->table="posts";
            if($id != null){
                $data = $this->read(array("*"), $this->table, array("id"=>$id));
                $this->id = $data[0]["id"];
                $this->title = $data[0]["title"];
                $this->picture = $data[0]["picture"];
                $this->shares = $data[0]["shares"];
                $this->comments = $data[0]["comments"];
                $this->likes = $data[0]["likes"];
                $this->liked = $data[0]["liked"];
                $this->description = $data[0]["description"];
                $this->date_create = $data[0]["date_create"];
            }

        }
        function updateShares(){
            $this->update(array("shares"=>$this->shares+1), $this->table, array("id"=>$this->id));
        }
        function updateComments(){
            $this->update(array("comments"=>$this->comments+1), $this->table, array("id"=>$this->id));
        }
        function updateLikes(){
            $this->update(array("likes"=>$this->likes+1), $this->table, array("id"=>$this->id));
        }
        function updateLiked(){
            if ($this->liked ==1) {
                $this->update(array("liked"=>0), $this->table, array("id"=>$this->id));
            }
            else {
                $this->update(array("liked"=>1), $this->table, array("id"=>$this->id));
            }
        }
    }
 ?>
