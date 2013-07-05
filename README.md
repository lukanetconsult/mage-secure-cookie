# Secure Cookie Magento Module

This module allows to secure the frontend cookie for stores that will run the entire site on https.
This module is sponsored by [offtheback.co.nz](http://www.offtheback.co.nz/)

# Support

If you've found a bug, please open an [issue](https://github.com/lukanetconsult/mage-secure-cookie/issues) at the project page on github.

For paid support in installation, resolving conflicts or professional Magento hosting, please contact us via e-mail at info@luka.de.

# Installation

TBD: This module will be published to magento connect when completed.

## Configuration

After installing this module, you'll have an additional option to turn on secure cookies under System > Configuration > Web > Session Cookie Management in the Magento admin panel.
Please not that this setting will mark the frontend cookie "Secure", only when the following conditions are met:

* The unsecure base link url starts with "https://"
* The system config Web > Secure > Use Secure URLs in Frontend is set to "yes" 

# Possible Compatibility Issues

## Core Rewrites

This module uses Magento's rewrite feature to extend the cookie model. There is no other option to implement this feature. 
The following classes are rewritten:

* core/cookie -> Etailer_SecureCookie_Model_Cookie

> __IMPORTANT:__ Magento class rewrites may cause conflicts with 3rd party extension. We try to avoid them whenever possible, but sometimes there is no other choice.

