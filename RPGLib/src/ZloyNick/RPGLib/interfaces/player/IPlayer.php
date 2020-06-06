<?php

//TODO: It is not interface. Need in move
declare(strict_types=1);

namespace ZloyNick\RPGLib\interfaces\player;

use pocketmine\Player as PocketMine_Player;

abstract class IPlayer
{

    /**
     * @var null|PocketMine_Player
     */
    private $personage_Holder = null;

    /**
     * IPlayer constructor.
     * @param PocketMine_Player $player
     */
    public function __construct(PocketMine_Player $player)
    {
        $this->personage_Holder = $player;
    }

    public function init(): void
    {
        static::initAttributes();
    }

    /**
     * Player's attributes initialize
     *
     * @return void
     */
    abstract protected static function initAttributes(): void;

    /**
     * Called, when players has been joined to the server
     *
     * @return void
     */
    abstract public function spawn() : void;

    /**
     * Calls when player has been leaved from game or server
     *
     * @return void
     */
    abstract public function logOut() : void;

}