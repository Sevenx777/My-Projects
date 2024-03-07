<?php
date_default_timezone_set('America/Bogota');
include("conexion.php");

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id_recurso = $_GET['id'];

    $ObjConn6 = new conexion('crud9');
    $recurso = $ObjConn6->consultar("SELECT * FROM tabla_recursos WHERE id_recurso = :id", array(':id' => $id_recurso));
    $ObjConn6->cerrar();

    if(!$recurso) {

        echo "El recurso no existe.";
        exit;
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $nivel_educativo = $_POST['nivel_educativo'];
        $asignatura = $_POST['asignatura'];
        $formato = $_POST['formato'];
        $url = $_POST['url'];
        $fecha_actualizacion = date('Y-m-d H:i:s');

        $sql = "UPDATE tabla_recursos SET titulo = '$titulo', descripcion = '$descripcion', nivel_educativo = '$nivel_educativo', 
            asignatura = '$asignatura', formato = '$formato', url = '$url', fecha_actualizacion = '$fecha_actualizacion'  
            WHERE id_recurso = '$id_recurso'";


        $ObjConn6 = new conexion('crud9');
        $ObjConn6->ejecutar($sql);
        $ObjConn6->cerrar();


        header("location:index.php");
        exit();
    }


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Recurso</title>
    <link rel="stylesheet" href="estilo.css">
    
</head>
<body>
    <h1>Editar Recurso</h1>
    <form action="editar.php?id=<?php echo $id_recurso; ?>" method="post">
        <?php foreach($recurso as $result) { ?>
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo $result['titulo']; ?>" required>
            
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required><?php echo $result['descripcion']; ?></textarea>
            
            <label for="nivel_educativo">Nivel Educativo:</label>
            <select id="nivel_educativo" name="nivel_educativo" required>
                <option value="">Seleccionar</option>
                <option value="Primaria" <?php if($result['nivel_educativo'] == 'Primaria') echo 'selected'; ?>>Primaria</option>
                <option value="Secundaria" <?php if($result['nivel_educativo'] == 'Secundaria') echo 'selected'; ?>>Secundaria</option>
                <option value="Universidad" <?php if($result['nivel_educativo'] == 'Universidad') echo 'selected'; ?>>Universidad</option>
            </select>
            
            <label for="asignatura">Asignatura:</label>
            <input type="text" id="asignatura" name="asignatura" value="<?php echo $result['asignatura']; ?>" required>
            
            <label for="formato">Formato:</label>
            <select id="formato" name="formato" required>
                <option value="">Seleccionar</option>
                <option value="Materiales de Estudio" <?php if($result['formato'] == 'Materiales de Estudio') echo 'selected'; ?>>Materiales de Estudio</option>
                <option value="Ejercicios" <?php if($result['formato'] == 'Ejercicios') echo 'selected'; ?>>Ejercicios</option>
                <option value="Videos" <?php if($result['formato'] == 'Videos') echo 'selected'; ?>>Videos</option>
            </select>
            
            <label for="url">URL:</label>
            <input type="text" id="url" name="url" value="<?php echo $result['url']; ?>">

            <input type="submit" value="Guardar Cambios">
        <?php } ?>
    </form>
</body>
</html>
<?php } else {

    echo "ID de recurso no proporcionado.";
}
?>
