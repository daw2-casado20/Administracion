<?php
$db = mysqli_connect('localhost', 'id13394599_administrator', '->f9qDQwGDM7Fqq=') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'id13394599_usuarios') or die(mysqli_error($db));
if ($_GET['action'] == 'edit') {
    //retrieve the record's information 
    $query = 'SELECT
            administrador, tutor, nombre, apellidos, curso, grupo
        FROM
            usuarios
        WHERE
            id_alumno = ' . $_GET['id'];
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));
} else {
    //set values to blank
    $administrador = false;
    $tutor = false;
    $nombre = "";
    $apellidos = "";
    $curso = 0;
    $grupo = "";
}
?>
<html>
 <head>
  <title><?php echo ucfirst($_GET['action']); ?> Users</title>
 </head>
 <body>
    <?php
    if (isset($_GET['error']) && $_GET['error'] != '') {
    echo '<div id="error">' . $_GET['error'] . '</div>';
    }
    ?>
  <form action="commit.php?action=<?php echo $_GET['action']; ?>&type=movie"
   method="post">
   <table>
    <tr>
    <tr>
     <td>Administrador</td>
     <td><input type="text" name="administrador"
      value="<?php echo $administrador; ?>"/></td>
    </tr><tr>
     <td>Tutor</td>
     <td><input type="text" name="tutor"
      value="<?php echo $tutor; ?>"/></td>
    </tr>
    <tr>
     <td>Nombre</td>
     <td><input type="text" name="nombre" value="<?php echo $nombre; ?>"/></td>
    </tr>
    <tr>
     <td>Apellidos</td>
     <td><input type="text" name="apellidos"
      value="<?php echo $apellidos; ?>"/></td>
    </tr>
      <tr>
     <td>Curso</td>
     <td><input type="number" name="curso"
      value="<?php echo $curso; ?>"/></td>
    </tr>
    <tr>
     <td>Grupo</td>
     <td><input type="text" name="grupo"
      value="<?php echo $grupo; ?>"/></td>
    </tr>
</tr>

    <tr>
     <td colspan="2" style="text-align: center;">
<?php
if ($_GET['action'] == 'edit') {
    echo '<input type="hidden" value="' . $_GET['id'] . '" name="id_alumno" />';
}
?>
      <input type="submit" name="submit"
       value="<?php echo ucfirst($_GET['action']); ?>" />
     </td>
    </tr>
   </table>
  </form>
 </body>
</html>
