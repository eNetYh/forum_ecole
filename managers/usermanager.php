<?php
class UserManager extends Manager
{

	private $table = 'user';


	public function getAll()
	{
		$array = $this->get('*',$this->table);
		$result = array();
		$i = 0;
		foreach($array as $value)
		{
			$user = new User();
			$user->hydrate($value);
			$result[$i] = $user;
		}
		return $result;
	}



	public function isUserExist($user)
	{
		$conditions = array(
			'login' => "'".$user->getLogin()."'",
			'pass' => "'".$user->getPass()."'"
			);
		$result = $this->find('*',$this->table,$conditions,'AND','=');
		if($result)
		{
			$user->setId($result[0]['id']);
			return $user;
		}
		else
		{
			return null;
		}
	}

	


}
