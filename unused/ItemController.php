<?php
require_once "Item.php";
require_once "Request.php";
require_once "Response.php";

class ItemController
{
    public static function getAllItems()
    {
        $result = [];
        try {
            $items = Item::getMenu();
            if (!$items) {
                $result["status"] = "error";
                $result["message"] = "Internal Server Error";
                http_response_code("500");
            } else {
                $names = array_column($items, 'name');
                array_multisort($names, $items);
                $result["status"] = "success";
                $result["message"] = "Items data fetched";
                $result["body"] = $items;
                http_response_code("200");
            }

            return json_encode($result);
        } catch (Exception $e) {
            $result["status"] = "error";
            $result["message"] = $e->getMessage();
            http_response_code("500");
        }
        return json_encode($result);
    }

    public static function getItemById($menu_item_id)
    {
        try {
            $items = Item::getItemById($menu_item_id);

            $response = [
                "status" => "success",
                "message" => "Items are sent successfully",
                "body" => $items
            ];
            http_response_code(200);
            return $response;
        } catch (Exception $e) {
            $response = [
                "status" => "error",
                "message" => $e->getMessage(),
            ];
            echo $response["message"];
            http_response_code(500);
        }
    }
    public static function addItem($request)
    {
        try {
            $data = $request->getBody();

            $itemName = $data["name"];
            $itemDesc = $data["description"];
            $itemPrice = $data["price"];
            $itemCategory = $data["category"];

            $item = new Item($itemName, $itemDesc, $itemPrice, $itemCategory);

            $modelResult = Item::addItem($item);
            if ($modelResult) {
                $response = [
                    "status" => "success",
                    "message" => "Items are sent successfully",

                ];
                http_response_code(200);
                return $response;
            } else {
                $response = [
                    "status" => "error",
                    "message" => "Internal Server Error",
                ];
                return $response["message"];
                http_response_code(500);
            }
        } catch (Exception $e) {
            $response = [
                "status" => "error",
                "message" => $e->getMessage(),
            ];
            echo $response["message"];
            http_response_code(500);
        }
    }

    static function searchItem($request)
    {
        try {
            $query = $request->getQuery();
            $separatedQuery = explode('=',$query);
            $result = [];
        
            $items = Item::searchItem($separatedQuery[1]);
            if (!$users) {
                $result["status"] = "error";
                $result["message"] = "Internal Server Error";
                http_response_code("500");
            } else {
                $names = array_column($items, 'name');
                array_multisort($names, $items);
                $result["status"] = "success";
                $result["message"] = "Item data fetched";
                $result["body"] = $items;
                http_response_code("200");
            }

            return json_encode($items);
        } catch (Exception $e) {
            $result["status"] = "error";
            $result["message"] = $e->getMessage();
            http_response_code("500");
        }
        return json_encode($result);
    }
}
