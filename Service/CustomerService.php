<?php
require_once __DIR__ . "/../Model/Customers.php";

class CustomerService
{

    public static function registerCustomer(Customer $customer)
    {
        $name = $customer->getName();
        $phone = $customer->getPhone();
        $email = $customer->getEmail();
        $password = $customer->getPassword();
        $is_admin = $customer->getIsAdmin();

        if ($name && $email && $password) {
            $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
            $customer->setPassword($hashedPassword);
            $modelResult = Customer::registerCustomer($customer);
            

            if ($modelResult) {
                header("Location: menus.php");
                return [
                    'status' => 200,
                    'message' => 'User Registered',
                ];

            } else {
                return [
                    'status' => 500,
                    'message' => 'Registration failed',
                ];
            }

        } else {
            return [
                'status' => 417,
                'message' => 'Missing Credentials',
            ];
        }
    }
    public static function login($email, $password)
    {
        if ($email && $password){
            $ShadePassword = Customer::login($email);
            $customer->setPassword($hashedPassword);
            $modelResult = Customer::registerCustomer($customer);
            

            if ($modelResult) {
                return [
                    'status' => 200,
                    'message' => 'Successful login',
                ];

            } else {
                return [
                    'status' => 500,
                    'message' => 'Login failed',
                ];
            }

        } else {
            return [
                'status' => 417,
                'message' => 'Missing Credentials',
            ];
        }
    }

    // public static function getAllCustomers(){
    //     $modelResult = Customers::getAllCustomers();
    //     return $modelResult;
    // }
        
    }