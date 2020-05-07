<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Videoteca</title>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
</head>
<body>

<div id="wrap">

<div id="header">
<h1><a href="#">Videoteca</a></h1>
<h2>FCC - BUAP </h2>
</div>

<div id="top"> </div>
<div id="menu">
<ul>
<li><a href="index.php">Incio</a></li>   
<li><a href="Consultapelicula.php">Consulta películas</a></li>
<li><a href="Registrarse.php">Registrarse</a></li>
<li><a href="Acceso.php">Login</a></li>
<li><a href="Contacto.php">Contacto</a></li>
</ul>
</div>

<div id="content">
<div class="left"> 

<h2><a href="#">Consulta de películas </a></h2>
<div class="articles">
  <p>
  <?PHP
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"videoteca");
$resultado= mysqli_query($link,"select * from pelicula");

echo "<Table border=1>";
echo "<TR><td> ID </td><td> Titulo </td><td> Director </td><td> Actor </td></TR>";
while($row=mysqli_fetch_array($resultado))
{
  $id=$row['id_pelicula'];
  $ti=$row['titulo'];
  $di=$row['director'];
  $ac=$row['actor'];
  echo "<TR><td> $id </td><td> $ti </td><td> $di </td><td> $ac </TR>";
}
mysqli_close($link);
echo "</table>";
?>
  
    </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
</div>

<div class="right"> 

<h2>Top de peliculas: </h2>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>
<div style="clear: both;"> </div>
</div>

<div id="bottom"> </div>
<div id="footer">
CSS ejemplo de <a href="http://www.free-css-templates.com/">Free CSS Templates</a></div>
</div>

</body>
</html>