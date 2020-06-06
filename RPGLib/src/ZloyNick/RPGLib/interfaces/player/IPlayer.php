<?php

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

    /**
     * Player's attributes initialize
     *
     * @return void
     */
    abstract protected static function initAttributes() : void;

    public function init() : void
    {
        static::initAttributes();
    }

}