<?php

$globalsRef = &$GLOBALS;
$applicationContext = \TYPO3\CMS\Core\Utility\GeneralUtility::getApplicationContext();

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
        $globalsRef['TYPO3_CONF_VARS']['FE']['cookieDomain'] = '.ddev-typo3cms-boilerplate.ddev.local';

        $globalsRef['TYPO3_CONF_VARS']['BE']['cookieDomain'] = '.ddev-typo3cms-boilerplate.ddev.local';
        $globalsRef['TYPO3_CONF_VARS']['BE']['showRefreshLoginPopup'] = true;
        $globalsRef['TYPO3_CONF_VARS']['BE']['lockSSL'] = true;

        $globalsRef['TYPO3_CONF_VARS']['MAIL']['transport'] = 'smtp';
        $globalsRef['TYPO3_CONF_VARS']['MAIL']['transport_sendmail_command'] = false;
        $globalsRef['TYPO3_CONF_VARS']['MAIL']['transport_smtp_encrypt'] = '';
        $globalsRef['TYPO3_CONF_VARS']['MAIL']['transport_smtp_password'] = '';
        $globalsRef['TYPO3_CONF_VARS']['MAIL']['transport_smtp_server'] = '127.0.0.1:1025';
        $globalsRef['TYPO3_CONF_VARS']['MAIL']['transport_smtp_username'] = '';

        $globalsRef['TYPO3_CONF_VARS']['SYS']['UTF8filesystem'] = true;
        $globalsRef['TYPO3_CONF_VARS']['SYS']['phpTimeZone'] = 'Europe/Berlin';
        $globalsRef['TYPO3_CONF_VARS']['SYS']['sitename'] = 'TYPO3 CMS Boilerplate';
        $globalsRef['TYPO3_CONF_VARS']['SYS']['systemLocale'] = 'de_DE.UTF-8';
        $globalsRef['TYPO3_CONF_VARS']['SYS']['trustedHostsPattern'] = '.*\\.ddev\\.local';

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

        break;
}
