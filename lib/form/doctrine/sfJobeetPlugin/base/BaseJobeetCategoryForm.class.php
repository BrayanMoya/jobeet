<?php

/**
 * JobeetCategory form base class.
 *
 * @method JobeetCategory getObject() Returns the current form's model object
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaseJobeetCategoryForm extends PluginJobeetCategoryForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('jobeet_category[%s]');
  }

  public function getModelName()
  {
    return 'JobeetCategory';
  }

}
