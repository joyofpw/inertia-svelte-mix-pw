<?php

// Include LaravelMix helper functions
$files->include('_mix');

$inertia = $modules->get('Inertia');

// Maybe a better approach would be possible
// using $pages api
// but for this demo this is ok
$routes = [
    "routes" => [
        "home" => [
            "uri" => $pages->get("/")->url,
            "method" => ["GET"]
        ],
        "hello" => [
            "uri" => $pages->get("/hello")->url,
            "method" => ["GET"]
        ],
        "redirect" => [
            "uri" => $pages->get("/redirect")->url,
            "method" => ["GET"]
        ],
        "validation" => [
            "uri" => $pages->get("/validation")->url,
            "method" => ["POST"]
        ]
    ]
];

$inertia->setVersion(mixVersion())
        ->setView("inertia/app.view.php")
        ->share($routes);

// flag for default inertia rendering
$render = true;
