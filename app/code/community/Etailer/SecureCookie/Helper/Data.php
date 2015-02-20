<?php
/**
 * This file is part of the mage-secure-cookie Magento extension.
 * 
 * mage-secure-cookie is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * mage-secure-cookie is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public License
 * along with mage-secure-cookie.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author    Axel Helmert <ah@luka.de>
 * @copyright Copyright (c) 2012 LUKA netconsult GmbH (www.luka.de)
 * @license   http://www.gnu.org/licenses/lgpl-3.0.txt
 * @version   $Id$
 */

/**
 * Default Data helper
 */
class Etailer_SecureCookie_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * XML path to cookie config "secure"
     */
    const XML_PATH_COOKIE_SECURE = 'web/cookie/cookie_secure';

    /**
     * Store object
     *
     * @var Mage_Core_Model_Store|null
     */
    protected $_store;

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
    public function checkSecureFrontend()
    {
        $store = $this->getStore();
        if (!$store->getConfig(self::XML_PATH_COOKIE_SECURE) || !$store->getConfig(Mage_Core_Model_Store::XML_PATH_SECURE_IN_FRONTEND)) {
            return false;
        }

        $baseLinkUrl = $store->getConfig(Mage_Core_Model_Store::XML_PATH_UNSECURE_BASE_LINK_URL);
        return (substr($baseLinkUrl, 0, 8) == 'https://');
    }

    /**
     * Retrieve Store object
     *
     * @return Mage_Core_Model_Store
     */
    public function getStore()
    {
        if (is_null($this->_store)) {
            $this->_store = Mage::app()->getStore();
        }
        return $this->_store;
    }
}