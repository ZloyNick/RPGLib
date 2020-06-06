<?php

declare(strict_types=1);

namespace ZloyNick\RPGLib\main;

use pocketmine\plugin\PluginBase as LoaderBase;
use ZloyNick\RPGLib\event\package\SoftInitEvent;

class RPGServerLoader extends LoaderBase
{
    /** @var null|RPGServerLoader */
    private static $main = null;

    /** @var null */
    private $software = null;

    public function onEnable()
    {
        $ev = new SoftInitEvent(BaseRPGServer::class);
        $ev->call();

        $class = $ev->getPackageClass();
        $this->software = new $class($this);
    }

    public function onDisable()
    {

    }

}