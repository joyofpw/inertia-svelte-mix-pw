<?php

if (!isset($disableInertia)) {
    echo $inertia->render($component, $properties);
    $session->removeNotices();
}
