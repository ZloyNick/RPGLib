<?php

declare(strict_types=1);

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\Player as PocketMine_PLayer;

use ZloyNick\RPGLib\main\RPGServerLoader;
use ZloyNick\RPGLib\interfaces\player\IPlayer;

class EventCatcher implements Listener
{

    /** @var null|RPGServerLoader */
    private $loader = null;

    /**
     * EventCatcher constructor.
     * @param RPGServerLoader $loader
     */
    final public function __construct(RPGServerLoader $loader)
    {
        $this->loader = $loader;
    }

    public static function getPlayerFromObject(PocketMine_PLayer $player) : ?IPlayer
    {

    }

    public function callPlayerPreLoginEvent(PlayerPreLoginEvent $event) : void
    {

    }

}