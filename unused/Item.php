<?php

require_once 'Config.php';

class Item{
    private $name;
    private $description;
    private $price;
    private $category;

    public function __construct($name,  $description,  $price, $category)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category = $category;
    }
	

    public function setName( $name): void {$this->name = $name;}

	public function setDesc( $description): void {$this->description = $description;}

	public function setPrice( $price): void {$this->price = $price;}

    public function setCategory( $category): void {$this->category = $category;}

	public function getName() {return $this->name;}

	public function getDesc() {return $this->description;}

	public function getPrice() {return $this->price;}

    public function getCategory() {return $this->category;}


    public static function getMenu(){

        $config = new Config();
        $connection = $config->getConnection();

        $sql = "SELECT * FROM `users` WHERE `deleted_at` IS NULL;";
        $mySqlResponse = mysqli_query($connection,$sql);

        $response = mysqli_fetch_all($mySqlResponse,MYSQLI_ASSOC);
        
        $config->close();
        return $response;
    } 

    public static function getItemById($menu_item_id){
        $config = new Config();
        $connection = $config->getConnection();

        $sql = "SELECT * FROM `users` WHERE `id` = $menu_item_id";
        $mySqlResponse = mysqli_query($connection,$sql);

        $response = mysqli_fetch_all($mySqlResponse,MYSQLI_ASSOC);
        $config->close();
        return $response;
    } 

    public static function addItem(User $item):bool{
        $config = new Config();
        $connection = $config->getConnection();

        $name = $item->name;
        $description = $item->description;
        $price = $item->price;
        $category = $item->category;

        $sql = "INSERT INTO `menu_items` (`name`,`description`,`price`,`category`) VALUES (\"$name\",\"$description\",\"$price\",\"$category\")";

        $mySqlResponse = mysqli_query($connection,$sql);
        
        if(!$mySqlResponse){
            return false;
        }
        return true;
    }

    public static function searchItem($item){
        $config = new Config();
        $connection = $config->getConnection();

        $sql = "SELECT * FROM `menu_items` WHERE `name` LIKE '%$name%';";
        $mySqlResponse = mysqli_query($connection,$sql);
        
        $response = mysqli_fetch_all($mySqlResponse,MYSQLI_ASSOC);
        $config->close();
        return $response;
    }
}