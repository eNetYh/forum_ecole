<?php
class application extends Controller{

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