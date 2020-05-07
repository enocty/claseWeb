<?php session_start();
$usu=$_REQUEST['USU'];
$pas=$_REQUEST['PASWD'];
//echo " Usuario = $usu <br>";
//echo " Password = $pas <br>";

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"videoteca");
$resultado= mysqli_query($link,"select password,usuario,tipo from usuarios where usuario='$usu'");
if($row=mysqli_fetch_array($resultado))
{
  if($row['password']==$pas)
    {
         $_SESSION["cliente"]=$usu; 
         $_SESSION["tipoUsuario"]=$row['tipo']; 
         if( $row['tipo']==1) header("Location:indexCliente.php"); 
         if( $row['tipo']==0) header("Location:indexADM.php");  
       echo "Login y password correctos <br>";
     }
  else 
     header("Location:ErrorPassword.php"); 
}
else
         header("Location:ErrorLogin.php"); 
?>