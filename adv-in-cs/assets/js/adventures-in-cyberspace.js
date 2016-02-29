/*! Adventures in Cyberspace - v0.0.1
 * http://xk29.com/theme
 * Copyright (c) 2016; * Licensed GPLv2+ */
( function( window, undefined ) {
	'use strict';


} )( this );


// Since the side menu rotates, the autoheght stuff needs to be adjusted
function setPostHeight( ) {
	var currentHeight = jQuery('.content-container').height(),
        pageHeight = jQuery('.page-body').height(),
        postHeight = jQuery('.post-body').height(),
	    targetHeight = Math.max(jQuery('.menu-main-menu-container').width() + 20, pageHeight + 20, postHeight + 20),
        pageWidth = jQuery('.page-body').width();

	if (currentHeight < targetHeight ) {
		jQuery('.content-container').height(targetHeight);
	}

    var imageWidth = jQuery('.wp-post-image').width();
    if (imageWidth <= (pageWidth / 2) ) {
        jQuery('.wp-post-image').css('float','left');
        jQuery('.wp-post-image').css('margin','1%');
    }
}