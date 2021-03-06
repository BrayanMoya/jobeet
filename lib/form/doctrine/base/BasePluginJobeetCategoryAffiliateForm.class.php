<?php

/**
 * PluginJobeetCategoryAffiliate form base class.
 *
 * @method PluginJobeetCategoryAffiliate getObject() Returns the current form's model object
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BasePluginJobeetCategoryAffiliateForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_id'  => new sfWidgetFormInputHidden(),
      'affiliate_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'category_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('category_id')), 'empty_value' => $this->getObject()->get('category_id'), 'required' => false)),
      'affiliate_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('affiliate_id')), 'empty_value' => $this->getObject()->get('affiliate_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('plugin_jobeet_category_affiliate[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PluginJobeetCategoryAffiliate';
  }

}
