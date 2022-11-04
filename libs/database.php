<?php

    class Database {
        public $host = DB_HOST;
        public $user = DB_USER;
        public $password = DB_PASSWORD;
        public $db_name = DB_NAME;

        public $link;
        public $error;

        public function __construct(){
            $this->connect();
        }

        private function connect(){
            $this->link = new mysqli($this->host,$this->user,$this->password,$this->db_name);

        }

        public function select($query){
            $data = $this->link->query($query);
            
            if($data->num_rows > 0){
                return $data;
            }else{
                return "no data found";
            }
        }

        public function post($query){
            $post = $this->link->query($query);

            if($post->num_rows > 0){
                return $post;
            }else{
                return "no data found";
            }

        }
    }

?>