<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    protected $json = '
    {
        "departments": [
          {
            "name": "Engineering",
            "users": [
              {
                "name": "John Doe",
                "birthdate": "1990-05-15",
                "nit": "123456789",
                "contact": {
                  "email": "john.doe@example.com",
                  "phone": "+1234567890",
                  "address": "123 Main St, City"
                },
                "permissions": ["read", "write"]
              },
              {
                "name": "Jane Smith",
                "birthdate": "1985-08-22",
                "nit": "987654321",
                "contact": {
                  "email": "jane.smith@example.com",
                  "phone": "+1234567891",
                  "address": "456 Oak St, City"
                },
                "permissions": ["read"]
              }
            ]
          },
          {
            "name": "HR",
            "users": [
              {
                "name": "Alice Johnson",
                "birthdate": "1995-02-10",
                "nit": "456789123",
                "contact": {
                  "email": "alice.johnson@example.com",
                  "phone": "+1234567892",
                  "address": "789 Elm St, City"
                },
                "permissions": ["read", "write", "delete"]
              }
            ]
          }
        ]
      }
      ';


    public function process()
    {
        // Json converted into an Array
        $data = json_decode($this->json, true);
        info($data);

        $result = [];

        /* Start of example on access to element (you can remove it)

        $firstDeparmentUsers= $data['departments'][0]['users'];
        $firstUserName= $firstDeparmentUsers[0]['name'];

        End of example */

        // Write your code here

        // use $this->createUser(...) to save the user in the database


        // End of your code

        $allUsers = User::get();
        return $allUsers;
    }

    protected function createUser($name, $birthdate, $nit, $email)
    {
        $user = [
            'name' => $name,
            'birthdate' => $birthdate,
            'nit' => $nit,
            'email' => $email,
        ];

        User::create($user);

        return $user;
    }
}
