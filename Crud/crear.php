<?php
date_default_timezone_set('America/Bogota');
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_recurso = $_POST['id_recurso'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $nivel_educativo = $_POST['nivel_educativo'];
    $asignatura = $_POST['asignatura'];
    $formato = $_POST['formato'];
    $url = $_POST['url'];
    $fecha_creacion = date('Y-m-d H:i:s');


    $sql = "INSERT INTO `tabla_recursos`(`id_recurso`, `titulo`, `descripcion`, `nivel_educativo`, `asignatura`, `formato`, `url`, `fecha_creacion`) 
    VALUES (NULL,'$titulo','$descripcion','$nivel_educativo','$asignatura','$formato','$url','$fecha_creacion')";
    

    $ObjConn = new conexion('crud9');

    $ultimoIdInsertado = $ObjConn->ejecutar($sql);

    $ObjConn->cerrar();

    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Crear Nuevos Recursos</title>
<link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Crear Nuevos Recursos</h1>
    <form action="crear.php" method="post">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea>
        
        <label for="nivel_educativo">Nivel Educativo:</label>
        <select id="nivel_educativo" name="nivel_educativo" required>
            <option value="">Seleccionar</option>
            <option value="Primaria">Primaria</option>
            <option value="Secundaria">Secundaria</option>
            <option value="Universidad">Universidad</option>
        </select>
        
        <label for="asignatura">Asignatura:</label>
        <input type="text" id="asignatura" name="asignatura" required>
        
        <label for="formato">Formato:</label>
        <select id="formato" name="formato" required>
            <option value="">Seleccionar</option>
            <option value="Materiales de Estudio">Materiales de Estudio</option>
            <option value="Ejercicios">Ejercicios</option>
            <option value="Videos">Videos</option>
        </select>
        
        <label for="url">URL:</label>
        <input type="text" id="url" name="url">

        <input type="submit" value="Crear">
    </form>
</body>
</html>
