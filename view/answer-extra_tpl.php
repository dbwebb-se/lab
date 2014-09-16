<?php

$filename   = "config/$course/{$lab}_extra.tar";
$empty      = "config/empty.tar";

header('Content-type: archive/tar');
header('Content-Disposition: attachment; filename="extra.tar"');

if (is_file($filename)) {
    readfile($filename);
} else {
    readfile($empty);
}
