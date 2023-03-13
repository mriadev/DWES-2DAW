<?php
$country = 'ES';

$mensaje = '<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <CountryFlag xmlns="http://www.oorsprong.org/websamples.countryinfo">
    <sCountryISOCode>'.$country.'</sCountryISOCode>
    </CountryFlag>
  </soap:Body>
</soap:Envelope>';



$resultado = curl_init();
$array = array(
    CURLOPT_URL => 'http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso',
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

preg_match('/<m:CountryFlagResult>(.*)<\/m:CountryFlagResult>/', $respuesta, $resultado);

//imprimir imagen del resultado
?>
<img src='<?php echo $resultado[1] ?>'>

