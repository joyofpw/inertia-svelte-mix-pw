<?php

// from: _init.php

// disable normal rendering
$render = false;

// get json input from inertia
$data = $inertia->input();

if(!count($data)) {
    return $inertia->location($pages->get("/")->url);
}

// Form validation example
// with client redirect if using GET method

$valid = trim(strtolower($data["name"])) == "ryan";

if (!$valid) {
    $errors = [
        "name" => "Is not valid. Try using Ryan"
    ];

    // Fill the errors variable in inertia for the form
    return $inertia->empty()->validation($errors)->redirect($pages->get("/hello")->url);
}

// Return a normal json response
return $inertia
    ->empty()
    ->with([
        "success" => true,
        "name" => "Ryan",
        "surname" => "Cramer"
    ])
    ->redirect($pages->get("/hello")->url);

// to: _main.php
