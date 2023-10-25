<?php
    class Config{
        public $HOSTNAME = "127.0.0.1";
        public $USERNAME = "root";
        public $PASSWORD = "";
        public $DB_NAME="student";
        public $con_res;

        public function connect(){
            $this->con_res=mysqli_connect($this->HOSTNAME,$this->USERNAME,$this->PASSWORD,$this->DB_NAME);
            return $this->con_res;
        }

        public function insert($NAME,$COURSE,$DATE_OF_BIRTH){
            $this->connect();
            $query="INSERT INTO studt (NAME,COURSE,DATE_OF_BIRTH) VALUES ('$NAME','$COURSE','$DATE_OF_BIRTH');";

            $res = mysqli_query($this->con_res,$query);//return boolean
            return $res;
        }

        public function fetch(){
            $this->connect();
            $query="SELECT * FROM studt;";

            $res = mysqli_query($this->con_res,$query);//return object
            return $res; 
        }

        public function delete($ID){
            $this->connect();
            $query = "DELETE FROM studt WHERE ID = $ID;";

            $res = mysqli_query($this->con_res,$query);//return boolean
            return $res;
        }

        public function fetch_single_record($ID){
            $this->connect();
            $query = "SELECT * FROM studt WHERE ID = $ID;";

            $res = mysqli_query($this->con_res,$query);//return object
            return $res;
        }

        public function update($NAME,$COURSE,$DATE_OF_BIRTH,$ID){
            $this->connect();
            $query = "UPDATE studt SET NAME = '$NAME',COURSE = '$COURSE',DATE_OF_BIRTH ='$DATE_OF_BIRTH' WHERE ID = $ID;";

            $res = mysqli_query($this->con_res,$query);//return boolean
            return $res;
        }
    }
?>