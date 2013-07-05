<?php
/**
 * $license_text$
 *
 * @author    Axel Helmert <ah@luka.de>
 * @copyright Copyright (c) 2012 LUKA netconsult GmbH (www.luka.de)
 * @license   $license$
 * @version   $Id$
 */

/**
 * Mage core cookie overwrite to secure the frontend cookie
 */
class Etailer_SecureCookie_Model_Cookie extends Mage_Core_Model_Cookie
{
    /**
     * XML path to cookie config "secure"
     */
    const XML_PATH_COOKIE_SECURE = 'web/cookie/cookie_secure';

    /**
     * Check for a secure frontend
     *
     * This only applies if
     *
     * 1. The secure cookie Option is turned on in the store config.
     * 2. "Use secure urls in Frontend" is turned on in the store config
     * 3. The unsecure base URL is a https:// url
     *
     * @return boolean
     */
    protected function _checkSecureFrontend()
    {
        $store = $this->getStore();
        if (!$store->getConfig(self::XML_PATH_COOKIE_SECURE) || !$store->getConfig(Mage_Core_Model_Store::XML_PATH_SECURE_IN_FRONTEND)) {
            return false;
        }

        $baseLinkUrl = $store->getConfig(Mage_Core_Model_Store::XML_PATH_UNSECURE_BASE_LINK_URL);
        return (substr($baseLinkUrl, 0, 8) == 'https://');
    }

    /**
     * @see Mage_Core_Model_Cookie::isSecure()
     */
    public function isSecure()
    {
        if ($this->getStore()->isAdmin() || $this->_checkSecureFrontend()) {
            return $this->_getRequest()->isSecure();
        }

        return false;
    }
}