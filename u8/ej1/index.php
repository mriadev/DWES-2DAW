<?php
/*1
Carga en dos variables los valores enviados por la URL
$n1=
$n2=
*/
/*2
Carga en una variable una cadena de caracteres con el fichero XML
que se debe enviar.
http://www.dneonline.com/calculator.asmx?op=Add
Utiliza sintaxis heredoc para facilitar la escritura.
$msgSoap =
*/
/*3
Inicia curl
*/
/*4
Crea un array de configuración para curl:
url del servicio, http://www.dneonline.com/calculator.asmx?WSDL'
RETURNTRANSFER, true.
HTTP_VERSION, 1.1
CUSTOMREQUEST, POST
POSTFIELDS, Variable con fichero xml.
HTTPHEADER, text/xml y juego de caracteres 7tf-8
*/
/*5
Ejecuta y cierra curl.
*/
/*6
Utiliza preg_match para localizar el resultado en la respuesta.
http://www.dneonline.com/calculator.asmx?op=Add
*/
/*7
Muestra el resultado.
*/

$_num1 = 3;
$_num2 = 5;

$mensaje = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <Add xmlns="http://tempuri.org/">
      <intA>'.$_num1.'</intA>
      <intB>'.$_num2.'</intB>
    </Add>
  </soap:Body>
</soap:Envelope>';



$resultado = curl_init();
$array = array(
    CURLOPT_URL => 'http://www.dneonline.com/calculator.asmx?WSDL',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTP_VERSION => 1.1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $mensaje,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: text/xml; charset=utf-8'
    )
);
curl_setopt_array($resultado, $array);
$respuesta = curl_exec($resultado);
curl_close($resultado);
//Utiliza preg_match para localizar el resultado en la respuesta.s
preg_match('/<AddResult>(.*)<\/AddResult>/', $respuesta, $resultado);


//Muestra el resultado.
echo $resultado[1];
echo "<br/>";
echo $respuesta;





?>