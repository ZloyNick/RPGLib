<?php

declare(strict_types=1);

namespace ZloyNick\data;

use pocketmine\Player as PocketMine_PLayer;
use ZloyNick\RPGLib\interfaces\player\IPlayer;
use ZloyNick\RPGLib\main\BaseRPGServer;
use function strtolower;

final class PlayerList
{

    /** @var IPlayer[] */
    private static $list = [];

    /**
     * @param string $name
     * @return IPlayer|null
     */
    public static function getPlayer(string $name): ?IPlayer
    {
        return
            isset(static::$list[$lName = strtolower($name)]) ? static::$list[$lName] : null;
    }

    /**
     * @param PocketMine_PLayer $player
     */
    public static function addPlayer(PocketMine_PLayer $player): void
    {
        $class = BaseRPGServer::getPlayerClass();
        $player = &(static::$list[strtolower($player->getName())] = new $class($player));
        /** @var IPlayer $player */
        $player->init();
    }

    /**
     * @param string $name
     */

    public static function removePlayer(string $name) : void
    {
        $player = static::$list[strtolower($name)];
        $player->logOut();
        unset(static::$list[strtolower($name)]);
    }

}