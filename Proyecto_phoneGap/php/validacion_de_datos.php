<?php

$conexion=mysqli_connect("host","user","pass","data_base");

/* Extrae los valores enviados desde la aplicacion movil */
$usuarioEnviado = isset($_GET['usuario']) ? $_GET['usuario'] : null ;
$passwordEnviado = isset($_GET['password']) ? $_GET['password'] : null ;

/* revisar existencia del usuario con la contraseña en la bd */
$query = "SELECT cuentas.username
FROM u416931568_acc.cuentas
WHERE username
LIKE '".mysqli_real_escape_string($conexion,$usuarioEnviado)."'
AND password=PASSWORD('".mysqli_real_escape_string($conexion,$passwordEnviado)."')
LIMIT 1";

$result=mysqli_query($conexion, $query); 
if(mysqli_num_rows($result)>0)
{
$login=1;
}
else
{
$login=0;
}

/* crea un array con datos arbitrarios que seran enviados de vuelta a la aplicacion */
$resultados = array();
$resultados["hora"] = date("F j, Y, g:i a");
$resultados["generador"] = "Enviado desde phonegapitechii.hoxty.com" ;

/* verifica que el usuario y password concuerden correctamente */
if( $login==1 ){
/*esta informacion se envia solo si la validacion es correcta */
$resultados["mensaje"] = "Validacion Correcta";
$resultados["validacion"] = "ok";

}else{
/*esta informacion se envia si la validacion falla */
$resultados["mensaje"] = "Usuario y password incorrectos";
$resultados["validacion"] = "error";
}

/*convierte los resultados a formato json*/
$resultadosJson = json_encode($resultados);

/*muestra el resultado en un formato que no da problemas de seguridad en browsers */
echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');';

mysqli_close($conexion);
?>