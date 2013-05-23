<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Answers', 'doctrine');

/**
 * BaseAnswers
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $quesion_id
 * @property string $answer
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property Questions $Questions
 * 
 * @method integer   getId()         Returns the current record's "id" value
 * @method integer   getQuesionId()  Returns the current record's "quesion_id" value
 * @method string    getAnswer()     Returns the current record's "answer" value
 * @method timestamp getCreatedAt()  Returns the current record's "created_at" value
 * @method timestamp getUpdatedAt()  Returns the current record's "updated_at" value
 * @method Questions getQuestions()  Returns the current record's "Questions" value
 * @method Answers   setId()         Sets the current record's "id" value
 * @method Answers   setQuesionId()  Sets the current record's "quesion_id" value
 * @method Answers   setAnswer()     Sets the current record's "answer" value
 * @method Answers   setCreatedAt()  Sets the current record's "created_at" value
 * @method Answers   setUpdatedAt()  Sets the current record's "updated_at" value
 * @method Answers   setQuestions()  Sets the current record's "Questions" value
 * 
 * @package    damsharas
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAnswers extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('answers');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('quesion_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('answer', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Questions', array(
             'local' => 'quesion_id',
             'foreign' => 'id'));
    }
}