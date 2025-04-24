<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../register.php'; 

class RegistrationTest extends TestCase {
    private $conn;

    protected function setUp(): void {
        $this->conn = new mysqli("localhost", "root", "root", "yumeneko_test");
        if ($this->conn->connect_error) {
            $this->fail("Connection failed: " . $this->conn->connect_error);
        }
        $this->conn->query("DELETE FROM customers WHERE email IN ('tesztunit@example.com', 'duplicate@example.com')");
    }

    public function testRegisterNewUser () {
        $result = registerUser ($this->conn, "Teszt Elek", "123456789", "tesztunit@example.com", "jelszo123");
        $this->assertTrue($result);
    }

    public function testRegisterDuplicateEmail() {
        registerUser ($this->conn, "Első", "111", "duplicate@example.com", "123");
        $result = registerUser ($this->conn, "Második", "222", "duplicate@example.com", "456");
        $this->assertEquals("Email already in use.", $result);
    }

    protected function tearDown(): void {
        $this->conn->query("DELETE FROM customers WHERE email IN ('tesztunit@example.com', 'duplicate@example.com')");
        $this->conn->close();
    }
}
