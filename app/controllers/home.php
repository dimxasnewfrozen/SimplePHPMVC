<?php namespace controllers;

use \core\view,
	\helpers\session,
	\helpers\password,
	\helpers\url;

class Home extends \core\controller {

	private $_model;
	private $_user, $user_id;

	public function __construct()
	{

		$this->_model = new \models\admin\users();

		if(Session::get('loggedin')){
			$id = Session::getEncrypt('id');
			$this->_user = $this->_model->getuser($id);
			$this->user_id = $this->_user[0]->id;

			// if you're logged in, go to the profile/dashboard page:
			Url::redirect('profile');
		}
		else {
			$this->user_id = "";
		}
	}

	public function index(){

		$data['title'] = '';
		$data['page'] = 'home';
		$data['user_id'] = $this->user_id;
		
		View::rendertemplate('header',$data);
		View::render('home/index',$data);
		View::rendertemplate('footer',$data);
	}



}