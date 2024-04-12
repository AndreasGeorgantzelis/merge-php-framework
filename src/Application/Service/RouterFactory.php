<?php

namespace app\Application\Service;

use app\Application\Interfaces\RouterInterface;

class RouterFactory
{
    public static function create() : RouterInterface {
        if (class_exists('altorouter/altorouter')){
            return new MergeRouter();
        } else {
//            make a fallback router
            return new MergeRouter();
        }
    }
}