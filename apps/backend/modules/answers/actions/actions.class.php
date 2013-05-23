<?php

/**
 * answers actions.
 *
 * @package    damsharas
 * @subpackage answers
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class answersActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->answerss = Doctrine_Core::getTable('Answers')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->answers = Doctrine_Core::getTable('Answers')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->answers);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new AnswersForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new AnswersForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($answers = Doctrine_Core::getTable('Answers')->find(array($request->getParameter('id'))), sprintf('Object answers does not exist (%s).', $request->getParameter('id')));
    $this->form = new AnswersForm($answers);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($answers = Doctrine_Core::getTable('Answers')->find(array($request->getParameter('id'))), sprintf('Object answers does not exist (%s).', $request->getParameter('id')));
    $this->form = new AnswersForm($answers);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($answers = Doctrine_Core::getTable('Answers')->find(array($request->getParameter('id'))), sprintf('Object answers does not exist (%s).', $request->getParameter('id')));
    $answers->delete();

    $this->redirect('answers/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $answers = $form->save();

      $this->redirect('answers/edit?id='.$answers->getId());
    }
  }
}
