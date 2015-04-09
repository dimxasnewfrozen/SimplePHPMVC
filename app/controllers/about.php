<?php namespace controllers;

use \core\view,
	\helpers\session,
	\helpers\password,
	\helpers\url;

class About extends \core\controller {

	private $_model;
	private $_user, $user_id;

	public function __construct()
	{

		$this->_model = new \models\admin\users();

		if(Session::get('loggedin')){
			$id = Session::getEncrypt('id');
			$this->_user = $this->_model->getuser($id);
			$this->user_id = $this->_user[0]->id;
		}
		else {
			$this->user_id = "";
		}
	}

	public function index(){

		$data['title'] = '';
		$data['page'] = 'About';
		$data['user_id'] = $this->user_id;
		
		View::rendertemplate('header',$data);
		View::render('home/about',$data);
		View::rendertemplate('footer',$data);
	}

}