/* feel good area (ie shortcuts) */

YDom = YAHOO.util.Dom;
YEvent = YAHOO.util.Event;

/**
 * FUNCTIONS
 */

function showAuthPopup(authPopupConfig) {
    switch (authPopupConfig.mode) {
        case 2:
            oiHandleAuth(authPopupConfig.params.oiUrl, authPopupConfig.callback);
            break;
        default:
            openAuthWindow(authPopupConfig.mode, authPopupConfig.callback, authPopupConfig.params);
            break;
    }
}

function openAuthWindow (mode, callback, parameters) {
    /* Disabled openID by ZZJHONS (25/02/2012)
    window.open(
        'ssoAuth.php?callback=' + callback + '&ssoMode=' + mode + parameters,
        'authentification',
        'width=800,height=600,resizeable,scrollbars'
    );
    */
}

function oiHandleAuth(oiUrl, oiCallback) {
    openAuthWindow(2, oiCallback, '&oiUrl=' + oiUrl)
}