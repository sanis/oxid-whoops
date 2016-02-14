<?php

class whoops_oxexceptionhandler extends whoops_oxexceptionhandler_parent
{
    /**
     * @var \Whoops\Run
     */
    protected $whoops;

    /**
     * Class constructor
     *
     * @param integer $iDebug debug level
     */
    public function __construct($iDebug = 0)
    {
        parent::__construct($iDebug);

        if ($this->showExtendedExceptionInfo()) {
            $this->whoops = new Whoops\Run();
            $this->whoops->pushHandler(new Whoops\Handler\PrettyPageHandler());
            $this->whoops->register();
        }

    }

    /**
     * Determine if we should display extended exception info, e.g. when in debug or non-productive
     * shop mode or in admin area / backend of the shop.
     *
     * @return boolean
     */
    public function showExtendedExceptionInfo()
    {
        $config = oxRegistry::getConfig();

        return (($config->isAdmin() && $config->getUser()) || !$config->isProductiveMode() || $this->_iDebug);
    }

    /**
     * Handles uncaught exceptions
     *
     * @param Exception $oEx
     */
    public function handleUncaughtException(Exception $oEx)
    {
        if ($this->showExtendedExceptionInfo()) {
            $this->whoops->handleException($oEx);
        } else {
            parent::handleUncaughtException($oEx);
        }
    }

    /**
     * Handles given exceptions
     *
     * @param Exception $oEx
     */
    public function handleException(Exception $oEx)
    {
        $this->whoops->handleException($oEx);
    }
}
