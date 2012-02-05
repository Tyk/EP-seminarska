<?php
// app/Model/User.php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel
{
    public $name = 'User';
   	public $validate = array(
		'username' => array('rule' => array('validateUsername'),'message' => 'Wrong username'),
		//'role' => array('valid' => array('rule' => array('inList', array('admin', 'client', 'salesman')), 'message' => 'Please enter a valid role', 'allowEmpty' => false)),
		'password' => array('rule' => array('validatePassword', 'password'),'message' => 'Passwords do not match'),
		'password_confirm' => array('rule' => 'alphanumeric','required' => true)
	);
	var $belongsTo = 'Post';

	public function beforeValidate()
	{
		$validate_password = array('rule' => array('confirmPassword', 'password'),'message' => 'Passwords do not match');
		$validate_password_confirm = array('rule' => 'alphanumeric','required' => true);
	}

	public function beforeSave() 
	{
    	if (isset($this->data[$this->alias]['password'])) 
		{
        	$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
    	}
		return true;	
	}

	function validateUsername($value)
	{
		if((!isset($value)) || (!isset($value['username'])) || ($value['username'] == '') ) return false;
		$username = $value['username'];
		$user = $this->find('first', array('conditions' => array('User.first_name' => $username)));
		if($user) return false;
		return true;
	}

	function validatePassword($data) 
	{
		$valid = false;
		if ($data['password'] == $this->data['User']['password_confirm'])
		{
			$valid = true;
		}
		return $valid;
	} 

}

