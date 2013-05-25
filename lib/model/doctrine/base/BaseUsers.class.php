<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Users', 'doctrine');

/**
 * BaseUsers
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $email
 * @property string $device_token
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property Doctrine_Collection $UserQuestions
 * 
 * @method integer             getId()            Returns the current record's "id" value
 * @method string              getEmail()         Returns the current record's "email" value
 * @method string              getDeviceToken()   Returns the current record's "device_token" value
 * @method timestamp           getCreatedAt()     Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()     Returns the current record's "updated_at" value
 * @method Doctrine_Collection getUserQuestions() Returns the current record's "UserQuestions" collection
 * @method Users               setId()            Sets the current record's "id" value
 * @method Users               setEmail()         Sets the current record's "email" value
 * @method Users               setDeviceToken()   Sets the current record's "device_token" value
 * @method Users               setCreatedAt()     Sets the current record's "created_at" value
 * @method Users               setUpdatedAt()     Sets the current record's "updated_at" value
 * @method Users               setUserQuestions() Sets the current record's "UserQuestions" collection
 * 
 * @package    damsharas
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUsers extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('users');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('email', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('device_token', 'string', 255, array(
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
        $this->hasMany('UserQuestions', array(
             'local' => 'id',
             'foreign' => 'user_id'));
    }
}