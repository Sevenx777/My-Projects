<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el ID del recurso a eliminar
    $id_recusro = $_POST['id_recurso'];

    // Consulta SQL para eliminar el recurso de la base de datos
    $sql = "DELETE FROM tabla_recursos WHERE id_recurso = :id_recurso";

    // Crear instancia de la clase conexion y ejecutar la consulta
    $ObjConn5 = new conexion('crud9');
    $result = $ObjConn5->consultar($sql, array(':id_recurso' => $id_recusro));
    $ObjConn5->cerrar();

    // Redirigir al usuario de vuelta al CRUD después de eliminar el recurso
    header("location:index.php");
} else {
    // Si la solicitud no es POST, redirigir al usuario de vuelta al CRUD
    header("location:index.php");
}
?>