<?php
class application extends Controller{
dvz
	public function notfound()
	{
		$this->render('notfound');
	}

	public function logout()
	{
		session_destroy();
		header('Location: '.WEBROOT);
	}


}
