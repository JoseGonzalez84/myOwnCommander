<?php

namespace myOwnCommander\Source;

use Exception;

/**
 * Auxiliary Functions class.
 */
class Functions
{
    public static function parentDirectory(string $actualDirectory): string {
        $tmpPath = explode('\\', $actualDirectory);
        unset($tmpPath[count($tmpPath)-1]);
        return implode('\\', $tmpPath);
    }

    /**
     * 
     */
    public static function messageToast(string $type, string $message) {
    }

    /**
     * 
     */
    public static function filelist(string $actualPath=__DIR__) {
        try {
            if ($folderHandler = opendir($actualPath)) {
                //$output = '<ul class="fileList">';
                $output = '';
                while (false !== ($file = readdir($folderHandler))) {
                    // Don't show this information.
                    if ($file === '.' || $file === '..') {
                        continue;
                    }
                    // Check if this is a file or folder (for behavior).
                    if (is_file($actualPath.'\\'.$file) === false) {
                        $type = ICON_TYPE_FOLDER;
                    } else {
                        //$mime = mime_content_type($actualPath.'\\'.$file);
                        $type = ICON_TYPE_FILE;
                    }

                    $line = new Line($file, $actualPath, $type);
                    $output .= $line->draw();
                }
                //$output .= '</ul>';
                closedir($folderHandler);
            }

            return $output;
        } catch (Exception $ex) {
            var_dump($ex->getMessage());
        }
    }
}