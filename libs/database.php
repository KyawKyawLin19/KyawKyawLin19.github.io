<?php
  class database{

    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASSWORD;
    public $db_name = DB_NAME;
  

    public $link;
    public $error;

    public function __construct(){
      $this->connect();
    }

    private function connect(){
      $this->link = new mysqli($this->host,$this->user,$this->pass,$this->db_name);

      if(!$this->link){
        $this->error = "Connection Failed" . $this->link->connect_error;
      }
    }

    //select Query
    public function select($query){
      $result = $this->link->query($query);

      if($result->num_rows > 0){
        return $result;
      }else {
        return false;
      }
    }

    //insert Query
    public function insert($query){
      $insert = $this->link->query($query);

      if($insert){
        header('Location: index.php?msg= Post Inserted...');
      }else {
        echo "Did not insert";
      }
    }

    //update Query
    public function update($query){
      $update = $this->link->query($query);

      if($update){
        header('Location: index.php?msg= Post Updated...');
      }else {
        echo "Did not update";
      }
    }

    //delete Query
    public function delete($query){
      $delete = $this->link->query($query);

      if($delete){
        header('Location: index.php?msg= Post deleted...');
      }else {
        echo "Did not delete";
      }
    }
  }

?>