<?php
class Conexion{
    public $servername = "localhost";  
    public $username = "root";
    public $password = "";
    public $database = "notas";
    

    public function conexionDB(){
        $this->con = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
        if($this->con->connect_error){
            echo "Conexion fallida. " . $this->con->connect_error;
        }
    }
}
?>
