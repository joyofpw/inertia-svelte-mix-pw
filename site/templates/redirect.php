<?php

// from: _init.php

// This page will redirect
// Normally used for forms
$session->message("We set the Flash Data and Redirected!");

// If we use a PUT PATCH OR DELETE the status code must be 303
// Thats why we use the inertia->redirect() to consider that use case.
$inertia->redirect($config->urls->root);

// to: _main.php
