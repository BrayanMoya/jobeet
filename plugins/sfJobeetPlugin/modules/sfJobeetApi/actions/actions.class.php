<?php

/**
 * sfJobeetApi actions.
 *
 * @package    jobeet
 * @subpackage sfJobeetApi
 * @author     Your name here
 * @version    SVN: $Id$
 */
class sfJobeetApiActions extends sfActions
{
  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */

    public function executeList(sfWebRequest $request)
    {
        $this->jobs = array();
        foreach ($this->getRoute()->getObjects() as $job)
        {
            $this->jobs[$this->generateUrl('job_show_user', $job, true)] = $job->asArray($request->getHost());
        }

        switch ($request->getRequestFormat())
        {
            case 'yaml':
                $this->setLayout(false);
                $this->getResponse()->setContentType('text/yaml');
                break;
        }
    }

}
