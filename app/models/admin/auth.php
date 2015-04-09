<?php namespace models\admin;

class Auth extends \core\model {

	public function getHash($email){
		$data = $this->_db->select("SELECT password FROM ".PREFIX."members WHERE email = :email",array(':email' => $email));
		return $data[0]->password;
	}

	public function getByUsername($username)
	{
		$data = $this->_db->select("SELECT * FROM ".PREFIX."members WHERE username = :username",array(':username' => $username));
		return $data;
	}

	public function getByEmail($email)
	{
		$data = $this->_db->select("SELECT * FROM ".PREFIX."members WHERE email = :email",array(':email' => $email));
		return $data;
	}

}