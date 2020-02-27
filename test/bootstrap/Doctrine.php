<?php

//Unit

include(dirname(__FILE__).'/unit.php');

$configuration = ProjectConfiguration::getApplicationConfiguration( 'frontend', 'test', true);

new sfDatabaseManager($configuration);

Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures');


//Functional

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new JobeetTestFunctional(new sfBrowser());
Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/fixtures');


?>