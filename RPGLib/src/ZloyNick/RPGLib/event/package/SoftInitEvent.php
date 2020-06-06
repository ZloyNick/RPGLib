<?php

declare(strict_types=1);

/*
 *
 * This event is called when the main class for working with the RPG server is declared
 *
 */

namespace ZloyNick\RPGLib\event\package;

use pocketmine\event\Event;
use ZloyNick\RPGLib\interfaces\main\IRPGServer;
use ZloyNick\RPGLib\error\event\EventException;

use function is_subclass_of;
use function get_class;

class SoftInitEvent extends Event
{

    /** @var null|string */
    private $package = null;

    /**
     * SoftInitEvent constructor.
     * @param IRPGServer $package
     */
    public function __construct(string $package)
    {
        $this->package = $package;
    }

    /**
     * @param IRPGServer $package
     * @throws EventException
     */
    public function setPackage(IRPGServer $package)
    {
        $this->setPackageClass(get_class($package));
    }

    /**
     * Parameter 1 of this method must be instance of IRPGServer
     *
     * @param string $className
     * @throws EventException
     */
    public function setPackageClass(string $className) : void
    {
        if(!is_subclass_of(IRPGServer::class, $className))
        {
            throw new EventException('Parameter 1 of function SoftInitEvent::setPackageClass() must be instance of '.get_class(IRPGServer::class).'!\n'.$className.' given.');
        }

        /** @var IRPGServer $package */
        $this->package = $className;
    }

    /**
     * @return string
     */
    public function getPackageClass() : string
    {
        return $this->package;
    }

}