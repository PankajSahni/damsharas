<?php

/**
 * tips actions.
 *
 * @package    damsharas
 * @subpackage tips
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tipsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->tipss = Doctrine_Core::getTable('Tips')
      ->createQuery('a')
      ->execute();
   $this->web_path = Doctrine::getTable('Tips')->str_before('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], 'backend');
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->tips = Doctrine_Core::getTable('Tips')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->tips);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TipsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TipsForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($tips = Doctrine_Core::getTable('Tips')->find(array($request->getParameter('id'))), sprintf('Object tips does not exist (%s).', $request->getParameter('id')));
    $this->form = new TipsForm($tips);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($tips = Doctrine_Core::getTable('Tips')->find(array($request->getParameter('id'))), sprintf('Object tips does not exist (%s).', $request->getParameter('id')));
    $this->form = new TipsForm($tips);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($tips = Doctrine_Core::getTable('Tips')->find(array($request->getParameter('id'))), sprintf('Object tips does not exist (%s).', $request->getParameter('id')));
    $tips->delete();

    $this->redirect('tips/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $tips = $form->save();
      
      $values = $form->getValues();
      
      if(isset($values['image'])){
	$tip_id = $tips['id'];
		
        $image = $values['image'];
                        
			$temp_name = $image->getTempName();
			$extension = $image->getExtension($image->getOriginalExtension());
			
                        $image_name = $tip_id.$extension;
                        move_uploaded_file($temp_name, sfConfig::get('sf_upload_dir').'/'.$image_name);
                        $q = Doctrine_Query::create()
				->update('Tips a')
				->set('a.image', '?', $image_name)
				->where('a.id=?', array($tip_id))
				->execute();
		}
      $this->redirect('tips/edit?id='.$tips->getId());
    }
  }
}
