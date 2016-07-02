<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhancao
 * Date: 5/27/16
 * Time: 8:01 PM
 */
class Loader
{
    private static $baseFiles = [APP_DIR . 'models/db/MBase.php', APP_DIR . 'helpers/Jsonx.php'];

    public static function loadBaseFiles()
    {
        foreach (Loader::$baseFiles as $path) {
            require_once($path);
        }
    }

    /**
     * @param $dir
     */
    public static function loadAllFiles($dir)
    {
        if ($handle = opendir($dir)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != ".." && strpos($entry, '.php') !== false && !in_array($dir . '/' . $entry, Loader::$baseFiles)) {
                    require_once($dir . '/' . $entry);
                }
            }
            closedir($handle);
        }
    }
}