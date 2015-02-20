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
 * Mage core cookie overwrite to secure the cache cookies
 */
class Etailer_SecureCookie_Model_Enterprise_Cookie extends Enterprise_PageCache_Model_Cookie
{
    /**
     * @see Mage_Core_Model_Cookie::isSecure()
     */
    public function isSecure()
    {
        if ($this->getStore()->isAdmin() || Mage::helper('etailersecurecookie')->checkSecureFrontend()) {
            return $this->_getRequest()->isSecure();
        }

        return false;
    }
}