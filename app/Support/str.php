<?php

use Illuminate\Support\Str;

if (! function_exists('classNameToTitleCase')) {
    function classNameToTitleCase($string)
    {
        return Str::title(str_replace('-', ' ', Str::kebab(class_basename($string))));
    }
}

if (! function_exists('uuid')) {
    function uuid()
    {
        return Str::uuid();
    }
}
