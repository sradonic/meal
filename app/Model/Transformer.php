<?php

namespace App\Model;

class Transformer
{
    public static function transformForScope($arg)
    {
        if(strpos($arg, ',') !== false)
        {
            $new = array_map('intval', explode(',', $arg ));
        }
        else
            {
            $new = explode(',', $arg);
        }
        return $new;
    }
}