<?php

/**
 * Tips form.
 *
 * @package    damsharas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TipsForm extends BaseTipsForm
{
  public function configure()
  {
      unset($this['created_at'], $this['updated_at']);
      
    $question_data = Doctrine_Core::getTable('Questions')->getAllQuestions();
    $this->widgetSchema['question_id'] = new sfWidgetFormChoice(array('choices' => $question_data));
    
    $this->widgetSchema['image'] = new sfWidgetFormInputFile();
    $this->validatorSchema['image'] = new sfValidatorFile(array('required'=>false));
  }
}
