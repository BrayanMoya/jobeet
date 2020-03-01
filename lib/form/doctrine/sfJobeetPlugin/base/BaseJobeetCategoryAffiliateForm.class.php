<?php

/**
 * JobeetCategoryAffiliate form base class.
 *
 * @method JobeetCategoryAffiliate getObject() Returns the current form's model object
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaseJobeetCategoryAffiliateForm extends PluginJobeetCategoryAffiliateForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('jobeet_category_affiliate[%s]');
  }

  public function getModelName()
  {
    return 'JobeetCategoryAffiliate';
  }

}
