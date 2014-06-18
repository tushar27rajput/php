<?php
function pubnubAutoloader($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';

    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = strtolower(substr($className, 0, $lastNsPos));
        $className = substr($className, $lastNsPos + 1);
        $fileName .= str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }

    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require_once $fileName;
}

spl_autoload_register('pubnubAutoloader', true, true);