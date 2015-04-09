<?php namespace controllers\account;

use \helpers\password,
	\helpers\session,
	\helpers\url,
	\core\view;

class Activate extends \core\controller {

	public function index($email, $hash){

		$model = new \models\admin\users();
		$user_info = $model->getInactiveUserEmailHash($email);

		if ($user_info)
		{
			// validate email hash
			if(Password::verify($user_info[0]->email_hash, $hash) == 0)
			{
				$update_data = array(
					'active' => 1,
				);
				$where = array('email' => $email);
				$model->updateActiveStatus($update_data,$where);

				Url::redirect('dashboard');
			}
			else {
				$error[] = "Account has already been activated.";
			}

		}
		else 
		{
			$error[] = "Account could not be verified or has already been activated";
		}

		$data['page'] = 'signin';
		View::rendertemplate('header',$data);
		View::render('account/login',$data,$error);
		View::rendertemplate('footer',$data);

		
	}


}