<?php
    class User_Config{
        public $HOSTNAME = "127.0.0.1";
        public $USERNAME = "root";
        public $PASSWORD = "";
        public $DB_NAME="auth";
        public $con_res;

        public function connect(){
            $this->con_res=mysqli_connect($this->HOSTNAME,$this->USERNAME,$this->PASSWORD,$this->DB_NAME);
            return $this->con_res;
        }

        public function insert_user($name,$email,$password){
            $this->connect();
            $_hash_password = password_hash($password,PASSWORD_DEFAULT);

            $query="INSERT INTO users (name,email,password) VALUES ('$name','$email','$_hash_password');";

            $res = mysqli_query($this->con_res,$query);//return boolean
            return $res;
        }

        public function sign_in($email,$password){
            $this->connect();

            $query = "SELECT * FROM users WHERE email='$email';";
            $obj = mysqli_query($this->con_res,$query);//return obj
            $record = mysqli_fetch_assoc($obj);

            $_hash_pass = $record['password'];
            $res = password_verify($password,$_hash_pass);//return boolean

            if($res){
                return true;
            }else{
                return false;
            }
        }

        public function insert_image($name,$path){
            $this->connect();
            $query = "INSERT INTO images(name,path) VALUES ('$name','$path');";

            $res = mysqli_query($this->con_res,$query);
            return $res;
        }

        public function fetch_single_data($id){
            $this->connect();

            $query = "SELECT * FROM images WHERE id=$id;";
            $res = mysqli_query($this->con_res,$query);//return object of data
            $record = mysqli_fetch_assoc($res);
            return $record;
        }

        public function delete_image($id){
            $this->connect();
            $media = $this->fetch_single_data($id);
            $isUnlink = unlink("../uploads/".$media['name']);

            if($isUnlink){
                $query = "DELETE FROM images WHERE id=$id;";
                $res = mysqli_query($this->con_res,$query);
                return $res;
            }
            else{
                return false;
            }
        }
    }
?>