<?php

require_once dirname(__FILE__) . '/../lib/jobGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/jobGeneratorHelper.class.php';

/**
 * sfJobeetJob actions.
 *
 * @package    jobeet
 * @subpackage sfJobeetJob
 * @author     Your name here
 * @version    SVN: $Id$
 */
class jobActions extends autoJobActions
{
    public function executeBatchExtend(sfWebRequest $request)
    {
        $ids = $request->getParameter('ids');

        $q = Doctrine_Query::create()
            ->from('JobeetJob j')
            ->whereIn('j.id', $ids);

        foreach ($q->execute() as $job) {
            $job->extend(true);
        }

        $this->getUser()->setFlash('notice', 'Los trabajos seleccionados han sido extendidos satisfactoriamente.');

        $this->redirect('jobeet_job');
    }

    public function executeListExtend(sfWebRequest $request)
    {
        $job = $this->getRoute()->getObject();
        $job->extend(true);

        $this->getUser()->setFlash('notice', 'Los trabajos seleccionados han sido extendidos satisfactoriamente.');

        $this->redirect('jobeet_job');
    }

    public function executeListDeleteNeverActivated(sfWebRequest $request)
    {
        $nb = Doctrine_Core::getTable('JobeetJob')->cleanup(60);

        if ($nb) {
            $this->getUser()->setFlash('notice', sprintf('%d trabajos nunca activados han sido eliminados correctamente.', $nb));
        } else {
            $this->getUser()->setFlash('notice', 'Sin trabajos para borrar.');
        }

        $this->redirect('jobeet_job');
    }
}
