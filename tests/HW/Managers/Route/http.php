<?php

return [
    "GET" => [
        "/" => [
            "name" => "root",
            "target" => ["home.controller", "index"]
        ],
        "/index" => [
            "name" => "index",
            "target" => ["home.controller", "index"]
        ],
        "/home" => [
            "name" => "home",
            "target" => ["home.controller", "index"]
        ]
    ]
];