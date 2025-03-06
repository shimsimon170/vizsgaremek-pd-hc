<?php

require_once 'Config.php';

class Customer{
    private $id;
    private $name;
    private $phone;
    private $email;
    private $password;
    private $is_admin;

    public function __construct($id,  $name, $phone,  $email,  $password, $is_admin)
    {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->password = $password;
        $this->is_admin = $is_admin;
    }

    public function getId() {return $this->id;}

	public function getName() {return $this->name;}
    
    public function getPhone() {return $this->phone;}

	public function getEmail() {return $this->email;}

	public function getPassword() {return $this->password;}

    public function getIsAdmin() {return $this->is_admin;}

	public function setId( $id): void {$this->id = $id;}

	public function setName( $name): void {$this->name = $name;}

    public function setPhone( $phone): void {$this->phone = $phone;}

	public function setEmail( $email): void {$this->email = $email;}

	public function setPassword( $password): void {$this->password = $password;}
    
    public function setIsAdmin( $is_admin): void {$this->is_admin = $is_admin;}

	public static function registerCustomer(Cutomer $customer){
        $config = new Config();
        $connection = $config->getConnection();

        $name = $customer->getName();
        $phone = $customer->getPhone();
        $email = $customer->getEmail();
        $password = $customer->getPassword();
        $is_admin = $customer->getIsAdmin();

        $sql = "INSERT INTO `customer` (name,email,phone,password,is_admin) VALUES ('$name','$email','$phone','$password','$is_admin');";

        return mysqli_query($connection,$sql);
    }

    public static function Login(string $email){
        $config = new Config();
        $connection = $config->getConnection();

        $sql = "INSERT INTO `customers` (`email`) VALUES ('{$customer->getEmail()}";
        $mySqlResponse = mysqli_query($connection,$sql);

        $email = $customer->getEmail();
    }
	
}