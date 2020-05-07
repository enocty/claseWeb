<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Videoteca</title>
<meta http-equiv="Content-Language" content="English" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
<style type="text/css">
<!--
.Estilo1 {font-size: 18px}
-->
</style>
</head>
<body> <?PHP session_start(); 
     if (isset($_SESSION['cliente']) and $_SESSION['tipoUsuario']==1) ;
	 else header("Location:index.php"); 
?>

<div id="wrap">

<div id="header">
<h1><a href="#">Videoteca</a></h1>
<h2>FCC - BUAP </h2>
</div>

<div id="top"> </div>
<div id="menu">
<ul>
<li><a href="indexCliente.php">Incio</a></li>   
<li><a href="ConsultapeliculaCliente.php">Consulta de películas</a></li>
<li><a href="Rentas.php">Renta Peliculas</a></li>
<li><a href="Salir.php">Salir</a></li>
</ul>
</div>

<div id="content">
<div class="left"> 

<h2><a href="#" class="Estilo1">Bienvenido: </a></h2>
<div class="articles">
  <p>&nbsp;</p>
  <ul>
    <li>Ya puedes realizar la renta de peliculas</li>
  </ul>
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