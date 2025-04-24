<?php

use PHPUnit\Framework\TestCase;

class CustomerControllerTest extends TestCase {

    protected function setUp(): void {
    }

    public function testRegisterCustomerSuccess() {
        $mockService = $this->createMock(CustomerService::class);
        $mockService->method('registerCustomer')
                    ->willReturn(['id' => 1, 'email' => 'test@example.com']);

        $request = new Request();
        $response = CustomerController::registerCustomer($request);

        $this->assertEquals('success', $response['status']);
        $this->assertEquals(200, $response['statusCode']);
        $this->assertEquals('success', $response['message']);
        $this->assertArrayHasKey('body', $response);
    }

    public function testRegisterCustomerFailure() {
        $mockService = $this->createMock(CustomerService::class);
        $mockService->method('registerCustomer')
                    ->willReturn(false);

        $request = new Request(); 
        $response = CustomerController::registerCustomer($request);

        $this->assertEquals('error', $response['status']);
        $this->assertEquals(500, $response['statusCode']);
        $this->assertEquals('Error during registration.', $response['message']);
    }

    public function testLoginSuccess() {
        $mockService = $this->createMock(CustomerService::class);
        $mockService->method('login')
                    ->willReturn(['id' => 1, 'email' => 'test@example.com']);

        $request = new Request(); 
        $response = CustomerController::login($request);

        $this->assertEquals('success', $response['status']);
        $this->assertEquals(200, $response['statusCode']);
        $this->assertEquals('success', $response['message']);
        $this->assertArrayHasKey('body', $response);
    }

    public function testLoginFailure() {
        $mockService = $this->createMock(CustomerService::class);
        $mockService->method('login')
                    ->willReturn(false);

        $request = new Request(); 
        $response = CustomerController::login($request);

        $this->assertEquals('error', $response['status']);
        $this->assertEquals(500, $response['statusCode']);
        $this->assertEquals('Error during login.', $response['message']);
    }
}