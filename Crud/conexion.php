<?php
class conexion{
    private $servidor="localhost";
    private $usuario="root";
    private $contrasenia="0000";
    private $conexion;
    public $dbname;


        public function __construct($dbname){
            try{
                $this->conexion = new PDO("mysql:dbname=$dbname;host=$this->servidor", $this->usuario, $this->contrasenia);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            
            }catch(PDOException $E){
                echo "Conexion Fallida ".$E->getMessage();
            }

        }
        public function ejecutar($sql) {
            try {
                return $this->conexion->exec($sql);
            } catch (PDOException $e) {
                echo "Error al ejecutar la consulta: " . $e->getMessage();
            }
        }
        //funcion para leer registros (recibe un parámetro con la consulta SQL).
        public function consultar($sql, $params = array()){
            $result = $this->conexion->prepare($sql);
            $result->execute($params);
            return $result->fetchAll();
        }
        public function cerrar(){
            $this->conexion=null;
        }

}


?>