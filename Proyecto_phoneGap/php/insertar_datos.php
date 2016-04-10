<?php

$conexion=mysqli_connect("mysql.gbfreehosting.com","u416931568_admin","tec2.123","u416931568_acc");

/* Extrae los valores enviados desde la aplicacion movil */
$nombreEnviado=isset($_GET['nombre']) ? $_GET['nombre'] : null ;
$emailEnviado=isset($_GET['email']) ? $_GET['email'] : null ;
$usuarioEnviado = isset($_GET['usuario']) ? $_GET['usuario'] : null ;
$passwordEnviado = isset($_GET['password']) ? $_GET['password'] : null ;

if(empty($nombreEnviado)){
	$nombreEnviado="default";
}if(empty($emailEnviado)){
	$emailEnviado="default@default.com";
}if(empty($usuarioEnviado)){
	$usuarioEnviado="default";
}if(empty($passwordEnviado)){
	$passwordEnviado="default";
}

/*Buscar que el correo o el usuario ya se encuentren en la base de datos*/

$query = "SELECT cuentas.id
FROM u416931568_acc.cuentas
WHERE email like '".mysqli_real_escape_string($conexion,$emailEnviado)."' 
or username='".mysqli_real_escape_string($conexion,$usuarioEnviado)."'";

$result=mysqli_query($conexion, $query); 
if(mysqli_num_rows($result)>0){
	$sign=0;	
}else{		
	/* Agregar el usuario con la contraseña en la bd */
	$query = "INSERT into u416931568_acc.cuentas(name,email,username,password) 
	Values(upper('".mysqli_real_escape_string($conexion,$nombreEnviado)."'),'".mysqli_real_escape_string($conexion,$emailEnviado)."',
		'".mysqli_real_escape_string($conexion,$usuarioEnviado)."',password('".mysqli_real_escape_string($conexion,$passwordEnviado)."'))";
	$result=mysqli_query($conexion, $query);	 
	if(mysqli_affected_rows($conexion)>0){
		$sign=1;		
	}else{
		$sign=0;		
	}	
}

/* crea un array con datos arbitrarios que seran enviados de vuelta a la aplicacion */
$resultados = array();
$resultados["hora"] = date("F j, Y, g:i a");
$resultados["generador"] = "Enviado desde phonegapitechii.hoxty.com" ;

/* verifica que el usuario y password concuerden correctamente */
if($sign==1){
/*esta informacion se envia solo si la validacion es correcta */
$resultados["mensaje"] = "Usuario Agregado";
$resultados["validacion"] = "ok";

}else{
/*esta informacion se envia si la validacion falla */
$resultados["mensaje"] = "Usuario no agregado email o usuario existentes";
$resultados["validacion"] = "error";
}

/*convierte los resultados a formato json*/
$resultadosJson = json_encode($resultados);

/*muestra el resultado en un formato que no da problemas de seguridad en browsers */
echo $_GET['jsoncallback'] . '(' . $resultadosJson . ');';

mysqli_close($conexion);
?>