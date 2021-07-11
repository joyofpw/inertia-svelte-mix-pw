<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->root ?>public<?php echo mix('/css/app.css') ?>" />
        <script src="<?php echo $config->urls->root ?>public<?php echo mix('/js/app.js') ?>" defer></script>
    </head>
    <body>
        <?php echo $inertia->tag ?>
    </body>
</html>