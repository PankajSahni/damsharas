<?php

/**
 * user actions.
 *
 * @package    damsharas
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        //$this->forward('default', 'module');
        if ($request->isMethod('post') || 1) {
            $response = array();
            $current_date = date('Y-m-d h:i:s');
            $data = $request->getParameterHolder()->getAll();
            $json_data = isset($data['json_data']) ? json_decode($data['json_data'], true) : $data;
            $email = Doctrine::getTable('Users')->func_isEmailExist($json_data['email']);
            if (count($email)) {
                $q = Doctrine_Query::create()
                        ->update('Users u')
                        ->set('u.updated_at', '?', $current_date)
                        ->where('u.email = ?', $json_data['email']);
                $q->execute();
            } else {
                $user = new Users();
                $user->setEmail($json_data['email']);
                $user->setDeviceToken($json_data['device_token']);
                $user->setCreatedAt($current_date);
                $user->setUpdatedAt($current_date);
                $user->save();
            }
            $questions_sent = Doctrine::getTable('Users')->func_getUserQuestions($json_data['email']);
            $find_questions_notin = array();
            if (count($questions_sent)) {
                foreach ($questions_sent[0]['UserQuestions'] as $value) {
                    $find_questions_notin[] = $value['question_id'];
                }
            }
            $question = Doctrine::getTable('Questions')->getQuestionForUser($find_questions_notin);
            if (count($question)) {
                $response['QUESTION'] = $question;
                $response['STATUS'] = '1';
                $response['MESSAGE'] = 'Question Found';
            } else {
                $response['STATUS'] = '0';
                $response['MESSAGE'] = 'No Question found.';
            }
            $json = json_encode($response);
            return $this->renderText($json);
        }
    }

}
