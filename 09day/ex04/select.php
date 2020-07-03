<?php
    $file = 'list.csv';

    if (!file_exists($file)) {
        echo 'empty';
        return;
    }

    $arr = [];
    $content = file_get_contents($file);
    if ($content) {
        $lines = explode("\n", $content);
        foreach ($lines as $line) {
            $tasks = explode(';', $line);
            if (count($tasks) < 2) {
                continue;
            }
            $obj['id'] = $tasks[0];
            $obj['task'] = $tasks[1];
            array_push($arr, $obj);
        }
    } else {
        echo 'empty';
        return;
    }

    if (count($arr) < 1) {
        echo 'empty';
        return;
    }

    echo json_encode($arr);
?>