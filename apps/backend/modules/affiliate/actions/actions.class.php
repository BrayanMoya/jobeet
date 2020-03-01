<?php

require_once dirname(__FILE__).'/../lib/affiliateGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/affiliateGeneratorHelper.class.php';

/**
 * sfJobeetAffiliate actions.
 *
 * @package    jobeet
 * @subpackage sfJobeetAffiliate
 * @author     Your name here
 * @version    SVN: $Id$
 */
class affiliateActions extends autoAffiliateActions
{
    public function executeListActivate()
    {
        $affiliate = $this->getRoute()->getObject();
        $affiliate->activate();

        // send an email to the sfJobeetAffiliate
        $message = $this->getMailer()->compose(
            array('bmoya17@hotmail.com' => 'Jobeet Bot'),
            $affiliate->getEmail(),
            'Token para afiliado de jobeet',
            <<<EOF
Tu cuenta de Afiliado a Jobeet ha sido Activada.
 
Tu token es {$affiliate->getToken()}.
 
The Jobeet Bot.
EOF
        );

        $this->getMailer()->send($message);

        $this->redirect('jobeet_affiliate');
    }

    public function executeListDeactivate()
    {
        $this->getRoute()->getObject()->deactivate();

        $this->redirect('jobeet_affiliate');
    }

    public function executeBatchActivate(sfWebRequest $request)
    {
        $q = Doctrine_Query::create()
            ->from('JobeetAffiliate a')
            ->whereIn('a.id', $request->getParameter('ids'));

        $affiliates = $q->execute();

        foreach ($affiliates as $affiliate)
        {
            $affiliate->activate();
        }

        $this->redirect('jobeet_affiliate');
    }

    public function executeBatchDeactivate(sfWebRequest $request)
    {
        $q = Doctrine_Query::create()
            ->from('JobeetAffiliate a')
            ->whereIn('a.id', $request->getParameter('ids'));

        $affiliates = $q->execute();

        foreach ($affiliates as $affiliate)
        {
            $affiliate->deactivate();
        }

        $this->redirect('jobeet_affiliate');
    }

}
