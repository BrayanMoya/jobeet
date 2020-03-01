<?php

/**
 * JobeetJob filter form base class.
 *
 * @package    jobeet
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaseJobeetJobFormFilter extends PluginJobeetJobFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('jobeet_job_filters[%s]');
  }

  public function getModelName()
  {
    return 'JobeetJob';
  }
}
