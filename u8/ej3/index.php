<?php

//Mostrar banderas de paises con SOAP
$soapClient = new SoapClient('http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL');
$country = ['ES','US','FR','IT','DE','GB','RU','CN','JP','IN','BR','AU','CA'];

foreach ($country as $key => $value) {
    $countryFlag = $soapClient->CountryFlag(array('sCountryISOCode' => $value));
    echo "<img src='".$countryFlag->CountryFlagResult."'> ";
}


//Sumar dos numeros con SOAP
$soapClient2 = new SoapClient('http://www.dneonline.com/calculator.asmx?WSDL');
$num1 = 3;
$num2 = 5;

$add = $soapClient2->Add(array('intA' => $num1, 'intB' => $num2));

?>

<br/><br/>
Resultado: <?php echo $add->AddResult ?>


