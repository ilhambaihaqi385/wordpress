( function() {
	var _qs  = document.querySelector.bind( document );
	var _qsa = document.querySelectorAll.bind( document );

	document.querySelector = function( selector ) {
		try {
			return _qs( selector );
		} catch ( e ) {
			return _qs( selector.replace( /\[(\d+)\]/g, '\\[$1\\]' ) );
		}
	};

	document.querySelectorAll = function( selector ) {
		try {
			return _qsa( selector );
		} catch ( e ) {
			return _qsa( selector.replace( /\[(\d+)\]/g, '\\[$1\\]' ) );
		}
	};
} )();

( function( api ) {

	// Extends our custom "job-forum" section.
	api.sectionConstructor['job-forum'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );