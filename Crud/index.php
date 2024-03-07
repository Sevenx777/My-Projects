<?php
include("conexion.php");

$ObjConn2 = new conexion('crud9');
$imagen2 = $ObjConn2->consultar("SELECT * FROM tabla_recursos");
$ObjConn2->cerrar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduLern</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Edu-lern</h1>
 
    <h2 id="titulo">Recursos</h2>
    <table id="tabla-recursos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Nivel Educativo</th>
                <th>Asignatura</th>
                <th>Formato</th>
                <th>URL</th>
                <th>Fecha de Creación</th>
                <th>Fecha de Actualización</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($imagen2 as $result) { ?>
                <tr>
                    <td><?php echo $result['id_recurso']; ?></td>
                    <td><?php echo $result['titulo']; ?></td>
                    <td><?php echo $result['descripcion']; ?></td>
                    <td><?php echo $result['nivel_educativo']; ?></td>
                    <td><?php echo $result['asignatura']; ?></td>
                    <td><?php echo $result['formato']; ?></td>
                    <td><?php echo $result['url']; ?></td>
                    <td><?php echo $result['fecha_creacion']; ?></td>
                    <td><?php echo $result['fecha_actualizacion']; ?></td>
                    <td>
                    <button class="btn-editar"><a href='editar.php?id=<?php echo $result['id_recurso']; ?>'>Editar</a></button>
                        <form action="eliminar.php" method="post">
                            <input type="hidden" name="id_recurso" value="<?php echo $result['id_recurso']; ?>">
                            <input type="submit" class="btn-eliminar" value="Eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar este recurso?');">
                        </form>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <button class="btn-crear"><a href="crear.php">Crear recursos</a></button>
</body>
</html>
