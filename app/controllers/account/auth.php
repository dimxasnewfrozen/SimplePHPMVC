<?php namespace controllers\account;

use \helpers\password,
	\helpers\session,
	\helpers\url,
	\core\view;

class Auth extends \core\controller {

	public function login(){

		if(Session::get('loggedin')){
			Url::redirect('profile');
		}

		$model = new \models\admin\auth();

		$data['title'] = 'Login';

		if(isset($_POST['submit'])){

			$email = $_POST['email'];
			$password = $_POST['password'];

			if(Password::verify($password, $model->getHash($_POST['email'])) == 0){
				$error[] = 'Wrong email of password';
			} else {

				$user_data = $model->getByEmail($email);
				$user_id = $user_data[0]->id;

				Session::set('loggedin',true);
				Session::setEncrypt('id', $user_id);
				Session::setEncrypt('account', $user_data[0]->account_type);

				Url::redirect('profile');
			}
		}

		$data['page'] = 'signin';
		View::rendertemplate('header',$data);
		View::render('account/login',$data,$error);
		View::rendertemplate('footer',$data);
		
	}

	public function logout(){
		Session::destroy();
		Url::redirect('');
	}

}