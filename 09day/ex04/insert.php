<?php
    $id = $_POST['id'] ?? '';
    $task = $_POST['task'] ?? '';
    $file = 'list.csv';

    if ($id == '') {
        return;
    }

    $content = "$id;$task\n";
    file_put_contents($file, $content, FILE_APPEND);
?>