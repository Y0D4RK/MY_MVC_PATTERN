<?php

class User extends Basesql
{

	protected $table = "users";

    protected $id;
    protected $username = "";
    protected $email = "";
	protected $password = "";
    protected $avatar = "";
	protected $created_at;

    protected $token = "";

	protected $columns = [
        "username",
		"email",
		"password",
		"avatar",
        "created_at"
	];

	public function __construct(){
		parent::__construct();
	}

	public function getId() {
		return $this->id;
	}
	public function getUsername(){
		return $this->username;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getPassword(){
		return $this->password;
	}
	public function getAvatar(){
		return $this->avatar;
	}
	public function getCreatedAt() {
		return $this->created_at;
	}
    public function getToken() {
        return $this->token;
    }

    public function setUsername(){

    }
    public function setEmail(){

    }
    public function setPassword(){

    }
    public function setAvatar(){

    }

	public function setToken() {
	    $this->token = md5(
				$this->email.$this->username.SALT.date("YmdHis")
			);
	}

	public function getForm(){

		$form = [
            "title" => "",
            "buttonTxt" => "Sign In",
            "options" => ["method" => "POST", "action" =>  WEBHOST."user/log"],
            "struct"=>[
                "email"=>[ "type"=>"email", "class"=>"form-control", "placeholder"=>"Email", "required"=>1, "msgerror"=>"email"
                ],
                "password"=>[ "type"=>"password", "class"=>"form-control", "placeholder"=>"Password", "required"=>1, "msgerror"=>"password"
                ]
            ]
        ];
		return $form;
	}
}
