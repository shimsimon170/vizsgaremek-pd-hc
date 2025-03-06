<?php
require_once "Customer.php";

class CustomerService
{

    static function registerCustomer(Customer $customer)
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
    static function login($email, $password)
    {
        if ($email && $password){
            $ShadePassword = Customer:: login($email);
            $customer->setPassword($hashedPassword);
            $modelResult = Customer::registerCustomer($customer);
            

            if ($modelResult) {
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
        
    }