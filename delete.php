<?php
$db = mysqli_connect('localhost', 'id13394599_administrator', '->f9qDQwGDM7Fqq=') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'id13394599_usuarios') or die(mysqli_error($db));

if (!isset($_GET['do']) || $_GET['do'] != 1) {
    switch ($_GET['type']) {
    case 'movie':
        echo 'Seguro que quiere borrar este usuario?<br/>';
        break;
    case 'people':
        echo 'Seguro que quiere borrar la emocion de este usuario?<br/>';
        break;
    } 
    echo '<a href="' . $_SERVER['REQUEST_URI'] . '&do=1">SI</a> '; 
    echo 'o <a href="admin.php">NO</a>';
} else {
    switch ($_GET['type']) {
    case 'movie':

        $query = 'DELETE FROM usuarios  WHERE id_alumno= ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
<p style="text-align: center;">La emocion ha sido eliminada.
<a href="admin.php">Vuelve a la pagina principal administrativa</a></p>
<?php
        break;
    case 'people':
         $query = 'DELETE FROM emociones  WHERE id_emocion = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
<p style="text-align: center;">El usuario ha sido eliminado.
<a href="admin.php">Vuelve a la pagina principal administrativa</a></p>
<?php
        break;
    }
}
?>
