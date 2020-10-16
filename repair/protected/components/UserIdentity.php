<?php
/**
* UserIdentity represents the data needed to identity a user.
* It contains the authentication method that checks if the provided
* data can identify the user.
*/
class UserIdentity extends CUserIdentity
{
private $_id;
/**
* Authenticates a user using the User data model.
* @return boolean whether authentication succeeds.
*/
public function authenticate()
{
$user=User::model()->findByAttributes(array('email'=>$this->username));
if($user===null)
{
$this->errorCode=self::ERROR_USERNAME_INVALID;
}
else
{
//if($user->password!==$user->encrypt($this->password))
if($user->password!==$this->password)
{
$this->errorCode=self::ERROR_PASSWORD_INVALID;
}
else
{
$this->_id = $user->id;
YII::app()->session['id']=$user->id;
YII::app()->session['myimage']=$user->image;
YII::app()->session['name']=$user->name;
YII::app()->session['lastlogin']=$user->lastlogin;
YII::app()->session['role']=$user->role;

$this->errorCode=self::ERROR_NONE;
}
}
return !$this->errorCode;
}
public function getId()
{
return $this->_id;
}
}