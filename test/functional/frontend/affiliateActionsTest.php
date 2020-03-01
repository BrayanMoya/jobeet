<?php

include(__DIR__ . '/../../bootstrap/functional.php');

$browser = new JobeetTestFunctional(new sfBrowser());
$browser->loadData();

$browser->
info('1 - An sfJobeetAffiliate can create an account')->

get('/sfJobeetAffiliate/new')->
click('Submit', array('jobeet_affiliate' => array(
    'url' => 'http://www.example.com/',
    'email' => 'foo@example.com',
    'jobeet_categories_list' => array(Doctrine_Core::getTable('JobeetCategory')->findOneBySlug('Programacion')->getId()),
)))->
with('response')->isRedirected()->
followRedirect()->
with('response')->checkElement('#content h1', 'Your sfJobeetAffiliate account has been created')->

info('2 - An sfJobeetAffiliate must at least select one sfJobeetCategory')->

get('/sfJobeetAffiliate/new')->
click('Submit', array('jobeet_affiliate' => array(
    'url' => 'http://www.example.com/',
    'email' => 'foo@example.com',
)))->
with('form')->isError('jobeet_categories_list');