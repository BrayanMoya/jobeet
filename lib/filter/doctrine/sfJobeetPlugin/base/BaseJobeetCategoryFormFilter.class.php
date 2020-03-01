<?php

/**
 * JobeetCategory filter form base class.
 *
 * @package    jobeet
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaseJobeetCategoryFormFilter extends PluginJobeetCategoryFormFilter
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('jobeet_category_filters[%s]');
  }

  public function getModelName()
  {
    return 'JobeetCategory';
  }
}
