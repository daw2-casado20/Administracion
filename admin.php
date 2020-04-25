<?php
$db = mysqli_connect('localhost', 'id13394599_administrator', '->f9qDQwGDM7Fqq=') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'id13394599_usuarios') or die(mysqli_error($db));
?>
<html>
 <head>
  <title>Administración de Web Proyecto Emociones</title>
  <style type="text/css">
   th { background-color: #999;}
   .odd_row { background-color: #EEE; }
   .even_row { background-color: #FFF; }
  </style>
 </head>
 <body>
 <table style="width:100%;">
  <tr>
   <th colspan="2">Usuarios registrados<a href="music.php?action=add">[AGREGAR USER]</a></th>
  </tr>
<?php
$query = 'SELECT * FROM usuarios';
$result = mysqli_query($db, $query) or die (mysqli_error($db));
$odd = true;
while ($row = mysqli_fetch_assoc($result)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    echo '<td style="width:75%;">'; 
    echo $row['nombre'];
    echo '</td><td>';
    echo ' <a href="music.php?action=edit&id=' . $row['id_alumno'] . '"> [EDITAR USUARIO]</a>'; 
    echo ' <a href="delete.php?type=movie&id=' . $row['id_alumno'] . '"> [BORAR USUARIO]</a>';
    echo '</td></tr>';
}
?>
  <tr>
    <th colspan="2">Emociones registradas<a href="people.php?action=add"> [AGREGAR EMOCIÓN]</a></th>
  </tr>
<?php
$query = 'SELECT * FROM emociones';
$result = mysqli_query($db, $query) or die (mysqli_error($db));
$odd = true;
while ($row = mysqli_fetch_assoc($result)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    echo '<td style="width: 25%;">'; 
    echo $row['comentario'];
    echo '</td><td>';
    echo ' <a href="people.php?action=edit&id=' . $row['id_emocion'] .
        '"> [EDITAR EMOCIÓN]</a>'; 
    echo ' <a href="delete.php?type=people&id=' . $row['id_emocion'] .
        '"> [BORRAR EMOCIÓN]</a>';
    echo '</td></tr>';
}
?>
  </table>
 </body>
</html>
