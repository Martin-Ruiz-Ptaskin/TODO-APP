<?php
$url = 'http://10.10.9.204/EEServices/generar-pase?wsdl';
$options = 'http://ar.gob.gcaba.ee.services.external/';
$client = new SoapClient($url);
$xmlr = new SimpleXMLElement("<CustomerSearch></CustomerSearch>");
$xmlr->addChild('AuthorID', 1);
$xmlr->addChild('UserID', 'mchojrin');
$xmlr->addChild('UserPassword', '1234');
$xmlr->addChild('Email', 'mauro.chojrin@leewayweb.com');
$params = new stdClass();
$params->xml = $xmlr->asXML(); // OJO: La propiedad xml es particular de este WebService, debes reemplazarla por el nombre del parámetro que espera recibir el servicio al que buscas conectarte
$result = $client->CustomerSearchS($params);
print_r($result);
echo PHP_EOL;