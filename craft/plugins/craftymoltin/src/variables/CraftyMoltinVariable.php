<?php
/**
 * Crafty Moltin plugin for Craft CMS 3.x
 *
 * API wrapper for Moltin
 *
 * @link      https://www.vanmoof.com
 * @copyright Copyright (c) 2017 VanMoof
 */

namespace vanmoofcraftymoltin\craftymoltin\variables;

use vanmoofcraftymoltin\craftymoltin\CraftyMoltin;

use Craft;

/**
 * Crafty Moltin Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.craftyMoltin }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    VanMoof
 * @package   CraftyMoltin
 * @since     1.0.0
 */
class CraftyMoltinVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Whatever you want to output to a Twig template can go into a Variable method.
     * You can have as many variable functions as you want.  From any Twig template,
     * call it like this:
     *
     *     {{ craft.craftyMoltin.exampleVariable }}
     *
     * Or, if your variable requires parameters from Twig:
     *
     *     {{ craft.craftyMoltin.exampleVariable(twigValue) }}
     *
     * @param null $optional
     * @return string
     */
    public function exampleVariable($optional = null)
    {
        $result = "And away we go to the Twig template...";
        if ($optional) {
            $result = "I'm feeling optional today...";
        }
        return $result;
    }
}
