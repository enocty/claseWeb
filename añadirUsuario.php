<?php session_start();
$usu=$_REQUEST['USU'];
$pas=$_REQUEST['PASWD'];
$pas2=$_REQUEST['PASWD2'];
$des=NULL;
$em=$_REQUEST['EM'];
$fec=date("d.m.y");
$tip=rand(1,2);
$id=rand(1,500);
$link=mysqli_connect("localhost","root","");
$ban=mysqli_select_db($link,"videoteca");
//echo " Usuario = $usu <br>";
//echo " Password = $pas <br>";
 if($usu==NULL|$pas==NULL|$pas2==NULL|$em==NULL) 
    {
        echo "un campo est&aacute; vacio.";
        formRegistro();
    }else{
        // ¿Coinciden las contrase&ntilde;as?
        if($pas!=$pas2) {
            echo "Las contraseñas no coinciden";
            formRegistro();
        }else{
            $checkuser = mysqli_query($link,"SELECT * FROM videoteca WHERE usuarios = '$usu'");
            
            $checkemail = mysqli_query($link,"SELECT * FROM videoteca WHERE email = '$em'");
            $email_exist = mysqli_num_rows($checkemail);
            $username_exist = mysqli_num_rows($checkuser);
    
            if ($email_exist>0|$username_exist>0) {
                echo "El nombre de usuario o la cuenta de correo estan ya en uso";
                formRegistro();
            }else{
               mysqli_query($link, "insert into usuarios (id,usuario, password,descripcion,email,tipo,fecha) values ('$id', '$usu','$pas','$des','$em','$tip','$fec')") or die(mysqli_error());
                echo 'El usuario '.$usu.' ha sido registrado de manera satisfactoria.<br />';
                echo 'Ahora puede entrar ingresando su usuario y su password <br />';

                
            }
        }
    }
//$link=mysqli_connect("localhost","root","");
//$ban=mysqli_select_db($link,"videoteca");
//$bandera=mysqli_query($link, "insert into usuarios (id,usuario, password,descripcion,email,tipo,fecha) values ('$id', '$usu','$pas','$des','$em','$tip','$fec')");
mysqli_close($link);
//header("Location: index.php"); 
?>