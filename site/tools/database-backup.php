<?php namespace ProcessWire;

include_once(__DIR__ . '/../../index.php');

$backup = wire('database')->backups();
$file = $backup->backup();
if($file) {
  echo "Backed up to: $file";
} else {
  echo "Backup failed: " . implode("<br>", $backup->errors());
}
