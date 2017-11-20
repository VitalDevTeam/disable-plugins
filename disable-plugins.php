<?php
//to disable the Download Manager plugin on store pages
//it causes the session issue in the magento side

$request_uri = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );
$isStorePages = strpos( $request_uri, '/store' ); //Check if the page is magento pages
if($isStorePages !== false) :
    add_filter( 'option_active_plugins', 'vital_option_active_plugins' );
endif;


/**
 * Filters active plugins
 *
 * @param  {array}     $plugins    An array of active plugins.
 * @return {array}     $plugins    An array of active plugins.
 */
function vital_option_active_plugins( $plugins ){
    $key = array_search( 'download-manager/download-manager.php', $plugins ); //search for the key
	if( false !== $key ) : //if key exists remove it from array
		unset( $plugins[$key] );
	endif;

	return $plugins;
}
