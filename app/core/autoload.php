<?php

function myAutoload($className) {

    $found = searchFile("app", $className);

    if (!$found) {
        throw new Exception("cannot include file for class " . $className);
    }
}

function searchFile($dir, $className) {
    $found = false;
    $filePath = $dir . "/" . $className . ".php";

    if (file_exists($filePath)) {
        require_once($filePath);
        $found = true;
    } else {
        $files = scandir($dir);

        foreach ($files as $file) {
            $subdir = $dir . "/" . $file;
            
            if (is_dir($subdir) && $file != "." && $file != "..") {
                $found = searchFile($subdir, $className);

                if ($found) {
                    break;
                }
            }
        }
    }

    return $found;
}

?>
