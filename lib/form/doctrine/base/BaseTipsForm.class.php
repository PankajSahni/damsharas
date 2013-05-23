<?php

/**
 * Tips form base class.
 *
 * @method Tips getObject() Returns the current form's model object
 *
 * @package    damsharas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTipsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'question_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Questions'), 'add_empty' => false)),
      'image'       => new sfWidgetFormInputText(),
      'tip'         => new sfWidgetFormTextarea(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'question_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Questions'))),
      'image'       => new sfValidatorString(array('max_length' => 255)),
      'tip'         => new sfValidatorString(),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('tips[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tips';
  }

}
