<?php


namespace ZloyNick\RPGLib\player;


use ZloyNick\RPGLib\interfaces\player\IPlayer;

class BasePlayer extends IPlayer
{

    /**
     * @inheritDoc
     */
    protected static function initAttributes(): void
    {

    }

    /**
     * @inheritDoc
     */
    public function spawn(): void
    {
        // TODO: Implement spawn() method.
    }

    /**
     * @inheritDoc
     */
    public function logOut(): void
    {
        // TODO: Implement logOut() method.
    }
}