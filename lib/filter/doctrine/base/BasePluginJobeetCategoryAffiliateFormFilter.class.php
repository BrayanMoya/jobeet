<?php

/**
 * PluginJobeetCategoryAffiliate filter form base class.
 *
 * @package    jobeet
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id$
 */
abstract class BasePluginJobeetCategoryAffiliateFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('plugin_jobeet_category_affiliate_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PluginJobeetCategoryAffiliate';
  }

  public function getFields()
  {
    return array(
      'category_id'  => 'Number',
      'affiliate_id' => 'Number',
    );
  }
}
