<?php

declare(strict_types=1);

namespace ZloyNick\data;

use ZloyNick\data\config\Config;
use ZloyNick\RPGLib\main\RPGServerLoader;

final class LangContainer
{

    /** @var string[] */
    private static $lang = [];

    /**
     * @param string $k
     * @return string
     */
    public static function getMessage(string $k): string
    {
        if (isset(static::$lang[$k]))
            return isset(static::$lang[$k]);
        error_log("Undefined index {$k}");
        return 'undefined string offset';
    }

    /**
     * @param string $lang
     */
    private static function init(string $lang): void
    {
        $langConf = new Config(RPGServerLoader::main()->getDataFolder() . "{$lang}_lang.json", Config::JSON);
        static::$lang = $langConf->getAll(true);
    }

}