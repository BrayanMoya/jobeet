<?php

/**
 * JobeetJob form base class.
 *
 * @method JobeetJob getObject() Returns the current form's model object
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaseJobeetJobForm extends PluginJobeetJobForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('jobeet_job[%s]');
  }

  public function getModelName()
  {
    return 'JobeetJob';
  }

}
