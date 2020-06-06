<?php

declare(strict_types=1);

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\Player as PocketMine_PLayer;
use ZloyNick\data\LangContainer;
use ZloyNick\data\PlayerList;
use ZloyNick\RPGLib\interfaces\player\IPlayer;
use ZloyNick\RPGLib\main\RPGServerLoader;

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

    /**
     * @param string $name
     * @return IPlayer|null
     */
    public function getPlayer(string $name): ?IPlayer
    {
        return PlayerList::getPlayer($name);
    }

    /**
     * @param PlayerPreLoginEvent $event
     */
    public function callPlayerPreLoginEvent(PlayerPreLoginEvent $event): void
    {
        if ($this->getPlayerFromObject($player = $event->getPlayer())) {
            $player->close("", LangContainer::getMessage("player-already-logged-in"));
            $player->close("", "");
            return;
        }

        PlayerList::addPlayer($player);
    }

    /**
     * @param PocketMine_PLayer $player
     * @return IPlayer|null
     */
    public function getPlayerFromObject(PocketMine_PLayer $player): ?IPlayer
    {
        return PlayerList::getPlayer($player->getName());
    }

}