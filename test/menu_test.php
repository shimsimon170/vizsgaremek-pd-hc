<?php

use PHPUnit\Framework\TestCase;

class MenuItemControllerTest extends TestCase {

    protected function setUp(): void {
    }

    public function testGetAllMenuItemsSuccess() {
        $mockMenuItems = $this->createMock(MenuItems::class);
        $mockMenuItems->method('getAllMenuItems')
                      ->willReturn([
                          ['id' => 1, 'name' => 'Pizza', 'description' => 'Cheese Pizza', 'price' => 10.99, 'category' => 'Main Course'],
                          ['id' => 2, 'name' => 'Salad', 'description' => 'Caesar Salad', 'price' => 7.99, 'category' => 'Appetizer']
                      ]);
        $request = new Request(); 
        $_GET['name'] = 'Pizza';
        $_GET['description'] = '';
        $_GET['price'] = '';
        $_GET['category'] = '';

        $response = MenuItemController::getAllMenuItems($request);
        $this->assertEquals('success', $response['status']);
        $this->assertEquals(200, $response['statusCode']);
        $this->assertEquals('Select Successful', $response['messsage']);
        $this->assertArrayHasKey('body', $response);
        $this->assertCount(2, $response['body']); 
    }

    public function testGetAllMenuItemsEmpty() {
        $mockMenuItems = $this->createMock(MenuItems::class);
        $mockMenuItems->method('getAllMenuItems')
                      ->willReturn([]);

        $request = new Request(); 
        $_GET['name'] = '';
        $_GET['description'] = '';
        $_GET['price'] = '';
        $_GET['category'] = '';
        $response = MenuItemController::getAllMenuItems($request);

        $this->assertEquals('success', $response['status']);
        $this->assertEquals(200, $response['statusCode']);
        $this->assertEquals('Select Successful', $response['messsage']);
        $this->assertArrayHasKey('body', $response);
        $this->assertCount(0, $response['body']);
    }
}