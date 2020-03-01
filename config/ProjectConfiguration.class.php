<?php

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../vendor/lexpress/symfony1/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
      $this->enablePlugins(array(
          'sfDoctrinePlugin',
          'sfDoctrineGuardPlugin',
          'sfFormExtraPlugin',
          'sfJobeetPlugin'
      ));
  }

    static protected $zendLoaded = false;

    static public function registerZend()
    {
        if (self::$zendLoaded)
        {
            return;
        }

        set_include_path(sfConfig::get('sf_lib_dir').'/vendor'.PATH_SEPARATOR.get_include_path());
        require_once __DIR__.'/../vendor/laminas/laminas-zendframework-bridge/src/Autoloader.php';
        Zend_Loader_Autoloader::getInstance();
        self::$zendLoaded = true;
    }
}
