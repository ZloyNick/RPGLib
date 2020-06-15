<?php

declare(strict_types=1);

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\Player as PocketMine_PLayer;
use ZloyNick\data\LangContainer;
use ZloyNick\data\PlayerList;
use ZloyNick\RPGLib\interfaces\player\IPlayer;
use ZloyNick\RPGLib\main\RPGServerLoader;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;

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
            return;
        }

        PlayerList::addPlayer($player);
    }

    /**
     * @param PlayerJoinEvent $event
     */
    public function callPlayerJoinEvent(PlayerJoinEvent $event) : void
    {
        $this->getPlayerFromObject($event->getPlayer())->spawn();
    }

    /**
     * @param PocketMine_PLayer $player
     * @return IPlayer|null
     */
    public function getPlayerFromObject(PocketMine_PLayer $player): ?IPlayer
    {
        return PlayerList::getPlayer($player->getName());
    }

    /**
     * @param PlayerQuitEvent $event
     * @return void
     */
    public function callPlayerQuitEvent(PlayerQuitEvent $event) : void
    {
        PlayerList::removePlayer($event->getPlayer()->getName());
    }

}