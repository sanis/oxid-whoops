<?php

class whoops_oxshopcontrol extends whoops_oxshopcontrol_parent
{
    /**
     * @var whoops_oxexceptionhandler Whoops run object
     */
    protected $whoops;

    /**
     * Sets default exception handler.
     * Ideally all exceptions should be handled with try catch and default exception should never be reached.
     *
     * @return null;
     */
    protected function _setDefaultExceptionHandler()
    {
        if (isset($this->_blHandlerSet)) {
            return;
        }

        $this->whoops = oxNew('oxexceptionhandler', $this->_isDebugMode());
        set_exception_handler([$this->whoops, 'handleUncaughtException']);
    }

    /**
     * render oxView object
     *
     * @param oxView $oViewObject view object to render
     *
     * @return string
     */
    protected function _render($oViewObject)
    {
        $sTemplateName = $oViewObject->render();
        $sTemplateFile = $this->getConfig()->getTemplatePath($sTemplateName, $this->isAdmin());
        if ($this->whoops->showExtendedExceptionInfo() && !file_exists($sTemplateFile)) {

            $oEx = oxNew('oxSystemComponentException');
            $oEx->setMessage('EXCEPTION_SYSTEMCOMPONENT_TEMPLATENOTFOUND' . " Template: " . $sTemplateName);
            $oEx->setComponent($sTemplateName);
            $this->whoops->handleException($oEx);
        }

        return parent::_render($oViewObject);
    }

    /**
     * Shows exception message if debug mode is enabled, redirects otherwise.
     *
     * @param oxConnectionException $oEx message to show on exit
     */
    protected function _handleDbConnectionException($oEx)
    {
        if ($this->whoops->showExtendedExceptionInfo()) {
            $this->whoops->handleException($oEx);
        } else {
            parent::_handleDbConnectionException($oEx);
        }
    }

    /**
     * Shows exceptionError page.
     * possible reason: class does not exist etc. --> just redirect to start page.
     *
     * @param $oEx
     */
    protected function _handleSystemException($oEx)
    {
        if ($this->whoops->showExtendedExceptionInfo()) {
            $this->whoops->handleException($oEx);
        } else {
            parent::_handleSystemException($oEx);
        }
    }

    /**
     * Redirect to start page, in debug mode shows error message.
     *
     * @param $oEx
     */
    protected function _handleCookieException($oEx)
    {
        if ($this->whoops->showExtendedExceptionInfo()) {
            $this->whoops->handleException($oEx);
        } else {
            parent::_handleCookieException($oEx);
        }
    }

    /**
     * Catching other not caught exceptions.
     *
     * @param oxException $oEx
     */
    protected function _handleBaseException($oEx)
    {
        if ($this->whoops->showExtendedExceptionInfo()) {
            $this->whoops->handleException($oEx);
        } else {
            parent::_handleBaseException($oEx);
        }
    }
}
