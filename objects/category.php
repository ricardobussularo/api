<?php
    class Category{

        // configurações tabela catagorias
        private $conn;
        private $table_name = "categories";

        // pripriedades do objeto
        public $id;
        public $name;
        public $description;
        public $created;

        public function __construct($db){
            $this->conn = $db;
        }

        // função lista todos
        public function readAll(){
            //select todos os dados
            $query = "SELECT
                    id, name, description
                FROM
                    " . $this->table_name . "
                ORDER BY
                    name";

            $stmt = $this->conn->prepare( $query );
            $stmt->execute();

            return $stmt;
        }

        // função lista um
        public function read(){

            //select todos os dados
            $query = "SELECT
                id, name, description
            FROM
                " . $this->table_name . "
            ORDER BY
                name";

            $stmt = $this->conn->prepare( $query );
            $stmt->execute();

            return $stmt;
        }


        function readOne(){

            $query = "SELECT
                id, name, description
            FROM
                " . $this->table_name . " c
            WHERE
                c.id = ?
            LIMIT
                0,1";

            $stmt = $this->conn->prepare( $query );

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->description = $row['description'];
        }
    }
?>