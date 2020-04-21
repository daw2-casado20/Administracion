<?php
$db = mysqli_connect('localhost', 'adri', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'emociones') or die(mysqli_error($db));
?>
<html>
 <head>
  <title>Commit</title>
 </head>
 <body>
<?php
switch ($_GET['action']) {
case 'add':
    switch ($_GET['type']) {
    case 'movie':
        $query = 'INSERT INTO
            users
                (administrador, tutor, nombre, apellidos, curso, grupo)
            VALUES
                ("' . $_POST['administrador'] . '",
                 "' . $_POST['tutor'] . '",
                 "' . $_POST['nombre'] . '",
                 "' . $_POST['apellidos'] . '",
                 ' . $_POST['curso'] . ',
                 "' . $_POST['grupo'] . '")';
        break;
    case 'people':
        $query = 'INSERT INTO
            emocion
                (id_alumno, codigoEmocional, comentario, fecha, hora)
            VALUES
                (' . $_POST['id_alumno'] . ',
                 ' . $_POST['codigoEmocional'] . ',
                 "' . $_POST['comentario'] . '",
                 "' . $_POST['fecha'] . '",
                 "' . $_POST['hora'] . '")';
        break;
    }
    break;
case 'edit':
    switch ($_GET['type']) {
    case 'movie':
        $query = 'UPDATE users SET
                administrador = ' . $_POST['administrador'] . ',
                tutor = ' . $_POST['tutor'] . ',
                nombre = "' . $_POST['nombre'] . '",
                apellidos = "' . $_POST['apellidos'] . '",
                curso = ' . $_POST['curso'] . ',
                grupo = "' . $_POST['grupo'] . '"
            WHERE
                id_alumno = ' . $_POST['id_alumno'];
        break;
    case 'people':
    $query = 'UPDATE emocion SET
            id_alumno = ' . $_POST['id_alumno'] . ',
            codigoEmocional = ' . $_POST['codigoEmocional'] . ',
            comentario = "' . $_POST['comentario'] . '",
            fecha = "' . $_POST['fecha'] . '",
            hora = "' . $_POST['hora'] . '"
        WHERE
            id_emocion = ' . $_POST['id_emocion'];
        break;  
    }
    

    break;
}
if (isset($query)) {
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
}
?>
  <p>Done!</p>
 </body>
</html>
