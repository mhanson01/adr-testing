<?php namespace Support;

class Str {

    public static function startsWith($haystack, $needle)
    {
        if (strpos($haystack, $needle) === 0) return true;

        return false;
    }

} 