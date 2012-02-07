<?php
// app/Model/User.php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel
{
    public $name = 'User';
   	public $validate = array(
		'username' => array('rule' => array('validateUsername'),'message' => 'Username already in use'),
		'password' => array('rule' => array('validatePassword', 'password'),'message' => 'Passwords do not match'),
		'password_confirm' => array('rule' => 'alphanumeric','required' => true),
		'first_name' => array('rule' => array('validateFirstName'),'message' => 'Wrong first name'),
		'last_name' => array('rule' => array('validateLastName'),'message' => 'Wring last name'),
		'email'=> array('rule' => array('validateEmail'),'message' => 'Wring email'),
		'address'=> array('rule' => array('validateAddress'),'message' => 'Wrong address'),
		'city'=> array('rule' => array('validateCity'),'message' => 'Wrong city'),
		'phone'=> array('rule' => array('validatePhone'),'message' => 'Wrong phone'),
		'post'=> array('rule' => array('validatePost'),'message' => 'Wrong post'),
		'emso'=> array('rule' => array('validateEmso'),'message' => 'Wrong emso'),
		'active'=> array('rule' => array('validateActive'),'message' => 'Wrong emso')

	);
	var $belongsTo = 'Post';


public function validateFirstName($value) {  return ($this->action!='register')||(preg_match("/^[A-Z][a-zA-Z -]+$/", $value) === 0); }
public function validateLastName($value) {  return ($this->action!='register')||(preg_match("/^[A-Z][a-zA-Z -]+$/", $value) === 0); }
public function validateEmail($value) {  return ($this->action!='register')||filter_var($value, FILTER_VALIDATE_EMAIL); }
public function validateAddress($value) {  return ($this->action!='register')||(preg_match("/^[A-Z][a-zA-Z -]+$/", $value) === 0); }
public function validateCity($value) {  return ($this->action!='register')||(preg_match("/^[A-Z][a-zA-Z -]+$/", $value) === 0); }
public function validatePhone($value){ return true; }
public function validatePost($value) {return true;}
public function validateEmso($value) {return true; }
public function validateActive($value){return true;}
	
/*public function beforeValidate()
	{
		$validate_password = array('rule' => array('confirmPassword', 'password'),'message' => 'Passwords do not match');
		$validate_password_confirm = array('rule' => 'alphanumeric','required' => true);
	}
*/
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

