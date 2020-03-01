<?php

/**
 * sfJobeetLanguage actions.
 *
 * @package    jobeet
 * @subpackage sfJobeetLanguage
 * @author     Your name here
 * @version    SVN: $Id$
 */
class sfJobeetLanguageActions extends sfActions
{
  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }

    public function executeChangeLanguage(sfWebRequest $request)
    {
        $form = new sfFormLanguage(
            $this->getUser(),
            array('languages' => array('en', 'fr'))
        );

        $form->process($request);

        return $this->redirect('localized_homepage');
    }
}
