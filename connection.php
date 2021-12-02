<?php
// metodo para establecer una conexion
      class connection{
          private $conn;

          public function __construct(){
              $this -> conn = new mysqli("localhost" , "root", " ", "tbreviews");
          }

          public function get_connection(){
              return $this->conn;
          }


      }
?>