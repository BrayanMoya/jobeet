<?php

include(__DIR__ . '/../../bootstrap/functional.php');

$browser = new JobeetTestFunctional(new sfBrowser());
$browser->loadData();

$browser->info('1 - The sfJobeetCategory page')->
info('  1.1 - Categories on homepage are clickable')->
get('/')->
click('Desarrollador Web')->
with('request')->begin()->
isParameter('module', 'sfJobeetCategory')->
isParameter('action', 'show')->
isParameter('slug', 'programming')->
end()->

info(sprintf('  1.2 - Categories with more than %s jobs also have a "more" link', sfConfig::get('app_max_jobs_on_homepage')))->
get('/')->
click('22')->
with('request')->begin()->
isParameter('module', 'sfJobeetCategory')->
isParameter('action', 'show')->
isParameter('slug', 'programming')->
end()->

info(sprintf('  1.3 - Only %s jobs are listed', sfConfig::get('app_max_jobs_on_category')))->
with('response')->checkElement('.jobs tr', sfConfig::get('app_max_jobs_on_category'))->

info('  1.4 - The sfJobeetJob listed is paginated')->
with('response')->begin()->
checkElement('.pagination_desc', '/32 jobs/')->
checkElement('.pagination_desc', '#page 1/2#')->
end()->

click('2')->
with('request')->begin()->
isParameter('page', 2)->
end()->
with('response')->checkElement('.pagination_desc', '#page 2/2#');
