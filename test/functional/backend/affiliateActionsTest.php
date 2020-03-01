<?php

include(__DIR__ . '/../../bootstrap/functional.php');

$browser = new JobeetTestFunctional(new sfBrowser());
$browser->loadData();

$browser->
info('1 - Authentication')->
get('/sfJobeetAffiliate')->
click('Signin', array(
    'signin' => array('username' => 'admin', 'password' => 'admin'),
    array('_with_csrf' => true)
))->
with('response')->isRedirected()->
followRedirect()->

info('2 - When validating an sfJobeetAffiliate, an email must be sent with its token')->
click('Activate', array(), array('position' => 1))->
with('mailer')->begin()->
checkHeader('Subject', '/Jobeet sfJobeetAffiliate token/')->
checkBody('/Your token is symfony/')->
end();
