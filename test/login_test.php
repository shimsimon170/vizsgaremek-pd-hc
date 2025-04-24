<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../login.php'; 

class LoginTest extends TestCase {
    private $conn;

    protected function setUp(): void {
        $this->conn = new mysqli("localhost", "root", "root", "yumeneko_test");

        if ($this->conn->connect_error) {
            $this->fail("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function testLoginWithAdmin() {
        $result = login('admin@example.com', 'yumeneko123', $this->conn);
        $this->assertEquals('admin', $result);
    }

    public function testLoginWithValidUser () {
        $result = login('user@example.com', 'correct_password', $this->conn);
        $this->assertEquals('user', $result);
    }

    public function testLoginWithWrongPassword() {
        $result = login('user@example.com', 'wrong_password', $this->conn);
        $this->assertEquals("Wrong password.", $result);
    }

    public function testLoginWithNonExistentEmail() {
        $result = login('nonexistent@example.com', 'any_password', $this->conn);
        $this->assertEquals("Email address not found.", $result);
    }

    protected function tearDown(): void {
        $this->conn->close();
    }
}