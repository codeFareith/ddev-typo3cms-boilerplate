<?php

$globalsRef = &$GLOBALS;
$applicationContext = \TYPO3\CMS\Core\Core\Environment::getContext()->__toString();
$ddevProject = getenv('DDEV_PROJECT');
$ddevTld = getenv('DDEV_TLD');
$timezone = getenv('TZ');

switch ($applicationContext) {

    case (preg_match('/^Production(\/.*)?/', $applicationContext)):
        $globalsRef['TYPO3_CONF_VARS']['FE']['versionNumberInFilename'] = 'embed';
        $globalsRef['TYPO3_CONF_VARS']['FE']['compressionLevel'] = 9;

        $globalsRef['TYPO3_CONF_VARS']['BE']['versionNumberInFilename'] = true;
        $globalsRef['TYPO3_CONF_VARS']['BE']['compressionLevel'] = 9;

        $globalsRef['TYPO3_CONF_VARS']['SYS']['fileCreateMask'] = '0660';
        $globalsRef['TYPO3_CONF_VARS']['SYS']['folderCreateMask'] = '2770';
        $globalsRef['TYPO3_CONF_VARS']['SYS']['ipAnonymization'] = 2;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['binPath'] = '/usr/bin';
        $globalsRef['TYPO3_CONF_VARS']['SYS']['enableDeprecationLog'] = 0;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['syslogErrorReporting'] = 0;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['belogErrorReporting'] = 0;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['systemLogLevel'] = 4;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['sqlDebug'] = false;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['no_pconnect'] = 1;

        /* no break */

    case (preg_match('/^Testing(\/.*)?/', $applicationContext)):

        /* no break */

    case (preg_match('/^Development(\/.*)?/', $applicationContext)):
        $globalsRef['TYPO3_CONF_VARS']['FE']['debug'] = true;

        $globalsRef['TYPO3_CONF_VARS']['BE']['debug'] = true;

        $globalsRef['TYPO3_CONF_VARS']['SYS']['displayErrors'] = 1;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['exceptionalErrors'] = 12290;

        /* no break */

    case (preg_match('/(.*\/)?Local$/', $applicationContext)):
        $globalsRef['TYPO3_CONF_VARS']['FE']['cookieDomain'] = '.' . $ddevProject . '.' . $ddevTld;

        $globalsRef['TYPO3_CONF_VARS']['BE']['cookieDomain'] = '.' . $ddevProject . '.' . $ddevTld;
        $globalsRef['TYPO3_CONF_VARS']['BE']['showRefreshLoginPopup'] = true;
        $globalsRef['TYPO3_CONF_VARS']['BE']['lockSSL'] = true;

        $globalsRef['TYPO3_CONF_VARS']['MAIL']['transport'] = 'smtp';
        $globalsRef['TYPO3_CONF_VARS']['MAIL']['transport_sendmail_command'] = false;
        $globalsRef['TYPO3_CONF_VARS']['MAIL']['transport_smtp_encrypt'] = '';
        $globalsRef['TYPO3_CONF_VARS']['MAIL']['transport_smtp_password'] = '';
        $globalsRef['TYPO3_CONF_VARS']['MAIL']['transport_smtp_server'] = '127.0.0.1:1025';
        $globalsRef['TYPO3_CONF_VARS']['MAIL']['transport_smtp_username'] = '';

        $globalsRef['TYPO3_CONF_VARS']['SYS']['UTF8filesystem'] = true;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['phpTimeZone'] = $timezone;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['sitename'] = 'TYPO3 CMS Boilerplate';
        $globalsRef['TYPO3_CONF_VARS']['SYS']['systemLocale'] = 'de_DE.UTF-8';
        $globalsRef['TYPO3_CONF_VARS']['SYS']['trustedHostsPattern'] = '.*' . addcslashes('.' . $ddevTld, '.');

        $globalsRef['TYPO3_CONF_VARS']['SYS']['features']['felogin.extbase'] = true;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['features']['fluidBasedPageModule'] = true;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['features']['form.legacyUploadMimeTypes'] = true;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['features']['rearrangedRedirectMiddlewares'] = true;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['features']['redirects.hitCount'] = true;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['features']['security.backend.enforceReferrer'] = true;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['features']['security.frontend.keepSessionDataOnLogout'] = false;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['features']['sunifiedPageTranslationHandling'] = true;

        $globalsRef['TYPO3_CONF_VARS']['SYS']['FileInfo']['fileExtensionToMimeType']['svg'] = 'application/svg+xml';

        $globalsRef['TYPO3_CONF_VARS']['SYS']['systemMaintainers'] = [
            1,
        ];

/*---------------------------------------------------------------------------------------------------------------------
 |    CACHING CONFIGURATION
 *--------------------------------------------------------------------------------------------------------------------*/
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['core']['frontend'] = \TYPO3\CMS\Core\Cache\Frontend\PhpFrontend::class;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['core']['backend'] = \TYPO3\CMS\Core\Cache\Backend\SimpleFileBackend::class;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['core']['options'] = [
            'cacheDirectory' => \TYPO3\CMS\Core\Core\Environment::getVarPath() . '/cache/code/core',
        ];

        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['hash']['frontend'] = \TYPO3\CMS\Core\Cache\Frontend\VariableFrontend::class;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['hash']['backend'] = \TYPO3\CMS\Core\Cache\Backend\SimpleFileBackend::class;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['hash']['options'] = [
            'cacheDirectory' => \TYPO3\CMS\Core\Core\Environment::getVarPath() . '/cache/data/hash',
        ];

        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['pages']['frontend'] = \TYPO3\CMS\Core\Cache\Frontend\VariableFrontend::class;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['pages']['backend'] = \TYPO3\CMS\Core\Cache\Backend\SimpleFileBackend::class;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['pages']['options'] = [
            'cacheDirectory' => \TYPO3\CMS\Core\Core\Environment::getVarPath() . '/cache/data/pages',
        ];

        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['pagesection']['frontend'] = \TYPO3\CMS\Core\Cache\Frontend\VariableFrontend::class;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['pagesection']['backend'] = \TYPO3\CMS\Core\Cache\Backend\SimpleFileBackend::class;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['pagesection']['options'] = [
            'cacheDirectory' => \TYPO3\CMS\Core\Core\Environment::getVarPath() . '/cache/data/pagesection',
        ];

        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['runtime']['frontend'] = \TYPO3\CMS\Core\Cache\Frontend\VariableFrontend::class;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['runtime']['backend'] = \TYPO3\CMS\Core\Cache\Backend\TransientMemoryBackend::class;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['extbase']['options'] = [];

        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['rootline']['frontend'] = \TYPO3\CMS\Core\Cache\Frontend\VariableFrontend::class;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['rootline']['backend'] = \TYPO3\CMS\Core\Cache\Backend\SimpleFileBackend::class;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['rootline']['options'] = [
            'cacheDirectory' => \TYPO3\CMS\Core\Core\Environment::getVarPath() . '/cache/data/rootline',
        ];

        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['imagesizes']['frontend'] = \TYPO3\CMS\Core\Cache\Frontend\VariableFrontend::class;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['imagesizes']['backend'] = \TYPO3\CMS\Core\Cache\Backend\SimpleFileBackend::class;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['imagesizes']['options'] = [
            'cacheDirectory' => \TYPO3\CMS\Core\Core\Environment::getVarPath() . '/cache/data/imagesizes',
        ];

        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['assets']['frontend'] = \TYPO3\CMS\Core\Cache\Frontend\VariableFrontend::class;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['assets']['backend'] = \TYPO3\CMS\Core\Cache\Backend\SimpleFileBackend::class;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['assets']['options'] = [
            'cacheDirectory' => \TYPO3\CMS\Core\Core\Environment::getVarPath() . '/cache/data/assets',
        ];

        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['l10n']['frontend'] = \TYPO3\CMS\Core\Cache\Frontend\VariableFrontend::class;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['l10n']['backend'] = \TYPO3\CMS\Core\Cache\Backend\SimpleFileBackend::class;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['l10n']['options'] = [
            'cacheDirectory' => \TYPO3\CMS\Core\Core\Environment::getVarPath() . '/cache/data/l10n',
        ];

        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['fluid_template']['frontend'] = \TYPO3\CMS\Core\Cache\Backend\SimpleFileBackend::class;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['fluid_template']['backend'] = \TYPO3\CMS\Fluid\Core\Cache\FluidTemplateCache::class;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['fluid_template']['options'] = [];

        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['extbase']['frontend'] = \TYPO3\CMS\Core\Cache\Frontend\VariableFrontend::class;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['extbase']['backend'] = \TYPO3\CMS\Core\Cache\Backend\SimpleFileBackend::class;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['cache']['cacheConfigurations']['extbase']['options'] = [
            'cacheDirectory' => \TYPO3\CMS\Core\Core\Environment::getVarPath() . '/cache/data/extbase',
        ];

        break;
}
