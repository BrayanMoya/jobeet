<?php

include(__DIR__ . '/../../bootstrap/functional.php');

$browser = new JobeetTestFunctional(new sfBrowser());
$browser->loadData();

//trabajos expirados no son tomados en cuenta
//$browser->info('1 - The homepage')->
//get('/')->
//with('request')->begin()->
//isParameter('module', 'sfJobeetJob')->
//isParameter('action', 'index')->
//end()->
//with('response')->begin()->
//info('  1.1 - Expired jobs are not listed')->
//checkElement('.jobs td.position:contains("expired")', false)->
//end();
//
////Solo n puestos se listan para una categoría
//$max = sfConfig::get('app_max_jobs_on_homepage');
//
//$browser->info('1 - The homepage')->
//get('/')->
//info(sprintf('  1.2 - Only %s jobs are listed for a sfJobeetCategory', $max))->
//with('response')->
//checkElement('.category_programming tr', $max);
//
////Una categoría tiene un enlace a la página de categoría sólo si tiene muchos puestos de trabajo
//$browser->info('1 - The homepage')->
//get('/')->
//info('  1.3 - A sfJobeetCategory has a link to the sfJobeetCategory page only if too many jobs')->
//with('response')->begin()->
//checkElement('.category_design .more_jobs', false)->
//checkElement('.category_programming .more_jobs')->
//end();
//
//
////Puestos de trabajo están ordenados por fecha
//$q = Doctrine_Query::create()
//    ->select('j.*')
//    ->from('JobeetJob j')
//    ->leftJoin('j.JobeetCategory c')
//    ->where('c.slug = ?', 'programming')
//    ->andWhere('j.expires_at > ?', date('Y-m-d', time()))
//    ->orderBy('j.created_at DESC');
//
//$sfJobeetJob = $q->fetchOne();


//$browser->info('1 - The homepage')->
//get('/')->
//info('  1.4 - Jobs are sorted by date')->
//with('response')->begin()->
//checkElement(sprintf('.category_programming tr:first a[href*="/%d/"]',
//    $browser->getMostRecentProgrammingJob()->getId()))->
//end();


//Cada puesto de trabajo en la página principal es cliqueable
//$sfJobeetJob = $browser->getMostRecentProgrammingJob();
//
//
//$browser->info('2 - The sfJobeetJob page')->
//get('/')->
//
//info('  2.1 - Each sfJobeetJob on the homepage is clickable and give detailed information')->
//click('Web Developer', array(), array('position' => 1))->
//with('request')->begin()->
//isParameter('module', 'sfJobeetJob')->
//isParameter('action', 'show')->
//isParameter('company_slug', $sfJobeetJob->getCompanySlug())->
//isParameter('location_slug', $sfJobeetJob->getLocationSlug())->
//isParameter('position_slug', $sfJobeetJob->getPositionSlug())->
//isParameter('id', $sfJobeetJob->getId())->
//end();
//
//
//info('  2.2 - A non-existent sfJobeetJob forwards the user to a 404')->
//get('/sfJobeetJob/foo-inc/milano-italy/0/painter')->
//with('response')->isStatusCode(404)->
//
//info('  2.3 - An expired sfJobeetJob page forwards the user to a 404')->
//get(sprintf('/sfJobeetJob/sensio-labs/paris-france/%d/web-developer', $browser->getExpiredJob()->getId()))->
//with('response')->isStatusCode(404);


//$browser->info('3 - Post a Job page')->
//info('  3.1 - Submit a Job')->
//
//get('/sfJobeetJob/new')->
//
//with('request')->begin()->
//isParameter('module', 'sfJobeetJob')->
//isParameter('action', 'new')->
//end()->
//click('Preview your sfJobeetJob', array('sfJobeetJob' => array(
//    'company' => 'Sensio Labs',
//    'url' => 'http://www.sensio.com/',
//    'logo' => sfConfig::get('sf_upload_dir') . '/jobs/sensio-labs.gif',
//    'position' => 'Developer',
//    'location' => 'Atlanta, USA',
//    'description' => 'You will work with symfony to develop websites for our customers.',
//    'how_to_apply' => 'Send me an email',
//    'email' => 'for.a.sfJobeetJob@example.com',
//    'is_public' => false,
//)))->
//
//with('request')->begin()->
//isParameter('module', 'sfJobeetJob')->
//isParameter('action', 'create')->
//end()->
//
//isRedirected()->
//followRedirect()->
//
//with('request')->begin()->
//isParameter('module', 'sfJobeetJob')->
//isParameter('action', 'show')->
//end();
//

