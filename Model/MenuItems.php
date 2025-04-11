<?php

require_once __DIR__ . "/../Controller/Config.php";

class MenuItems{
    private $id;
    private $name;
    private $desc;
    private $price;
    private $category;
    private $is_available;
    private $created_at;

    public function __construct($id, $name, $desc,  $price,  $category, $is_available, $created_at)
    {
        $this->id = $id;
        $this->name = $name;
        $this->desc = $desc;
        $this->email = $price;
        $this->category = $category;
        $this->is_available = $is_available;
        $this->created_at = $created_at;
    }

    public function getId() {return $this->id;}

	public function getName() {return $this->name;}
    
    public function getDesc() {return $this->desc;}

	public function getPrice() {return $this->price;}

	public function getCategory() {return $this->category;}

    public function getIsAvailable() {return $this->is_available;}

    public function getCreatedAt() {return $this->created_at;}

	public function setId( $id): void {$this->id = $id;}

	public function setName( $name): void {$this->name = $name;}

    public function setDesc( $desc): void {$this->desc = $desc;}

	public function setPrice( $price): void {$this->price = $price;}

	public function setCategory( $category): void {$this->category = $category;}
    
    public function setIsAvailable( $is_available): void {$this->is_available = $is_available;}

    public function setCreatedAt( $created_at): void {$this->created_at = $created_at;}

	public static function getAllMenuItems(MenuItems $menuItem){
        try{
            $config = new Config();
            $connection = $config->getConnection(); 
            
            $sql = "SELECT * FROM `menu_items`;";
            $resultObject = $mysqli->query($sql);
            $result = $resultObject->fetch_all(MYSQLI_ASSOC);

            return $result;
        }catch(Exception $e){
            var_dump($e->getMessage());
        }
    }

    public static function getMenuItemByCategory($category){
        try{
            $config = new Config();
            $connection = $config->getConnection(); 
            
            $sql = "SELECT * FROM `menu_items` WHERE category LIKE '%$category%';";
            $resultObject = $mysqli->query($sql);
            $result = $resultObject->fetch_all(MYSQLI_ASSOC);

            return $result;
        }catch(Exception $e){
            var_dump($e->getMessage());
        }
    }
}