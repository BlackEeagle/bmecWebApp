<?php

/**
 * Description of ArrayUtil
 *
 * @author Thom
 */
class ArrayUtil {

    public static function dot(array &$arr, $path = null, $checkEmpty = true, $emptyResponse = false) {

        // Check path
        if (!$path) {
            throw new Exception("Missing array path for array");
        }

        // Vars
        $pathElements = explode(".", $path);
        $path = &$arr;

        // Go through path elements
        foreach ($pathElements as $e) {
            // Check set
            if (!isset($path[$e])) {
                return $emptyResponse;
            }

            // Check empty
            if ($checkEmpty and empty($path[$e])) {
                return $emptyResponse;
            }

            // Update path
            $path = &$path[$e];
        }

        // Everything checked out, return value
        return $path;
    }

}

?>
