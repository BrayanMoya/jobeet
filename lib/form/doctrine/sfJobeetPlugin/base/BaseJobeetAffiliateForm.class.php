<?php

/**
 * JobeetAffiliate form base class.
 *
 * @method JobeetAffiliate getObject() Returns the current form's model object
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BaseJobeetAffiliateForm extends PluginJobeetAffiliateForm
{
  protected function setupInheritance()
  {
    parent::setupInheritance();

    $this->widgetSchema->setNameFormat('jobeet_affiliate[%s]');
  }

  public function getModelName()
  {
    return 'JobeetAffiliate';
  }

}
