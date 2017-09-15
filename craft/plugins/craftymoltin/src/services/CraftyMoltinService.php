<?php
/**
 * Crafty Moltin plugin for Craft CMS 3.x
 *
 * API wrapper for Moltin
 *
 * @link      https://www.vanmoof.com
 * @copyright Copyright (c) 2017 VanMoof
 */

namespace vanmoofcraftymoltin\craftymoltin\services;

use vanmoofcraftymoltin\craftymoltin\CraftyMoltin;

use Craft;
use craft\base\Component;

/**
 * CraftyMoltinService Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    VanMoof
 * @package   CraftyMoltin
 * @since     1.0.0
 */
class CraftyMoltinService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     CraftyMoltin::$plugin->craftyMoltinService->exampleService()
     *
     * @return mixed
     */
    public function exampleService()
    {
        $result = 'something';
        // Check our Plugin's settings for `someAttribute`
        if (CraftyMoltin::$plugin->getSettings()->someAttribute) {
        }

        return $result;
    }
}
