<?php

/**
 * sfJobeetJob actions.
 *
 * @package    jobeet
 * @subpackage sfJobeetJob
 * @author     Your name here
 * @version    SVN: $Id$
 */
class sfJobeetJobActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        if (!$request->getParameter('sf_culture'))
        {
            if ($this->getUser()->isFirstRequest())
            {
                $culture = $request->getPreferredCulture(array('sp', 'fr'));
                $this->getUser()->setCulture($culture);
                $this->getUser()->isFirstRequest(false);
            }
            else
            {
                $culture = $this->getUser()->getCulture();
            }

            $this->redirect('localized_homepage');
        }

        $this->categories = Doctrine_Core::getTable('JobeetCategory')->getWithJobs();

    }

    public function executeFooBar(sfWebRequest $request)
    {
        $this->foo = 'bar';
        $this->bar = array('bar', 'baz');
    }


    public function executeShow(sfWebRequest $request)
    {
        $this->job = $this->getRoute()->getObject();

        $this->getUser()->addJobToHistory($this->job);
    }

    public function executeNew(sfWebRequest $request)
    {
        $job = new JobeetJob();
        $job->setType('Tiempo Completo');

        $this->form = new JobeetJobForm($job);
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->form = new JobeetJobForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $job = $this->getRoute()->getObject();
        $this->forward404If(!$job->getIsActivated());

        $this->form = new JobeetJobForm($job);
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->form = new JobeetJobForm($this->getRoute()->getObject());

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $job = $this->getRoute()->getObject();
        $job->delete();

        $this->redirect('sfJobeetJob/index');
    }

    public function executePublish(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $job = $this->getRoute()->getObject();
        $job->publish();

        $this->getUser()->setFlash('notice', sprintf('Tu trabajo está ahora en linea por %s dias.', sfConfig::get('app_active_days')));

        $this->redirect($this->generateUrl('job_show_user', $job));
    }

    public function executeExtend(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $job = $this->getRoute()->getObject();
        $this->forward404Unless($job->extend());

        $this->getUser()->setFlash('notice', sprintf('La validación de tu trabajo ha sido extendida hasta %s.', $job->getDateTimeObject('expires_at')->format('m/d/Y')));

        $this->redirect($this->generateUrl('job_show_user', $job));
    }

    public function executeSearch(sfWebRequest $request)
    {
        $this->forwardUnless($query = $request->getParameter('query'), 'sfJobeetJob', 'index');

        $this->jobs = Doctrine_Core::getTable('JobeetJob')->getForLuceneQuery($query);

        if ($request->isXmlHttpRequest())
        {
            if ('*' == $query || !$this->jobs)
            {
                return $this->renderText('No results.');
            }

            return $this->renderPartial('sfJobeetJob/list', array('jobs' => $this->jobs));
        }
    }


    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()),
            $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $job = $form->save();

            $this->redirect($this->generateUrl('job_show', $job));
        }
    }
}
