<?php

namespace Rgergo67\Laravel\Settings\App\Facades;

use Illuminate\Support\Facades\Facade;

class Setting extends Facade
{

    protected static function getFacadeAccessor() { return 'setting'; }

    /**
     * Resolve a new instance
     */
    public static function __callStatic($method, $args)
    {
        $instance = static::$app->make(static::getFacadeAccessor());

        switch (count($args))
        {
            case 0:
                return $instance->$method();

            case 1:
                return $instance->$method($args[0]);

            case 2:
                return $instance->$method($args[0], $args[1]);

            case 3:
                return $instance->$method($args[0], $args[1], $args[2]);

            case 4:
                return $instance->$method($args[0], $args[1], $args[2], $args[3]);

            default:
                return call_user_func_array(array($instance, $method), $args);
        }
    }

}