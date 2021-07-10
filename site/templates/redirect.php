<?php

// from: _init.php

// This page will redirect
// Normally used for forms
$session->message("We set the Flash Data and Redirected!");

// If we use a PUT PATCH OR DELETE the status code must be 303
$inertia->redirect($pages->get("/")->url);

// to: _main.php
