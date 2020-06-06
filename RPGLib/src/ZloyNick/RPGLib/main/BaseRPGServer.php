<?php

declare(strict_types=1);

namespace ZloyNick\RPGLib\main;

use ZloyNick\RPGLib\event\package\PlayerClassChangeEvent;
use ZloyNick\RPGLib\interfaces\main\IRPGServer;
use ZloyNick\RPGLib\player\BasePlayer;

class BaseRPGServer implements IRPGServer
{

    /** @var null|RPGServerLoader */
    private $serverLoader = null;

    /**
     * @inheritDoc
     */
    public function load(): void
    {
        self::setPlayerClass(BasePlayer::class);
    }

    /**
     * @inheritDoc
     */
    public function init(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function start(): void
    {
        // TODO: Implement start() method.
    }

    /**
     * @inheritDoc
     */
    public function close(): void
    {
        // TODO: Implement close() method.
    }

    /**
     * BaseRPGServer constructor.
     * @param RPGServerLoader $loader
     */
    public function __construct(RPGServerLoader $loader)
    {
        $this->serverLoader = $loader;
    }











    /** @var null|string */
    private static $playerClass = null;

    public static function getPlayerClass() : string
    {
        return static::$playerClass;
    }

    public static function setPlayerClass(string $class) : bool
    {
        $ev = new PlayerClassChangeEvent($class);
        $ev->call();
        if($ev->isCancelled() && static::$playerClass != null)
            return false;

        static::$playerClass = $ev->getPlayerClass();
    }
}