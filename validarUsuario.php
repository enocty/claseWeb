<?php session_start();
$usu=$_REQUEST['USU'];
$pas=$_REQUEST['PASWD'];
//echo " Usuario = $usu <br>";
//echo " Password = $pas <br>";
$recaptcha_secret = '6Lep0vYUAAAAAEnFDBVwiHLp-tjD8i8wiIaH1cyC'; 
$recaptcha_response = $_POST['recaptcha_response']; 
$url = 'https://www.google.com/recaptcha/api/siteverify'; 

$data = array( 'secret' => $recaptcha_secret, 'response' => $recaptcha_response, 'remoteip' => $_SERVER['REMOTE_ADDR'] ); 
$curlConfig = array( CURLOPT_URL => $url, CURLOPT_POST => true, CURLOPT_RETURNTRANSFER => true, CURLOPT_POSTFIELDS => $data ); 
$ch = curl_init(); 
curl_setopt_array($ch, $curlConfig); 
$response = curl_exec($ch); 
curl_close($ch);
$jsonResponse = json_decode($response);
if ($jsonResponse->success == true) { 
    
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
}
    else {
        header("Location:ErrorLogin.php");
    }
?>