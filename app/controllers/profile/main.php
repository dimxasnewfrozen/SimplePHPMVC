<?php namespace controllers\profile;

use \helpers\password,
	\helpers\session,
	\helpers\url,
	\core\view;

class Main extends \core\controller {

	private $_model;
	private $_user, $user_id;
	private $menu;

	public function __construct(){

		$this->_model = new \models\admin\users();
		$this->user_id = '';

		if(!Session::get('loggedin')){
			Url::redirect('login');
		}
		else {
			$id = Session::getEncrypt('id');
			$this->_user = $this->_model->getuser($id);

			if (!$this->_user)
			{
				Session::destroy();
				Url::redirect('login');
			}
			else {
				$this->user_id = $this->_user[0]->id;
			}
		}
		
	}

	public function index(){

		$data['title'] = 'My Profile';
		$data['page'] = 'profile';
		$data['user_id'] = $this->user_id;
		$data['user'] = $this->_user;
		
		View::rendertemplate('header',$data);
		View::render('/user/home',$data);
		View::rendertemplate('footer',$data);

	}
	
}