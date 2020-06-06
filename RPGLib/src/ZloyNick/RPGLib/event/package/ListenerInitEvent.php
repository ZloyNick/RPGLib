<?php


namespace ZloyNick\RPGLib\event\package;


use pocketmine\event\Event;
use pocketmine\event\Listener;
use ZloyNick\RPGLib\error\event\EventException;
use ZloyNick\RPGLib\interfaces\main\IRPGServer;
use function get_class;
use function is_subclass_of;

class ListenerInitEvent extends Event
{

    /** @var null|string */
    private $listener = null;

    /**
     * SoftInitEvent constructor.
     * @param string $listener
     */
    public function __construct(string $listener)
    {
        $this->listener = $listener;
    }

    /**
     * @param Listener $package
     * @throws EventException
     */
    public function setListener(Listener $package): void
    {
        $this->setListenerClass(get_class($package));
    }

    /**
     * Parameter 1 of this method must be instance of Listener
     *
     * @param string $className
     * @throws EventException
     */
    public function setListenerClass(string $className): void
    {
        if (!is_subclass_of(Listener::class, $className)) {
            throw new EventException('Parameter 1 of function SoftInitEvent::setPackageClass() must be instance of ' . get_class(Listener::class) . '!\n' . $className . ' given.');
        }

        /** @var IRPGServer $package */
        $this->listener = $className;
    }

    /**
     * @return string
     */
    public function getListenerClass(): string
    {
        return $this->listener;
    }

}