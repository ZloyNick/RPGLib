<?php

declare(strict_types=1);

namespace ZloyNick\RPGLib\main;

use ZloyNick\RPGLib\event\package\PlayerClassChangeEvent;
use ZloyNick\RPGLib\interfaces\main\IRPGServer;
use ZloyNick\RPGLib\player\BasePlayer;

class BaseRPGServer implements IRPGServer
{

    /** @var null|string */
    private static $playerClass = null;
    /** @var null|RPGServerLoader */
    private $serverLoader = null;

    /**
     * BaseRPGServer constructor.
     * @param RPGServerLoader $loader
     */
    public function __construct(RPGServerLoader $loader)
    {
        $this->serverLoader = $loader;
    }

    /**
     * Return ::class of current IPlayer class
     *
     * @return string
     */
    public static function getPlayerClass(): string
    {
        return static::$playerClass;
    }

    /**
     * API: You can change class while catching
     * Or use in your Main RPG class self::setPlayerClass()
     *
     * @param string $class
     * @return bool
     */
    public static function setPlayerClass(string $class): bool
    {
        $ev = new PlayerClassChangeEvent($class);
        $ev->call();

        //if is set player's ::class
        //when process will be cancelled if called setCancelled()
        //else => $playerClass couldn't be empty
        if ($ev->isCancelled() && static::$playerClass != null)
            return false;

        static::$playerClass = $ev->getPlayerClass();
        return true;
    }

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
}