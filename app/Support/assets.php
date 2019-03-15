<?php 

/**
 * Assets should handle local & production environment.
 * On production, always use CDN in order to 
 * increase application performance score.
 */

/**
 * Alertify Asset
 */
if(! function_exists('alertifyJs')) {
	function alertifyJs($theme = 'bootstrap', $version = '1.11.2') {
		return app()->environment('production') 
				? '//cdn.jsdelivr.net/npm/alertifyjs@' . $version . '/build/alertify.min.js'
				: asset('vendor/alertifyjs/js/alertify.min.js');
	}
}

if(! function_exists('alertifyCss')) {
	function alertifyCss($theme = 'bootstrap', $version = '1.11.2') {
		return app()->environment('production') 
				? '//cdn.jsdelivr.net/npm/alertifyjs@' . $version . '/build/css/themes/' . $theme . '.min.css'
				: asset('vendor/alertifyjs/css/themes/' . $theme . '.min.css');
	}
}

