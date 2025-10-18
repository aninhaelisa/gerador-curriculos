<?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $uploadDir = 'uploads/';
    if (!is_dir(filename: $uploadDir)) {
        mkdir(directory: $uploadDir,0775, true);
    }
 }