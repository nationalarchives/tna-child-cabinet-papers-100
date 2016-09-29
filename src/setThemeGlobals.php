<?php

/**
 * Sets globals which are used by URL and breadcrumb generating code
 *
 * @param string $environment - a string of either 'local', 'development' or 'external'
 */
function setThemeGlobals($environment = null) {
    if ($environment === null) {
        throw new BadFunctionCallException('setThemeGlobals function must be passed at string that represents the environment');
    }

    global $pre_path;
    global $pre_crumbs;

    switch ($environment) {
        case 'internal':
        case 'development':
            $pre_path = '/cabinet-papers-100';
            $pre_crumbs = array('Cabinet papers 100' => '/');
            break;
        case 'external':
            $pre_crumbs = array(
                'Cabinet papers 100' => '/cabinet-papers-100/'
            );
            $pre_path = '/cabinet-papers-100';
            break;
    }
}