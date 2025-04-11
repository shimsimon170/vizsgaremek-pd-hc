<?php

require_once __DIR__ . "/../Service/MenuService.php";
require_once 'Config.php';

$menuService = new MenuService($conn);
$menuItems = $menuService->getAvailableMenuItems();

class MenuItemController{

    public static function getAllMenuItems(Request $request) {

        $name = $_GET['name'] ?? '';
        $desc = $_GET['description'] ?? '';
        $price = $_GET['price'] ?? '';
        $category = $_GET['category'] ?? '';
        
        $result = MenuItems::getAllMenuItems($name, $desc,  $price,  $category);
    
        $response = [
            'status' => 'success',
            'statusCode' => 200,
            'messsage' => 'Select Successful',
            'body' => $result
        ];
        
        return $response;
        
    }    

}