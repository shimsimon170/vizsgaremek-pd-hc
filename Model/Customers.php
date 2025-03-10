<?php

require_once __DIR__ . "/../Controller/Config.php";

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

	public static function registerCustomer(Customer $customer){
        $sql = "CALL registerCustomer();";
		$dbResult = $dbCon->query($sql);
		$result = $dbResult->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    public static function Login(){
        $sql = "CALL login();";
		$dbResult = $dbCon->query($sql);
		$result = $dbResult->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    public static function getAllCustomers(){
		$sql = "CALL getAllCustomers();";
		$dbResult = $dbCon->query($sql);
		$result = $dbResult->fetch_all(MYSQLI_ASSOC);

		return $result;
    }
	
}