<?php namespace models\admin;

class Users extends \core\model {

	public function getusers(){
		return $this->_db->select("SELECT * FROM ".PREFIX."members ORDER BY username");
	}

	public function getuser($id){
		return $this->_db->select("SELECT * FROM ".PREFIX."members WHERE id = :id",array(':id' => $id));
	}

	public function getUserIdByEmail($email){
		return $this->_db->select("SELECT id FROM ".PREFIX."members WHERE email = :email",array(':email' => $email));
	}

	public function insert_user($data)
	{
		$this->_db->insert(PREFIX."members",$data);
	}

	public function update_user($data,$where){
		$this->_db->update(PREFIX."members",$data, $where);
	}

	public function insert_business($data){
		$this->_db->insert(PREFIX."business",$data);
	}

	public function getInactiveUserEmailHash($email_address)
	{
		return $this->_db->select("SELECT id, email_hash FROM ".PREFIX."members WHERE active = 0 and email = :email_address",array(':email_address' => $email_address));	
	}

	public function updateActiveStatus($data, $where)
	{
		$this->_db->update(PREFIX."members",$data, $where);
	}

	public function checkExistingEmail($email_address)
	{	

		$data = $this->_db->select("SELECT id FROM ".PREFIX."members WHERE email = :email_address",array(':email_address' => $email_address));
		return $data[0]->id;

	}
}