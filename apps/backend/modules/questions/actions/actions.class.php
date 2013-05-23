<?php

/**
 * questions actions.
 *
 * @package    damsharas
 * @subpackage questions
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class questionsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->questionss = Doctrine_Core::getTable('Questions')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->questions = Doctrine_Core::getTable('Questions')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->questions);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new QuestionsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new QuestionsForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($questions = Doctrine_Core::getTable('Questions')->find(array($request->getParameter('id'))), sprintf('Object questions does not exist (%s).', $request->getParameter('id')));
    $this->form = new QuestionsForm($questions);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($questions = Doctrine_Core::getTable('Questions')->find(array($request->getParameter('id'))), sprintf('Object questions does not exist (%s).', $request->getParameter('id')));
    $this->form = new QuestionsForm($questions);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($questions = Doctrine_Core::getTable('Questions')->find(array($request->getParameter('id'))), sprintf('Object questions does not exist (%s).', $request->getParameter('id')));
    $questions->delete();

    $this->redirect('questions/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $questions = $form->save();

      $this->redirect('questions/edit?id='.$questions->getId());
    }
  }
}
