<?php

/**
 * JobeetJob form.
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id$
 */
class PluginJobeetJobForm extends BaseJobeetJobForm
{
    public function configure()
    {
        $this->removeFields();

        $this->validatorSchema['email'] = new sfValidatorAnd(array(
            $this->validatorSchema['email'],
            new sfValidatorEmail(),
        ));

        $this->widgetSchema['type'] = new sfWidgetFormChoice(array(
            'choices'  => Doctrine_Core::getTable('JobeetJob')->getTypes(),
            'expanded' => true,
        ));

        $this->widgetSchema['logo'] = new sfWidgetFormInputFile(array(
            'label' => 'Logo de la Compañia',
        ));

        $this->widgetSchema->setLabels(array(
            'category_id'  => 'Categoria',
            'type'         => 'Tipo',
            'company'      => 'Compañia',
            'url'          => 'URL',
            'position'     => 'Cargo',
            'location'     => 'Ubicacion',
            'description'  => 'Descripcion',
            'how_to_apply' => 'Como Aplicar?',
            'is_public'    => 'Es publico?',
            'email'        => 'Correo',
        ));

        $this->widgetSchema->setHelp('is_public', 'El trabajo puede ser visto por todo visitante o solo afiliados a la pagina.');

        $this->widgetSchema->setNameFormat('sfJobeetJob[%s]');


        //VALIDADORES

        $this->validatorSchema['email'] = new sfValidatorAnd(array(
            $this->validatorSchema['email'],
            new sfValidatorEmail(),
        ));

        $this->validatorSchema['type'] = new sfValidatorChoice(array(
            'choices' => array_keys(Doctrine_Core::getTable('JobeetJob')->getTypes()),
        ));

        $this->validatorSchema['logo'] = new sfValidatorFile(array(
            'required'   => false,
            'path'       => sfConfig::get('sf_upload_dir').'/jobs',
            'mime_types' => 'web_images',
        ));



    }

    protected function removeFields()
    {
        unset(
            $this['created_at'], $this['updated_at'],
            $this['expires_at'], $this['is_activated'],
            $this['token']
        );
    }


}
