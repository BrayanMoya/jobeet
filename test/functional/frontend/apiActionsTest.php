<?php

include(dirname(__FILE__) . '/../../bootstrap/functional.php');

$browser = new JobeetTestFunctional(new sfBrowser());
$browser->loadData();

$browser->
info('1 - Web service security')->

info('  1.1 - A token is needed to access the service')->
get('/sfJobeetApi/foo/jobs.xml')->
with('response')->isStatusCode(404)->

info('  1.2 - An inactive account cannot access the web service')->
get('/sfJobeetApi/symfony/jobs.xml')->
with('response')->isStatusCode(404)->

info('2 - The jobs returned are limited to the categories configured for the sfJobeetAffiliate')->
get('/sfJobeetApi/sensio_labs/jobs.xml')->
with('request')->isFormat('xml')->
with('response')->begin()->
isValid()->
checkElement('sfJobeetJob', 32)->
end()->

info('3 - The web service supports the JSON format')->
get('/sfJobeetApi/sensio_labs/jobs.json')->
with('request')->isFormat('json')->
with('response')->matches('/"sfJobeetCategory"\: "Programming"/')->

info('4 - The web service supports the YAML format')->
get('/sfJobeetApi/sensio_labs/jobs.yaml')->
with('response')->begin()->
isHeader('content-type', 'text/yaml; charset=utf-8')->
matches('/sfJobeetCategory\: Programming/')->
end();
