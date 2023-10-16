<?php
$registerRules = [
    "fname" => [
          "name" => "First name",
          "required" => true,
          "minlength" => 3,
          "maxlength" => 30,
          "regex" => [
          ]
       ],
    "lname" => [
        "name" => "Last name",
        "required" => true,
        "minlength" => 3,
        "maxlength" => 30,
        "regex" => [
        ]
    ],
    "email" => [
        "name" => "Email",
        "required" => true,
        "regex" => ['/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
        ]
    ],
    "pass" => [
        "name" => "Password",
        "required" => true,
        "minlength" => 8,
        "maxlength" => 30
    ],
    "cpass" => [
        "name" => "Confirm password",
        "required" => true,
        "minlength" => 8,
        "maxlength" => 30
    ],
    "phone" => [
        "name" => "Phone number",
        "required" => true,
        "minlength" => 3,
        "maxlength" => 30,
        "regex" => [
        ]
    ],
    "company_name" => [
        "name" => "Company's name",
        "required" => true,
        "minlength" => 3,
        "maxlength" => 100,
        "regex" => [
        ]
    ],
    "company_code" => [
        "name" => "Company's code",
        "required" => true,
        "minlength" => 3,
        "maxlength" => 30,
    ],
    "uname" => [
        "name" => "Username",
        "required" => true,
        "minlength" => 3,
        "maxlength" => 30,
        "regex" => ['/^[a-zA-Z0-9_-]{3,20}$/'
        ]
    ]
 ];
?>