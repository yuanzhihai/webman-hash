<?php

namespace yzh52521\hash;

/**
 * @method static array info(string $hashedValue)
 * @method static bool check(string $value, string $hashedValue, array $options = [])
 * @method static bool needsRehash(string $hashedValue, array $options = [])
 * @method static string make(string $value, array $options = [])
 * @method static extend($driver, \Closure $callback)
 *
 */
class Hash
{
    public static $_instance = null;

    public static function instance()
    {
        if (!static::$_instance) {
            static::$_instance = new \yzh52521\hash\hashing\Hash();
        }
        return static::$_instance;
    }


    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return static::instance()->{$name}(...$arguments);
    }
}