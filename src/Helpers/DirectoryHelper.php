<?php

namespace TheJano\LaravelDomainDrivenDesign\Helpers;

class DirectoryHelper
{
    public static function deleteDirectory($dir)
    {
        if (! file_exists($dir)) {
            return true;
        }

        if (! is_dir($dir)) {
            return unlink($dir);
        }

        foreach (scandir($dir) as $item) {
            if ('.' === $item || '..' === $item) {
                continue;
            }

            if (! static::deleteDirectory($dir.\DIRECTORY_SEPARATOR.$item)) {
                return false;
            }
        }

        return rmdir($dir);
    }
}
