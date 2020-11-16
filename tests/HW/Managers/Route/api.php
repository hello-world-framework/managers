<?php

return [
    "GET" => [
        "/users" => [
            "name" => "users",
            "target" => ["api.users.controller", "index"]
        ],
        "/user/{id}" => [
            "name" => "user.show",
            "target" => ["api.users.controller", "show"],
            "filter" => [
                "id" => "[0-9]+"
            ]
        ]
    ],

    "POST" => [
        "/user" => [
            "name" => "user.store",
            "target" => ["api.users.controller", "store"]
        ]
    ],

    "PATCH" => [
        "/user/{id}" => [
            "name" => "user.update",
            "target" => ["api.users.controller", "update"],
            "filter" => [
                "id" => "[0-9]+"
            ]
        ]
    ],

    "DELETE" => [
        "/user/{id}" => [
            "name" => "user.delete",
            "target" => ["api.users.controller", "delete"],
            "filter" => [
                "id" => "[0-9]+"
            ]
        ]
    ]
];