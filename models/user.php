<?php
class User extends Model
{
	//VARS
	private $id;
	private $login;
	private $pass;


	//CONSTRUCT
	public function __construct()
	{

	}



	//METHODS








	//GETTERS AND SETTERS

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of login.
     *
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Sets the value of login.
     *
     * @param mixed $login the login
     *
     * @return self
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Gets the value of pass.
     *
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Sets the value of pass.
     *
     * @param mixed $pass the pass
     *
     * @return self
     */
    public function setPass($pass)
    {
        $this->pass = sha1($pass);

        return $this;
    }
}
