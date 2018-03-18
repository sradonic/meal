<?php

namespace App\Model;

class ResourceCheck
{
    public static function categoriesExists($request)
    {
        if(strpos($request->with, 'category') !== false) {
            return true;
        }

        return false;
    }

    public static function tagsExists($request)
    {
        if(strpos($request->with, 'tags') !== false) {
            return true;
        }

        return false;
    }

    public static function ingredientsExists($request)
    {
        if(strpos($request->with, 'ingredients') !== false) {
            return true;
        }

        return false;
    }
}