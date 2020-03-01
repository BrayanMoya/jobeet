<?php

/**
 * sfJobeetAffiliate module configuration.
 *
 * @package    jobeet
 * @subpackage sfJobeetAffiliate
 * @author     Your name here
 * @version    SVN: $Id$
 */
class affiliateGeneratorConfiguration extends BaseAffiliateGeneratorConfiguration
{
    public function getFilterDefaults()
    {
        return array('is_active' => '0');
    }
}
