<HTML>
<HEAD>
<TITLE>Actualizar2.php</TITLE>
</HEAD>
<BODY>

<?php
   $link=mysqli_connect("localhost","root","");
   mysqli_select_db($link,"videoteca");

//Creamos la sentencia SQL y la ejecutamos
$ti=$_REQUEST['titulo'];
$di=$_REQUEST['director'];
$ac=$_REQUEST['actor'];
$id=$_REQUEST['id'];
echo "$ti<br>";
echo "$di<br>";
echo "$ac<br>";
echo "$id<br>";

mysqli_query($link,"Update pelicula Set titulo='$ti',director='$di',actor='$ac' Where id_pelicula='$id'");
mysqli_close($link);
header("Location: borrarnew.php");
?>

</BODY>
</HTML> 