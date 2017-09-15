<?php
/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here. You can see a
 * list of the available settings in vendor/craftcms/cms/src/config/GeneralConfig.php.
 */

return [
    // Global settings
    '*' => [
        // Default Week Start Day (0 = Sunday, 1 = Monday...)
        'defaultWeekStartDay' => 0,

        // Enable CSRF Protection (recommended, will be enabled by default in Craft 3)
        'enableCsrfProtection' => true,

        // Whether "index.php" should be visible in URLs
        'omitScriptNameInUrls' => true,

        // Control Panel trigger word
        'cpTrigger' => 'admin',
    ],

    // Dev environment settings
    '*.dev' => [
        // Dev Mode (see https://craftcms.com/support/dev-mode)
        'devMode' => true,
        'enableTemplateCaching' => false,
        'siteUrl' => "http://crafty.dev",
        'environmentVariables' => array(
          // siteUrl is set automatically based on server name (see above):
          // Use it to, eg. set assets location: {siteUrl}/assets
          'siteUrl'  => "crafty.dev"
        ),
    ],

    // Staging environment settings
    'staging' => [
        // Base site URL
        'siteUrl' => null,
    ],

    // Production environment settings
    'production' => [
        // Base site URL
        'siteUrl' => null,
    ],
];
