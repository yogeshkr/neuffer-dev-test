<?php

function load_factory($class_name): void
{
  $path_to_file = str_replace('\\', '/', $class_name) . '.php';
    if (file_exists($path_to_file)) {

        require $path_to_file;
    }
}

function load_interfaces($class_name): void
{
    $path_to_file = str_replace('\\', '/', $class_name) . '.php';

    if (file_exists($path_to_file)) {
        require $path_to_file;
    }
}

function load_logger($class_name): void
{
    $path_to_file = str_replace('\\', '/', $class_name) . '.php';

    if (file_exists($path_to_file)) {
        require $path_to_file;
    }
}

function load_operations($class_name): void
{
    $path_to_file = str_replace('\\', '/', $class_name) . '.php';
    if (file_exists($path_to_file)) {
        require $path_to_file;
    }
}

function load_processors($class_name): void
{
    $path_to_file = str_replace('\\', '/', $class_name) . '.php';

    if (file_exists($path_to_file)) {
        require $path_to_file;
    }
}

spl_autoload_register('load_factory');
spl_autoload_register('load_interfaces');
spl_autoload_register('load_logger');
spl_autoload_register('load_operations');
spl_autoload_register('load_processors');
