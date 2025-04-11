<?php
require_once __DIR__ . "/../Model/MenuItems.php";

class MenuService
{

    public static function getAllMenuItems(MenuItems $menuItem)
    {
        $modelResult = MenuItems::getAllMenuItems();
        return $modelResult;
    }

    public function getAvailableMenuItems() {
        $query = "SELECT * FROM menu_items WHERE is_available = 1 ORDER BY menu_item_id ASC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}