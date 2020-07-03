<?php
    $id = $_POST['id'] ?? '';
    $file = 'list.csv';

    if (!file_exists($file) || $id == '') {
        return;
    }

    $result = '';
    $content = file_get_contents($file);
    if ($content) {
        $lines = explode("\n", $content);
        foreach ($lines as $line) {
            $tasks = explode(';', $line);

            if (count($tasks) < 2 || $tasks[0] == $id) {
                continue;
            }
            $result .= "$line\n";
        }
    }

    file_put_contents($file, $result);
?>