$browser->setTester('doctrine', 'sfTesterDoctrine');

//
//with('doctrine')->begin()->
//check('JobeetJob', array(
//    'location'     => 'Atlanta, USA',
//    'is_activated' => false,
//    'is_public'    => false,
//))->
//end();


//$browser->
//info('  3.2 - Submit a Job with invalid values')->
//
//get('/sfJobeetJob/new')->
//click('Preview your sfJobeetJob', array('sfJobeetJob' => array(
//    'company' => 'Sensio Labs',
//    'position' => 'Developer',
//    'location' => 'Atlanta, USA',
//    'email' => 'not.an.email',
//)))->
//
//with('form')->begin()->
//hasErrors(3)->
//isError('description', 'required')->
//isError('how_to_apply', 'required')->
//isError('email', 'invalid')->
//end();
//
//
//$browser->info('  3.3 - On the preview page, you can publish the sfJobeetJob')->
//createJob(array('position' => 'FOO1'))->
//click('Publicar', array(), array('method' => 'put', '_with_csrf' => true))->
//
//with('doctrine')->begin()->
//check('JobeetJob', array(
//    'position' => 'FOO1',
//    'is_activated' => true,
//))->
//end();
//
//
//$browser->info('  3.4 - On the preview page, you can delete the sfJobeetJob')->
//createJob(array('position' => 'FOO2'))->
//click('Eliminar', array(), array('method' => 'delete', '_with_csrf' => true))->
//
//with('doctrine')->begin()->
//check('JobeetJob', array(
//    'position' => 'FOO2',
//), false)->
//end();
//
//
//$browser->info('  3.5 - When a sfJobeetJob is published, it cannot be edited anymore')->
//createJob(array('position' => 'FOO3'), true)->
//get(sprintf('/sfJobeetJob/%s/edit', $browser->getJobByPosition('FOO3')->getToken()))->
//
//with('response')->begin()->
//isStatusCode(404)->
//end();
//
//
//$browser->info('  3.6 - A sfJobeetJob validity cannot be extended before the sfJobeetJob expires soon')->
//createJob(array('position' => 'FOO4'), true)->
//call(sprintf('/sfJobeetJob/%s/extend', $browser->getJobByPosition('FOO4')->getToken()), 'put', array('_with_csrf' => true))->
//with('response')->begin()->
//isStatusCode(404)->
//end();
//
//$browser->info('  3.7 - A sfJobeetJob validity can be extended when the sfJobeetJob expires soon')->
//createJob(array('position' => 'FOO5'), true);
//
//$sfJobeetJob = $browser->getJobByPosition('FOO5');
//$sfJobeetJob->setExpiresAt(date('Y-m-d'));
//$sfJobeetJob->save();
//
//$browser->
//call(sprintf('/sfJobeetJob/%s/extend', $sfJobeetJob->getToken()), 'put', array('_with_csrf' => true))->
//with('response')->isRedirected();
//
//$sfJobeetJob->refresh();
//$browser->test()->is(
//    $sfJobeetJob->getDateTimeObject('expires_at')->format('y/m/d'),
//    date('y/m/d', time() + 86400 * sfConfig::get('app_active_days'))
//);


$browser->
get('/sfJobeetJob/new')->
click('Preview your sfJobeetJob', array('sfJobeetJob' => array(
    'token' => 'fake_token',
)))->

with('form')->begin()->
hasErrors(7)->
hasGlobalError('extra_fields')->
end();


$browser->
info('4 - User sfJobeetJob history')->

loadData()->
restart()->

info('  4.1 - When the user access a sfJobeetJob, it is added to its history')->
get('/')->
click('Web Developer', array(), array('position' => 1))->
get('/')->
with('user')->begin()->
isAttribute('job_history', array($browser->getMostRecentProgrammingJob()->getId()))->
end()->

info('  4.2 - A sfJobeetJob is not added twice in the history')->
click('Web Developer', array(), array('position' => 1))->
get('/')->
with('user')->begin()->
isAttribute('job_history', array($browser->getMostRecentProgrammingJob()->getId()))->
end();


//ajax
$browser->setHttpHeader('X_REQUESTED_WITH', 'XMLHttpRequest');
$browser->
info('5 - Live search')->

get('/search?query=sens*')->
with('response')->begin()->
checkElement('table tr', 2)->
end();
