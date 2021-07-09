<?php

// Include LaravelMix helper functions
$files->include('_mix');

$inertia = $modules->get('Inertia');
$inertia->version(mixVersion())
        ->shareMap([
            "routes" => [
                "home" => [
                    "uri" => $pages->get("/")->url,
                    "method" => ["GET"]
                ],
                "hello" => [
                    "uri" => $pages->get("/hello")->url,
                    "method" => ["GET"]
                ]
            ]
        ]);