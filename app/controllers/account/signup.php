<?php namespace controllers\account;

use \helpers\password,
	\helpers\session,
	\helpers\url,
	\helpers\phpmailer\mail,
	\core\view;

class Signup extends \core\controller {

	private $_model, $auth_model;

	public function __construct(){
		$this->_model = new \models\admin\users();
		$this->auth_model = new \models\admin\auth();
	}

	public function user(){

		$data['title'] = 'Create User Account';
		$data['page'] = 'signup';

		if(isset($_POST['submit'])){

			$email_hash = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
			$password = $_POST['password'];
			$password2 = $_POST['password2'];

			$fname = $_POST['fname'];
			$lname = $_POST['lname'];

			$email = $_POST['email'];

			if ($this->_model->checkExistingEmail($email) != "")
			{
				$error[] = 'An account already exists for this email address';
			}

			if($password == ''){
				$error[] = 'Password is required';
			}

			if($password != $password2){
				$error[] = 'Passwords do not match';
			}

			if($fname == ''){
				$error[] = 'First name is required';
			}

			if($lname == ''){
				$error[] = 'Last name is required';
			}


			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			    $error[] = 'Email is not valid';
			}

			if(!$error){

				$postdata = array(
					'password' => \helpers\password::make($password),
					'email' => $email,
					'fname' => $fname,
					'lname' => $lname,
					'email_hash' => \helpers\password::make($email_hash)
				);
				$this->_model->insert_user($postdata);

				$new_user_id = $this->auth_model->getByEmail($email);

				Session::set('loggedin',true);
				Session::setEncrypt('id', $new_user_id[0]->id);
				Session::setEncrypt('account', 'user');

				//$this->sendActivationEmail($email, $email_hash);
				
				Url::redirect('profile');
			}
		}

		View::rendertemplate('header',$data);
		View::render('account/usersignup',$data,$error);
		View::rendertemplate('footer',$data);
	}
	
}