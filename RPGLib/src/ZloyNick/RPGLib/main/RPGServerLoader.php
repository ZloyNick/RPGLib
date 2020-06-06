<?php

declare(strict_types=1);

namespace ZloyNick\RPGLib\main;

use pocketmine\plugin\PluginBase as LoaderBase;
use ZloyNick\RPGLib\event\package\SoftInitEvent;
use ZloyNick\RPGLib\interfaces\main\IRPGServer;

class RPGServerLoader extends LoaderBase
{
    /** @var null|RPGServerLoader */
    private static $main = null;

    /** @var null|IRPGServer */
    private $software = null;

    /**
     * @return RPGServerLoader
     */
    public static function main(): RPGServerLoader
    {
        return static::$main;
    }

    /**
     * Plugin enabling
     *
     * @return void
     */
    public function onEnable(): void
    {
        static::$main = $this;

        $ev = new SoftInitEvent(BaseRPGServer::class);
        $ev->call();

        $class = $ev->getPackageClass();
        $this->software = new $class($this);
    }

    /**
     * @return IRPGServer
     */
    public function getRPG(): IRPGServer
    {
        return $this->software;
    }

    /**
     * Plugin disabling
     *
     * @return void
     */
    public function onDisable(): void
    {
        $this->software->close();
    }

}