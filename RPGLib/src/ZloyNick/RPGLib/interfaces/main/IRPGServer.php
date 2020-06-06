<?php

declare(strict_types=1);

namespace ZloyNick\RPGLib\interfaces\main;

use ZloyNick\RPGLib\error\RpgException;
use ZloyNick\RPGLib\main\RPGServerLoader;

interface IRPGServer
{

    public function __construct(RPGServerLoader $loader);

    /**
     * Loads classes and modules.
     * It's step I.
     *
     * @return void
     */
    public function load(): void;

    /**
     * Initialises configuration files.
     * It's step II.
     *
     * @return bool
     * @throws RpgException
     */
    public function init(): bool;

    /**
     * Final step of starting RPGServer
     *
     *
     * @return void
     */
    public function start(): void;

    /**
     * Disabling RPGServer
     *
     * @return void
     */
    public function close(): void;

}