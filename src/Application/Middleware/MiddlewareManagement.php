<?php

namespace app\Application\Middleware;

use app\Application\Service\Request;

class MiddlewareManagement
{
    private Request $request;
    private static array $middlewares;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return void
     */
    private static function loadMiddleware():void
    {
        if (is_file(__DIR__.'/middlewares.php')){
            self::$middlewares =  require_once('middlewares.php');
        }else{
            self::$middlewares =  [];
        }
    }

    /**
     * @param $class
     * @return false|mixed
     */
    public static function handler($class)
    {
        $key = array_search($class, self::$middlewares['middlewares']);
        if (array_key_exists($key+1, self::$middlewares['middlewares'])){
            return new self::$middlewares['middlewares'][$key+1];
        }
        return false;
    }

    /**
     * @return void
     */
    public function run()
    {
        self::loadMiddleware();

        if (self::$middlewares['middlewares'][0]){
            $class = self::$middlewares['middlewares'][0];

            if (class_exists($class)){
                $class = new $class;
                if (method_exists($class, 'handle')){
                    $class->handle($this->request);
                }
            }
        }
    }
}