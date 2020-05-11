<?php session_start();
$usuario=$_REQUEST['USU'];
$pas=$_REQUEST['PASWD'];
$pasword2=$_REQUEST['PASWD2'];
$email=$_REQUEST['EM'];
$des=NULL;
$fecha=date("d.m.y");
$tipoUsuario=rand(1,2);
$consultaUsuario="select * from usuarios where usuarios.usuario='$usuario'";
$consultaEmail="select * from usuarios where usuarios.email='$email'";
$id=rand(1,500);
$link=mysqli_connect("localhost","root", "");
$ban=mysqli_select_db($link,"videoteca");
//echo "$ban";

if($usuario==NULL|$pas==NULL|$pasword2==NULL|$email==NULL) 
{
	// echo "un campo est&aacute; vacio.";
	header("Location: vare.php");
	//formRegistro();
}else{
	// ¿Coinciden las contrase&ntilde;as?
	if($pas!=$pasword2) {
		// echo "Las contraseñas no coinciden";
		header("Location: conin.php");
		//formRegistro();
	}else{
		

		if ($resultadoUsuarios = mysqli_query($link, $consultaUsuario)) {
			$numeroUsuarios=mysqli_num_rows($resultadoUsuarios);
			echo "Returned rows are: " . mysqli_num_rows($resultadoUsuarios);		
			mysqli_free_result($resultadoUsuarios);
		}
		if($resultadoCorreos= mysqli_query($link, $consultaEmail)){
			$numeroCorreos=mysqli_num_rows($resultadoCorreos);
			echo "Returned rows are: " . mysqli_num_rows($resultadoCorreos);
			mysqli_free_result($resultadoCorreos);
		}





	       if ($numeroUsuarios>0 || $numeroCorreos) {
                header("Location: errlog.php");
                //formRegistro();
            }else{
               mysqli_query($link, "insert into usuarios (id,usuario, password,descripcion,email,tipo,fecha) values ('$id', '$usuario','$pas','$des','$email','$tipoUsuario','NULL')") or die(mysqli_error($link));
                echo 'El usuario '.$usuario.' ha sido registrado de manera satisfactoria.<br />';
                echo 'Ahora puede entrar ingresando su usuario y su password <br />';
                header("Location: corlog.php");

            }
	}
}
//$link=mysqli_connect("localhost","root","");
//$ban=mysqli_select_db($link,"videoteca");
//$bandera=mysqli_query($link, "insert into usuarios (id,usuario, password,descripcion,email,tipo,$fecha) values ('$id', '$usuario','$pas','$des','$email','$tipoUsuario','$fecha')");
mysqli_close($link);
//header("Location: index.php"); 
?>