<?php

declare(strict_types=1);

namespace ZloyNick\RPGLib\main;

use ZloyNick\RPGLib\interfaces\main\IRPGServer;

class BaseRPGServer implements IRPGServer
{

    /** @var null|RPGServerLoader */
    private $serverLoader = null;

    /**
     * @inheritDoc
     */
    public function load(): void
    {
        // TODO: Implement load() method.
    }

    /**
     * @inheritDoc
     */
    public function init(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function start(): void
    {
        // TODO: Implement start() method.
    }

    /**
     * @inheritDoc
     */
    public function close(): void
    {
        // TODO: Implement close() method.
    }

    public function __construct(RPGServerLoader $loader)
    {
        $this->serverLoader = $loader;
    }
}