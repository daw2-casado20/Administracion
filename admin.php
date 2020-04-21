<?php
$db = mysqli_connect('localhost', 'adri', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'emociones') or die(mysqli_error($db));
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
   <th colspan="2">Usuarios registrados<a href="music.php?action=add">[ADD]</a></th>
  </tr>
<?php
$query = 'SELECT * FROM users';
$result = mysqli_query($db, $query) or die (mysqli_error($db));
$odd = true;
while ($row = mysqli_fetch_assoc($result)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    echo '<td style="width:75%;">'; 
    echo $row['nombre'];
    echo '</td><td>';
    echo ' <a href="music.php?action=edit&id=' . $row['id_alumno'] . '"> [EDIT]</a>'; 
    echo ' <a href="delete.php?type=movie&id=' . $row['id_alumno'] . '"> [DELETE]</a>';
    echo '</td></tr>';
}
?>
  <tr>
    <th colspan="2">Emociones registradas<a href="people.php?action=add"> [ADD]</a></th>
  </tr>
<?php
$query = 'SELECT * FROM emocion';
$result = mysqli_query($db, $query) or die (mysqli_error($db));
$odd = true;
while ($row = mysqli_fetch_assoc($result)) {
    echo ($odd == true) ? '<tr class="odd_row">' : '<tr class="even_row">';
    $odd = !$odd; 
    echo '<td style="width: 25%;">'; 
    echo $row['comentario'];
    echo '</td><td>';
    echo ' <a href="people.php?action=edit&id=' . $row['id_emocion'] .
        '"> [EDIT]</a>'; 
    echo ' <a href="delete.php?type=people&id=' . $row['id_emocion'] .
        '"> [DELETE]</a>';
    echo '</td></tr>';
}
?>
  </table>
 </body>
</html>
