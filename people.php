<?php
$db = mysqli_connect('localhost', 'adri', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'emociones') or die(mysqli_error($db));
if ($_GET['action'] == 'edit') {
    //retrieve the record's information 
    $query = 'SELECT
            id_alumno, codigoEmocional, comentario, fecha, hora
        FROM
            emocion
        WHERE
            id_emocion = ' . $_GET['id'];
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));
} else {
    //set values to blank
    $id_alumno = 0;
    $codigoEmocional = 0;
    $comentario = "";
    $fecha = date('Y-m-d');
    $hora = time('H:i:s');
    ;
}
?>
<html>
 <head>
  <title><?php echo ucfirst($_GET['action']); ?> Musica</title>
 </head>
 <body>
  <?php
  if (isset($_GET['error']) && $_GET['error'] != '') {
  echo '<div id="error" style="background-color:black;color:white;text-align:center;padding:5px;">' . $_GET['error'] . '</div>';
  }
  ?>
  <form action="commit.php?action=<?php echo $_GET['action']; ?>&type=people"
   method="post">
   <table>
    <tr>
     <td>ID alumno</td>
     <td><input type="number" name="id_alumno"
      value="<?php echo $id_alumno; ?>"/></td>
    </tr><tr>
     <td>Codigo emocional del alumno</td>
     <td><input type="number" name="codigoEmocional"
      value="<?php echo $codigoEmocional; ?>"/></td>
    </tr>
    <tr>
     <td>Comentario</td>
     <td><input type="text" name="comentario" value="<?php echo $comentario; ?>"/></td>
    </tr>
    <tr>
     <td>Fecha</td>
     <td><input type="date" name="fecha"
      value="<?php echo $fecha; ?>"/></td>
    </tr>
      <tr>
     <td>Hora</td>
     <td><input type="text" name="hora"
      value="<?php echo $hora; ?>"/></td>
    </tr>

<?php
if ($_GET['action'] == 'edit') {

    echo '<input type="hidden" value="' . $_GET['id'] . '" name="id_emocion" />';
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
