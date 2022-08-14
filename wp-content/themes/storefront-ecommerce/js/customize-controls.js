( function( api ) {

	// Extends our custom "storefront-ecommerce" section.
	api.sectionConstructor['storefront-ecommerce'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );