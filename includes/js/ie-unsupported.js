jQuery( document ).ready( function( $ ) {

	// Is old version of IE used?
	if ( navigator.userAgent.match( new RegExp( "MSIE [5-" + ctc_ie_unsupported.version + "]", "gi" ) ) ) {

		// Hide content
		$( 'body' )
			.empty() // remove content
			.css( 'background', 'none' ); // hide background

		// Tell user to upgrade to a modern browser
		alert( ctc_ie_unsupported.message );

		// Redirect to a site with upgrade details
		window.location = ctc_ie_unsupported.redirect_url;

	}

});