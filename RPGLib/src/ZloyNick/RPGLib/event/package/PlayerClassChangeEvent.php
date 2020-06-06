<?php


namespace ZloyNick\RPGLib\event\package;


use pocketmine\event\Cancellable;
use pocketmine\event\Event;
use ZloyNick\RPGLib\error\event\EventException;
use ZloyNick\RPGLib\interfaces\player\IPlayer;

class PlayerClassChangeEvent extends Event implements Cancellable
{

    /** @var null|string */
    private $player = null;

    /**
     * SoftInitEvent constructor.
     * @param string $playerClass
     */
    public function __construct(string $playerClass)
    {
        $this->player = $playerClass;
    }

    /**
     * @param IPlayer $package
     * @throws EventException
     */
    public function setPlayer(IPlayer $package)
    {
        $this->setPlayerClass(get_class($package));
    }

    /**
     * Parameter 1 of this method must be instance of IPlayer
     *
     * @param string $className
     * @throws EventException
     */
    public function setPlayerClass(string $className) : void
    {
        if(!is_subclass_of(IPlayer::class, $className))
        {
            throw new EventException('Parameter 1 of function SoftInitEvent::setPackageClass() must be instance of '.get_class(IPlayer::class).'!\n'.$className.' given.');
        }

        /** @var IPlayer $package */
        $this->player = $className;
    }

    /**
     * @return string
     */
    public function getPlayerClass() : string
    {
        return $this->player;
    }

}